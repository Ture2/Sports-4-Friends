<?php
require_once __DIR__ . '/Aplicacion.php';
require_once __DIR__ . '/Estadistica.php';

class Estadistica_baloncesto extends Estadistica
{
    //Busca las estadisticas especificas de un usuario que tiene un jugador en un equipo de futbol correspondiente
    public static function buscaEstadisticaPorEquipo($idusuario, $idequipo)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM estadisticas_baloncesto WHERE es_usuario = '%s' AND es_equipo = '%s'",
                    $conn->real_escape_string($idusuario)
                    , $conn->real_escape_string($idequipo));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $estadistica = new Estadistica_baloncesto($fila['id_esbaloncesto'], $fila['es_usuario'], $fila['es_equipo'], $fila['pj_usuario'], $fila['pg_usuario'], $fila['pe_usuario'], $fila['pp_usuario'], $fila['puntos_anotados'], $fila['asistencias'], $fila['tapones'], $fila['faltas_personales']);
                $result = json_encode(get_object_vars($estadistica));
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

    //Lista todas las estadisticas que tiene referido un usuario sobre el futbol
    public static function listaEstadisticas($idusuario){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM estadisticas_baloncesto es JOIN equipos e ON es.es_equipo = e.nombre_equipo WHERE es.es_usuario = '%s'", $conn->real_escape_string($idusuario));
       $rs =$conn->query($query);
       if ( $rs ) {
            if($rs->num_rows == 0)
                $lista = null;
            else {
                $lista = array();
                while ($fila = $rs->fetch_assoc()) {
                    $aux = new Estadistica_baloncesto($fila['id_esbaloncesto'], $fila['es_usuario'], $fila['es_equipo'], $fila['pj_usuario'], $fila['pg_usuario'], $fila['pe_usuario'], $fila['pp_usuario'], $fila['puntos_anotados'], $fila['asistencias'], $fila['tapones'], $fila['faltas_personales']);
                     $json = json_encode(get_object_vars($aux));
                    array_push($lista, $json);
                }
                $rs->free();
               
            }
        } else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $lista;
    }
    

//Clase Estadistica


    private $puntos;

    private $asistencias;

    private $tapones;

    private $faltas;

    public function __construct($id_estadistica, $usuario, $equipo, $partidosj, $partidosg, $partidose, $partidosp, $puntos, $asistencias, $tapones, $faltas)
    {
        parent::__construct($id_estadistica, $usuario, $equipo, $partidosj, $partidosg, $partidose, $partidosp);
        $this->puntos = $puntos;
        $this->asistencias = $asistencias;
        $this->tapones = $tapones;
        $this->faltas = $faltas;
    }

    public function getPuntos(){
        return $this->puntos;
    }

    public function getAsistencias(){
        return $this->asistencias;
    }

    public function getTapones(){
        return $this->tapones;
    }

    public function getFaltas(){
        return $this->faltas;
    }

    public function setPuntos($puntos){
        $this->puntos = $puntos;
    }

    public function setAsistencias($asistencias){
        $this->asistencias = $asistencias;
    }

    public function setTapones($tapones){
        $this->tapones = $tapones;
    }

    public function setFaltas($faltas){
        $this->faltas = $faltas;
    }

    public function jsonSerialize(){
        return get_object_vars($this);
    }    
}
