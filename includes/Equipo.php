<?php

class Equipo{
	
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

    public static function setLogoEquipo($ruta){
    	$app = Aplicacion::getSingleton();
       	$conn = $app->conexionBd();
       	$query = sprintf("UPDATE EQUIPOS SET EQUIPOS = %s", $ruta);
       	if ( !$conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
    }


    private $id_equipo;

    private $deporte;

    private $nombre_equipo;

    private $descripcion_equipo;

    private $logo_equipo;


    private function __construct($deporte, $nombre_equipo, $imagen_logo, $descripcion)
    {
        $this->nombre_equipo= $nombre_equipo;
        $this->deporte = $deporte;
        $this->logo_equipo = $imagen_logo;
        $this->descripcion_equipo = $descripcion;
    }

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


} 

?>