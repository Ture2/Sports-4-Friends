<?php
require_once __DIR__ . '/Aplicacion.php';
require_once __DIR__ . '/Estadistica.php';

class Estadistica_beisbol extends Estadistica
{
    //Busca las estadisticas especificas de un usuario que tiene un jugador en un equipo de futbol correspondiente
    public static function buscaEstadisticaPorEquipo($idusuario, $idequipo)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM estadisticas_beisbol WHERE es_usuario = '%s' AND es_equipo = '%s'",
                    $conn->real_escape_string($idusuario)
                    , $conn->real_escape_string($idequipo));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $estadistica = new Estadistica_beisbol($fila['id_esbeisbol'], $fila['es_usuario'], $fila['es_equipo'], $fila['pj_usuario'], $fila['pg_usuario'], $fila['pe_usuario'], $fila['pp_usuario'], $fila['strike'], $fila['homerun'], $fila['eliminaciones']);
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
        $query = sprintf("SELECT * FROM estadisticas_beisbol es JOIN equipos e ON es.es_equipo = e.id_equipo WHERE es.es_usuario = '%s'", $conn->real_escape_string($idusuario));
       $rs =$conn->query($query);
       if ( $rs ) {
            if($rs->num_rows == 0)
                $lista = null;
            else {
                $lista = array();
                while ($fila = $rs->fetch_assoc()) {
                    $aux = new Estadistica_beisbol($fila['id_esbeisbol'], $fila['es_usuario'], $fila['es_equipo'], $fila['pj_usuario'], $fila['pg_usuario'], $fila['pe_usuario'], $fila['pp_usuario'], $fila['strike'], $fila['homerun'], $fila['eliminaciones']);
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


    private $strike;

    private $homerun;

    private $eliminaciones;

    public function __construct($id_estadistica, $usuario, $equipo, $partidosj, $partidosg, $partidose, $partidosp, $strike, $homerun, $eliminaciones)
    {
        parent::__construct($id_estadistica, $usuario, $equipo, $partidosj, $partidosg, $partidose, $partidosp);
        $this->strike = $strike;
        $this->homerun = $homerun;
        $this->eliminaciones = $eliminaciones;
    }

    public function getStrikes(){
        return $this->strike;
    }

    public function getHomerun(){
        return $this->homerun;
    }

    public function getEliminaciones(){
        return $this->eliminaciones;
    }

    public function setStrikes($strike){
        $this->strike = $strike;
    }

    public function setHomerun($homerun){
        $this->homerun = $homerun;
    }

    public function setEliminaciones($eliminaciones){
        $this->eliminaciones = $eliminaciones;
    }
}
