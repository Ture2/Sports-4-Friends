<?php
/*
----------------------------------------
METADATA:                               |
    imp_f (implementado y funcionando)  |
    ^  (falta por hacer)                |
----------------------------------------
CLASE EVENTOS: 
    1)debe devolver una lista de eventos    imp_f
    2)permite crear un eventos              ^
    3)poder eliminar un Eventos             ^
    opcional:
    4)permitir editar un evento             ^
*/
class Eventos
{
    public static function listarEventos()
    {
        /*
        1-Permite obtener una instancia de <code>Aplicacion</code>.
        2-array $bdDatosConexion datos de configuración de la BD
        3-continua con la session
        */
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        //Creo la consulta
        $query = sprintf("SELECT * FROM Eventos");

        //creo una variable y la inicializo a false para devolver algo si devuelve la consulta de la BD
        $result = false; 

        //si realizado la consulta y la cargo en la variable rs sin fallos continuo
        if ($rs = $conn->query($query))
        {   
            /*
            Creo un variable de tipo array para guardar n-1 eventos
            la clave por defecto empieza de 0 a n-1
            el valor es cada tupla de la consulta.
            */
            $result = array();

            //cargo en mi variable fila cada una de mis tuplas
            while($row = $rs->fetch_assoc())
            {
                //cargo en el array el objeto (valor)                   
                $result[] = new Eventos($row['ID_EVENTO'], 
                                        $row['NOMBRE_EVENTO'],
                                        $row['LOCALIZACION'],
                                        $row['TIPO_DEPORTE'],
                                        $row['EQUIPO_INSCRITO'],
                                        $row['DESCRIPCION'],
                                        $row['PORCENTAJE'],
                                        $row['FECHA_CREACION']);
                        }
            $rs->free();
        } 
        else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

    //************************************************************************
    //                   IMPLEMENTACION DE LA CLASE EVENTOS
    //************************************************************************

    //Atributos de mi clase Eventos (concuerda con mi tabla eventos mysql)
    private $id;
    private $nombre;
    private $localizacion;
    private $tipo_deporte;
    private $equipo;
    private $descripcion;
    private $porcentaje_victorias;
    private $fecha;

    //Constructora
    private function __construct($id, $nombre, $localizacion, $tipo_deporte, $equipo, $descripcion, $porcentaje_victorias, $fecha)
    {
        $this->id= $id;
        $this->nombre= $nombre;
        $this->localizacion = $localizacion;
        $this->tipo_deporte= $tipo_deporte;
        $this->equipo= $equipo;
        $this->porcentaje_victorias = $porcentaje_victorias;
        $this->fecha = $fecha;
    }

    //Funciones para acceder a los atributos de Eventos
    public function id(){return $this->id;}
    public function nombre(){return $this->nombre;}
    public function localizacion(){return $this->localizacion;}
    public function tipo_deporte(){return $this->tipo_deporte;}
    public function equipo(){return $this->equipo;}
    public function porcentaje_victorias(){return $this->porcentaje_victorias;}
    public function fecha(){ return $this->fecha;}
}

?>













