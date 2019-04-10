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

} 

?>