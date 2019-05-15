<?php


require_once __DIR__ . '/Aplicacion.php';

class Invitado{
   
 
    
    

        //busca un invitado especifico por el nickname que se le pasa por parametro
    public static function getInvitadoPorNombreDeUnaQuedada($nombre, $quedada)
    {   
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM invitados j JOIN usuarios u ON u.id_usuario = j.usuario JOIN quedadas e ON j.quedada = e.id_quedada WHERE u.nickname = '%s' AND e.nombre_quedada = '%s'", $nombre, $quedada);
       $rs =$conn->query($query); 
       if ( $rs ) {
            if($rs->num_rows == 0)
                $invitado = null;
            else {
                $row = $rs->fetch_assoc();
                $invitado = new Invitado($row['quedada'], $row['usuario']);
                $invitado->set_id_invitado($row['id_quedada']);
                $invitado->set_fecha_creacion($row['fecha_creacion']);
                $rs->free();
            }
        } else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $invitado;
    }


    //Funcion ue devuele los invitados de una una determianda quedada
    public static function getInvitadosPorQuedada($quedada)
    {
       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM invitados i JOIN quedadas q ON q.id_quedada = i.quedada WHERE q.nombre_quedada = '%s'", $quedada->nombre_quedada());
       $rs =$conn->query($query); 
       if ( $rs ) {
            if($rs->num_rows == 0)
                $invitados = null;
            else {
                $invitados = array();
                while ($invitado = $rs->fetch_assoc()) {
                    $aux = new Invitado($invitado['quedada'], $invitado['usuario']);
                   
                     $aux->set_id_invitado($invitado['id_quedada']);
                     $aux->set_fecha_creacion($invitado['fecha_creacion']);
                     
                     array_push($invitados, $aux);
                }
                $rs->free();
            }
        } else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $invitados;
    }

    //Funcion que comprueba si el invitado esta en  una quedada y develve true o false en funcion del resultado
    public static function compruebaInvitadoEnQuedada($invitados, $invitado){
        //Si el equipo está vacio
        if($invitados == NULL || $invitado == NULL){
            return false;
        }
        //si existen jugadores en el equipo comprobamos si pertenecemos o no
        foreach ($invitados as $invi) {
            if($invi->get_usuario() == $invitado->get_usuario() && $invi->get_id_quedada() == $invitado->get_id_quedada()){
                return true;
            }
        }
        return false;
    }
    
  
    public static function creaInvitado($id_quedada, $id_usu)
    {
        
      
        $invitado = new Invitado($id_quedada, $id_usu);
        
        return $invitado;
    }
    
    //Inserta un invitado en la bbdd
    private static function inserta($invitado)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO invitados(quedada, usuario) VALUES('%s', '%s')"
            , $conn->real_escape_string($invitado->id_quedada)
            , $conn->real_escape_string($invitado->id_usuario));
        if ( $conn->query($query) ) {
            $invitado->id_invitado = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $invitado;
    }
    
    //Funcion que devuelve true o false dependiendo de si el usuario es lider de un equipo o no
    public function compruebaCreador($invitado, $quedada){
        $resultado = false;
        if($invitado != NULL && $quedada != NULL){
           
            if($invitado->get_usuario()==$quedada->creador())
                $resultado=true;            
        }
        return $resultado;
    }

   

    public static function apuntarQuedada($invitado){
        $invitadoInsertado = NULL;
        if($invitado != NULL){
            $invitadoInsertado = self::inserta($invitado);
        }else{
            echo "Error necesitas tener un jugador creado";
        }
        return $invitadoInsertado;
    }

    //Borrar un jugador en la bbdd
    public  static function eliminaInvitado($usuario, $quedada){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $ok = true;
        $query=sprintf("DELETE  FROM invitados  WHERE usuario = '%s' AND quedada = '%s'"
            , $usuario->id()
            , $quedada->id_quedada());
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows == 1) {
                $ok = true;
            }
        } else {
            echo "Error al eliminar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $ok;
    }
    
    
    
    
    
    private $id_invitado;//autoincrement
    private $id_quedada;
    private $id_usuario;
    private $fecha_creacion;

    /*Constructor*/
    private function __construct($id_quedada, $id_usuario)
    {

        $this->id_quedada = $id_quedada;
        $this->id_usuario= $id_usuario;
       
        //$this->hora_pjugador = $hora_pjugador;
    }



    /* Getters */
    public function get_id_invitado()
    {
        return $this->id_invitado;
    }



    public function get_usuario()
    {
        return $this->id_usuario;
    }

    public function get_fecha_creacion(){
        return $this->fecha_creacion;
    }
    public function get_id_quedada(){
        return $this->id_quedada;
    }
   

    /*Setters*/
    public function set_id_invitado($id_invitado)
    {
        $this->id_invitado = $id_invitado;
    }

    public function set_id_quedada($quedada)
    {
        $this->id_quedada = $quedada;
    }

    public function set_id_usuario($usuario)
    {
        $this->id_usuario = $usuario;
    }

  

    public function set_fecha_creacion($fecha){
        $this->fecha_creacion = $fecha;
    }

  

} 

?>