<?php

class Equipo{
	
	public static function getEquiposPorDeporte($deporte)
    {
       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
       $query = sprintf("SELECT e.NOMBRE_EQUIPO, e.LOGO_EQUIPO, e.DESCRIPCION_EQUIPO FROM EQUIPOS e JOIN DEPORTES d ON d.ID_DEPORTE = e.DEPORTE AND d.NOMBRE_DEPORTE = '%s'", $deporte);
       $rs =$conn->query($query); 
       if ( $rs ) {
       		if($rs->num_rows == 0)
       			$equipos = null;
       		else {
       			$equipos = array();
       			$row = $rs->fetch_assoc();
       			foreach ($row as $equipo) {
       				$equipos = new Equipo($equipo[0], $equipo[1], $equipo[2], $equipo[3]);
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




} 

?>