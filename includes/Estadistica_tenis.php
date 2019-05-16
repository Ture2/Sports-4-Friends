<?php
require_once __DIR__ . '/Aplicacion.php';
require_once __DIR__ . '/Estadistica.php';

class Estadistica_tenis extends Estadistica
{
    //Busca las estadisticas especificas de un usuario que tiene un jugador en un equipo de futbol correspondiente
    public static function buscaEstadisticaPorEquipo($idusuario, $idequipo)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM estadisticas_tenis WHERE es_usuario = '%s' AND es_equipo = '%s'",
                    $conn->real_escape_string($idusuario)
                    , $conn->real_escape_string($idequipo));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $estadistica = new Estadistica_tenis($fila['id_estenis'], $fila['es_usuario'], $fila['es_equipo'], $fila['pj_usuario'], $fila['pg_usuario'], $fila['pe_usuario'], $fila['pp_usuario'], $fila['puntos_usuario'], $fila['sets'], $fila['juegos'], $fila['aces'], $fila['dobles_faltas'], $fila['errores_no_forzados']);
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
        $query = sprintf("SELECT * FROM estadisticas_tenis es JOIN equipos e ON es.es_equipo = e.nombre_equipo WHERE es.es_usuario = '%s'", $conn->real_escape_string($idusuario));
       $rs =$conn->query($query);
       if ( $rs ) {
            if($rs->num_rows == 0)
                $lista = null;
            else {
                $lista = array();
                while ($fila = $rs->fetch_assoc()) {
                    $aux = new Estadistica_tenis($fila['id_estenis'], $fila['es_usuario'], $fila['es_equipo'], $fila['pj_usuario'], $fila['pg_usuario'], $fila['pe_usuario'], $fila['pp_usuario'], $fila['puntos_usuario'], $fila['sets'], $fila['juegos'], $fila['aces'], $fila['dobles_faltas'], $fila['errores_no_forzados']);
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

    private $sets;

    private $juegos;

    private $aces;

    private $dobles_faltas;

    private $errores;

    public function __construct($id_estadistica, $usuario, $equipo, $partidosj, $partidosg, $partidose, $partidosp, $puntos, $sets, $juegos, $aces, $dobles_faltas, $errores)
    {
        parent::__construct($id_estadistica, $usuario, $equipo, $partidosj, $partidosg, $partidose, $partidosp);
        $this->puntos = $puntos;
        $this->sets = $sets;
        $this->juegos = $juegos;
        $this->aces = $aces;
        $this->dobles_faltas = $dobles_faltas;
        $this->errores = $errores;
    }

    public function getPuntos(){
        return $this->puntos;
    }

    public function getSets(){
        return $this->sets;
    }

    public function getJuegos(){
        return $this->juegos;
    }

    public function getAces(){
        return $this->aces;
    }

    public function getFaltas(){
        return $this->dobles_faltas;
    }

    public function getErrores(){
        return $this->errores;
    }

    public function setPuntos($puntos){
        $this->puntos = $puntos;
    }

    public function setSets($sets){
        $this->sets = $sets;
    }

    public function setJuegos($juegos){
        $this->juegos = $juegos;
    }

    public function setAces($aces){
        $this->aces = $aces;
    }

    public function setFaltas($dobles_faltas){
        $this->dobles_faltas = $dobles_faltas;
    }

    public function setErrores($errores){
        $this->errores = $errores;
    }
}
