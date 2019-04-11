<?php


require_once __DIR__ . '/Aplicacion.php';

class Jugador{
   

    public static function getJugadorPorNombre($nombre)
    {   
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM JUGADORES j JOIN USUARIOS u ON u.NICKNAME = j.USUARIO JOIN EQUIPOS e ON j.EQUIPO = e.ID_EQUIPO WHERE u.NICKNAME = '%s'", $nombre);
       $rs =$conn->query($query); 
       if ( $rs ) {
            if($rs->num_rows == 0)
                $jugador = null;
            else {
                $row = $rs->fetch_assoc();
                $jugador = new Jugador($row["EQUIPO"], $row["USUARIO"], $row["ROL_JUGADOR"], $row["FECHA_PJUGADOR"], $row["HORE_PJUGADOR"]);
                $jugador->set_id_jugador($row["ID_JUGADOR"]);
                $rs->free();
            }
        } else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $jugador;
    }

    public static function actulizaId (){
        
        return 0;
    }


    
    
    // JJ
    
    
    /// ESTE METODO NO SE USA PUES LOD JUGADORES TIENEN SU PROPOP ID
    public static function buscaJudador($nombreJugador)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM jugadores E WHERE E.NICKNAME = '%s'", $conn->real_escape_string($nombreJugador));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                //var_dump($rs);
                //$user = new Usuario($fila['nombreUsuario'], $fila['nombre'], $fila['password'], $fila['rol']);
                $user = new Usuario($fila['NICKNAME'], $fila['NOMBRE'], $fila['CORREO'], $fila['PASSWORD'], $fila['ROL_USUARIO']);
                var_dump($user);
                $user->id = $fila['ID_USUARIO'];
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    
    
    
    
    
    public static function crea($equi, $usu, $rol, $fe,$hor)
    {
        
      
        $jugador = new Jugador($equi, $usu, $rol, $fe,$hor);
        
        
        return $jugador;
    }
    
    
    
    public static function guardaJugador($jugador)
    {
        if ($jugador->id_jugador !== null) {
            return self::actualiza($jugador);
        }
        return self::inserta($jugador);
    }
    
    //??????
    private static function actualiza($jugador)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE Usuarios U SET nombreUsuario = '%s', nombre='%s', password='%s', rol='%s' WHERE U.id=%i"
            , $conn->real_escape_string($jugador->nickname)
            , $conn->real_escape_string($jugador->nombre)
            , $conn->real_escape_string($jugador->password)
            , $conn->real_escape_string($jugador->rol)
            , $jugador->id);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el usuario: " . $usuario->id;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        
        return $usuario;
    }
    
    
    
    
    private static function inserta($jugador)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO jugadores(EQUIPO, USUARIO,ROL_JUGADOR,FECHA_PJUGADOR,HORA_PJUGADOR) VALUES('%s', '%s', '%s','%s' ,'%s')"
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
        $this->id_jugador;
    }

    public function set_equipo($equipo)
    {
        $this->equipo;
    }

    public function set_usuario($usuario)
    {
        $this->usuario;
    }

    public function set_rol_jugador($rol_jugador)
    {
        $this->rol_jugador;
    }

    public function set_fecha_pjugador($fecha_pjugador){
        $this->fecha_pjugador;
    }

    public function set_hora_pjugador($hora_pjugador){
        $this->hora_pjugador;
    }

    public function compruebaLider($idUsuario, $idEquipo){
    	$resultado = false;
    	if($idUsuario == $usuario && $idEquipo == $equipo && $rol_jugador = 1 ){
    		$resultado = true;
    	}
    	return $resultado;
    }

} 

?>