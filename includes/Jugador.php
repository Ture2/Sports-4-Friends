<?php


require_once __DIR__ . '/Aplicacion.php';

class Jugador{
   
    //busca un jugador especifico por el nickname que se le pasa por parametro
    public static function getJugadorPorNombre($nombre)
    {   
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM jugadores j JOIN usuarios u ON u.id_usuario = j.usuario JOIN equipos e ON j.equipo = e.id_equipo WHERE u.nickname = '%s'", $nombre);
       $rs =$conn->query($query); 
       if ( $rs ) {
            if($rs->num_rows == 0)
                $jugador = null;
            else {
                $row = $rs->fetch_assoc();
                $jugador = new Jugador($row['equipo'], $row['usuario'], $row['rol_jugador'], $row['fecha_pjugador'], $row['hora_pjugador']);
                $jugador->set_id_jugador($row['id_jugador']);
                $rs->free();
            }
        } else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $jugador;
    }

        //busca un jugador especifico por el nickname que se le pasa por parametro
    public static function getJugadorPorNombreDeUnEquipo($nombre, $equipo)
    {   
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM jugadores j JOIN usuarios u ON u.id_usuario = j.usuario JOIN equipos e ON j.equipo = e.id_equipo WHERE u.nickname = '%s' AND e.nombre_equipo = '%s'", $nombre, $equipo);
       $rs =$conn->query($query); 
       if ( $rs ) {
            if($rs->num_rows == 0)
                $jugador = null;
            else {
                $row = $rs->fetch_assoc();
                $jugador = new Jugador($row['equipo'], $row['usuario'], $row['rol_jugador'], $row['fecha_pjugador'], $row['hora_pjugador']);
                $jugador->set_id_jugador($row['id_jugador']);
                $rs->free();
            }
        } else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $jugador;
    }


    //Función que nos devuelve los jugadores que hay en un determinado equipo
    public static function getJugadoresPorEquipo($equipo)
    {
       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM jugadores j JOIN equipos e ON e.id_equipo = j.equipo WHERE e.nombre_equipo = '%s'", $equipo->get_nombre_equipo());
       $rs =$conn->query($query); 
       if ( $rs ) {
            if($rs->num_rows == 0)
                $jugadores = null;
            else {
                $jugadores = array();
                while ($jugador = $rs->fetch_assoc()) {
                    $aux = new Jugador($jugador['equipo'], $jugador['usuario'], $jugador['rol_jugador'], $jugador['fecha_pjugador'], $jugador['hora_pjugador']);
                     $aux->set_id_jugador($jugador['id_jugador']);
                    array_push($jugadores, $aux);
                }
                $rs->free();
            }
        } else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $jugadores;
    }

    //Funcion que comprueba si el jugador pertenece a un equipo y develve true o false en funcion del resultado
    public static function compruebaJugadorEnEquipo($jugadores, $jugadorb){
        //Si el equipo está vacio
        if($jugadores == NULL || $jugadorb == NULL){
            return false;
        }
        //si existen jugadores en el equipo comprobamos si pertenecemos o no
        foreach ($jugadores as $jugador) {
            if($jugador->get_usuario() == $jugadorb->get_usuario() && $jugador->get_equipo() == $jugadorb->get_equipo()){
                return true;
            }
        }
        return false;
    }
    
    // JJ
    //pruebas jugador con mismo iduser
    public static function crea($equi, $usu, $rol, $fe,$hor)
    {
        
      
        $jugador = new Jugador($equi, $usu, $rol, $fe,$hor);
        
        return $jugador;
    }
    
    //Inserta un jugador en la bbdd
    private static function inserta($jugador)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO jugadores(equipo, usuario, rol_jugador, fecha_pjugador, hora_pjugador) VALUES('%s', '%s', '%s','%s' ,'%s')"
            , $conn->real_escape_string($jugador->equipo)
            , $conn->real_escape_string($jugador->usuario)
            ,$conn->real_escape_string($jugador->rol_jugador)
            ,$conn->real_escape_string($jugador->fecha_pjugador)
            , $conn->real_escape_string($jugador->hora_pjugador));
        if ( $conn->query($query) ) {
            $jugador->id_jugador = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $jugador;
    }
    
    //Funcion que devuelve true o false dependiendo de si el usuario es el creador de la quedada
    public function compruebaLider($nickname, $equipo){
        $resultado = false;
        if($nickname != NULL && $equipo != NULL){
            $user = Usuario::buscaUsuario($nickname);
            $equipo = Equipo::getInfoPorNombre($equipo);
            $jugador = Jugador::getJugadorPorNombre($nickname, $equipo->get_nombre_equipo());
            if($user && $equipo != NULL && $jugador != NULL){
                if($jugador->buscarLider($user, $equipo, $jugador) != NULL){
                    $resultado = true;
                    return $resultado;
                }
            }
        }
        return $resultado;
    }

    //Esta funcion te devuelve un objeto jugador que sea lider de un equipo especifico que se pase por parametro
    private function buscarLider($user, $equipo, $jugador){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM jugadores j JOIN usuarios u ON u.id_usuario = j.usuario JOIN equipos e ON j.equipo = e.id_equipo WHERE u.id_usuario = '%s' AND e.id_equipo = '%s' AND j.rol_jugador = '1'"
            , $user->id()
            , $equipo->get_id()
            , $jugador->get_rol_jugador());
        $rs =$conn->query($query);
        if($rs){
            if($rs->num_rows != 0){
                $row = $rs->fetch_assoc();
                $jugador = new Jugador($row['equipo'], $row['usuario'], $row['rol_jugador'], $row['fecha_pjugador'], $row['hora_pjugador']);
                $jugador->set_id_jugador($row['id_jugador']);
                $rs->free();
            }else{
                $jugador = null;
            }
        }else{
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $jugador;
    }


    public static function unirEquipo($jugador){
        $jugadorcreado = NULL;
        if($jugador != NULL){
            $jugadorcreado = self::inserta($jugador);
        }else{
            echo "Error necesitas tener un jugador creado";
        }
        return $jugadorcreado;
    }

    //funcion que elimina un jugador de un equipo dado, independientemente de su rol
    //si el jugador que se elimina es lider le pasa al siguiente jugador la opcion de lider
    public static function salirEquipo($jugador, $equipo){
        $ok = false;
        $lider = false;
        if($jugador != NULL && $equipo != NULL){
            if($jugador->get_rol_jugador() == true){
                //primero cambiamos al lider
                $jugador->set_rol_jugador("0");
                $jugador->actualiza($jugador);
                $jugadores = Jugador::getJugadoresPorEquipo($equipo);
                foreach ($jugadores as $jugadorb) {
                    if($jugador->get_id_jugador() != $jugadorb->get_id_jugador() && !$lider){
                        $jugadorb->set_rol_jugador("1");
                        $jugadorb->actualiza($jugadorb);
                        $lider = true;
                    }
                }
            }
            if($jugador->elimina($jugador, $equipo)){
                $ok =true;
            }
        }
        return $ok;
    }

    //Borrar un jugador en la bbdd
    private static function elimina($jugador, $equipo){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $ok = true;
        $query=sprintf("DELETE jugadores FROM jugadores JOIN usuarios u ON usuario = u.id_usuario JOIN equipos e ON equipo = e.id_equipo WHERE equipo = '%s' AND usuario = '%s'"
            , $equipo->get_id()
            , $jugador->usuario);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows == 1) {
                $ok = true;
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $ok;
    }
        
    private static function actualiza($jugador){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE jugadores SET equipo = '%s', usuario = '%s', rol_jugador = '%s', fecha_pjugador = '%s', hora_pjugador = '%s' WHERE id_jugador = '%s'"
            , $conn->real_escape_string($jugador->equipo)
            , $conn->real_escape_string($jugador->usuario)
            , $conn->real_escape_string($jugador->rol_jugador)
            , $conn->real_escape_string($jugador->fecha_pjugador)
            , $conn->real_escape_string($jugador->hora_pjugador)
            , $jugador->id_jugador);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el jugador: " . $jugador->id_jugador;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        return $jugador;
    }

    public static function listaEquiposPorJugador($nombreJ){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $jugador = Jugador::getJugadorPorNombre($nombreJ);
        $query = sprintf("SELECT * FROM jugadores j JOIN equipos e ON j.equipo = e.id_equipo WHERE j.usuario = '%s'", $jugador->get_usuario());
       $rs =$conn->query($query);

       if ( $rs ) {
            if($rs->num_rows == 0)
                $equipos = null;
            else {
                //ARRAY QUE SOLO GUARDA LOS NOMBRES
                $equipos = array();
                while ($equipo = $rs->fetch_assoc()) {
                    $aux = $equipo["nombre_equipo"];
                    array_push($equipos, $aux);
                }
                $rs->free();
            }
        } else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $equipos;

    }
        
    
    

    /*TAO Region*/
    private $id_jugador;//autoincrement
    private $equipo;
    private $usuario;
    private $rol_jugador;
    private $fecha_pjugador;
    private $hora_pjugador;

    /*Constructor*/
    private function __construct($equipo, $usuario, $rol_jugador, $fecha_pjugador, $hora_pjugador)
    {

        $this->equipo = $equipo;
        $this->usuario= $usuario;
        $this->rol_jugador = $rol_jugador;
        $this->fecha_pjugador = $fecha_pjugador;
        $this->hora_pjugador = $hora_pjugador;
    }



    /* Getters */
    public function get_id_jugador()
    {
        return $this->id_jugador;
    }

    public function get_equipo()
    {
        return $this->equipo;
    }

    public function get_usuario()
    {
        return $this->usuario;
    }

    public function get_rol_jugador()
    {
        return $this->rol_jugador;
    }

    public function get_fecha_pjugador(){
        return $this->fecha_pjugador;
    }

    public function get_hora_pjugador(){
        return $this->hora_pjugador;
    }


    /*Setters*/
    public function set_id_jugador($id_jugador)
    {
        $this->id_jugador = $id_jugador;
    }

    public function set_equipo($equipo)
    {
        $this->equipo = $equipo;
    }

    public function set_usuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function set_rol_jugador($rol_jugador)
    {
        $this->rol_jugador = $rol_jugador;
    }

    public function set_fecha_pjugador($fecha_pjugador){
        $this->fecha_pjugador = $fecha_pjugador;
    }

    public function set_hora_pjugador($hora_pjugador){
        $this->hora_pjugador = $hora_pjugador;
    }

} 

?>