<?php

class Equipo{
	

  //Función que nos devuelve los equipos que hay en un determinado deporte
	public static function getEquiposPorDeporte($deporte)
    {
       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
       $query = sprintf("SELECT e.NOMBRE_EQUIPO AS NOMBRE, e.LOGO_EQUIPO AS LOGO, e.DESCRIPCION_EQUIPO AS DESCRP FROM EQUIPOS e JOIN DEPORTES d ON d.ID_DEPORTE = e.DEPORTE AND d.NOMBRE_DEPORTE = '%s'", $deporte);
       $rs =$conn->query($query); 
       if ( $rs ) {
       		if($rs->num_rows == 0)
       			$equipos = null;
       		else {
       			$equipos = array();
       			while ($equipo = $rs->fetch_assoc()) {
       				$aux = new Equipo($deporte, $equipo["NOMBRE"], $equipo["LOGO"], $equipo["DESCRP"]);
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

    //Funcion que nos permite añadir el logo de un equipo a la base de datos
    public static function setLogoEquipo($ruta){
    	$app = Aplicacion::getSingleton();
       	$conn = $app->conexionBd();
       	$query = sprintf("UPDATE EQUIPOS SET EQUIPOS = %s", $ruta);
       	if ( !$conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
    }

    //Funcion que nos permite obtener toda la información de un determinado equipo por el nombre de este
    public static function getInfoPorNombre($nombre_equipo){
      $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM EQUIPOS WHERE NOMBRE_EQUIPO = '%s'", $nombre_equipo);
        $rs = $conn->query($query);
        $equipo = null;
        if( $rs ){
          $row = $rs->fetch_assoc();
          $equipo = new Equipo($row["DEPORTE"], $row["NOMBRE_EQUIPO"], $row["LOGO_EQUIPO"], $row["DESCRIPCION_EQUIPO"]);
          $equipo->set_estadisticas($row["PARTIDOS_GANADOS"],$row["PARTIDOS_EMPATADOS"],$row["PARTIDOS_PERDIDOS"],
            $row["MAYOR_RACHA"],$row["ULTIMO_RESULTADO"], $row["POSICION_LIGA"]);
        }else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
        }
        return $equipo;
    }

    /*Funcion que nos permitirá obtener los equipos a los que pertenece un jugador*/
    public static function equipoContieneAlUsuario(){
    }



    /*TAO Region*/
    private $id_equipo;
    private $deporte;
    private $nombre_equipo;
    private $descripcion_equipo;
    private $logo_equipo;
    private $partidos_ganados;
    private $partidos_empatados;
    private $partidos_perdidos;
    private $mayor_racha;
    private $ultimo_resultado;
    private $posicion_liga;

    /*Constructor*/
    private function __construct($deporte, $nombre_equipo, $imagen_logo, $descripcion)
    {
        $this->nombre_equipo= $nombre_equipo;
        $this->deporte = $deporte;
        $this->logo_equipo = $imagen_logo;
        $this->descripcion_equipo = $descripcion;
    }



    /* Getters */
    public function get_deporte()
    {
        return $this->deporte;
    }

    public function get_nombre_equipo()
    {
        return $this->nombre_equipo;
    }

    public function get_descripcion_equipo()
    {
        return $this->descripcion_equipo;
    }

    public function get_logo_equipo()
    {
        return $this->logo_equipo;
    }

    public function get_estadisticas(){
        $estadisticas = array(
            "logo" =>  $this->logo_equipo,
            "ganados" => $this->partidos_ganados,
            "empatados" => $this->partidos_empatados,
            "perdidos" => $this->partidos_perdidos,
            "racha" => $this->mayor_racha,
            "ultimo_resultado" => $this->ultimo_resultado,
            "posicion" => $this->posicion_liga
         );
        return $estadisticas;
    }


    /*Setters*/
    public function set_deporte($deporte)
    {
        $this->deporte = $deporte;
    }

    public function set_nombre_equipo($nombre_equipo)
    {
        return $this->nombre_equipo = $nombre_equipo;
    }

    public function set_descripcion_equipo($descripcion_equipo)
    {
        return $this->descripcion_equipo = $descripcion_equipo;
    }

    public function set_logo_equipo($logo_equipo)
    {
        return $this->logo_equipo = $logo_equipo;
    }

    public function set_estadisticas($partidos_ganados, $partidos_empatados, $partidos_perdidos, $mayor_racha, $ultimo_resultado, $posicion_liga){
      $this->partidos_ganados = $partidos_ganados;
      $this->partidos_empatados = $partidos_empatados;
      $this->partidos_perdidos = $partidos_perdidos;
      $this->mayor_racha = $mayor_racha;
      $this->ultimo_resultado = $ultimo_resultado;
      $this->posicion_liga = $posicion_liga;
    }

} 

?>