<?php
/*
----------------------------------------
METADATA:                               |
    imp_f (implementado y funcionando)  |
    ^  (falta por hacer)                |
----------------------------------------
CLASE EVENTOS: 
    1)debe devolver una lista de eventos    imp_f
    2)permite crear un eventos              imp
    3)poder eliminar un Eventos             imp
    4)actuliazar eventos                    imp
    5)permitir editar un evento             imp
    6)buscar evento                         imp
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

        $query = sprintf("SELECT * FROM Eventos");
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
                /*
                1)cargo en el array el objeto (valor) 
                2)el objecto es una de las tuplas devueltas de la consulta
                3)se instancia el objeto con el orden de los campos sport4friends.evento
                */
                $evento = new Eventos($row['nombre_evento'],$row['deporte'],$row['ciudad'],$row['municipio'],$row['localizacion'],$row['fecha_creacion'],$row['fecha_evento'],$row['hora_evento'],$row['descripcion'],$row['foto_evento']);

                $evento->id_evento = $row['id_evento'];

                $result[] = $evento;
            }
            $rs->free();
        } 
        else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

    public static function elimnarEvento($nombre_evento)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $query=sprintf("DELETE FROM Eventos WHERE nombre_evento='%'"
            , $conn->real_escape_string($nombre_evento));

        $eliminar = false;

        if($conn->query($query))
        {
            $eliminar = true;
        }

        return $eliminar;
    }

    public static function crearEvento($nombre_evento, $deporte, $ciudad, $municipio, $localizacion, $fecha_creacion, $fecha_evento, $hora_evento, $descripcion, $foto_evento)
    {
        $evento = self::buscarEvento($nombre_evento);
        if ($evento) {
            return false;
        }
        $evento = new Eventos($nombre_evento, $deporte, $ciudad, $municipio, $localizacion, $fecha_creacion, $fecha_evento, $hora_evento, $descripcion, $foto_evento);

        return self::guardarEvento($evento);
    }

    public static function buscarEvento($nombre_evento)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM Eventos E WHERE E.nombre_evento= '%s'", $conn->real_escape_string($nombre_evento));

        $result = false; 

        if (($rs = $conn->query($query))  && ($rs->num_rows == 1))
        {   
            $row = $rs->fetch_assoc();
            $evento = new Eventos($row['nombre_evento'],$row['deporte'], $row['ciudad'],$row['municipio'],$row['localizacion'],$row['fecha_creacion'],$row['fecha_evento'],$row['hora_evento'],$row['descripcion'],$row['foto_evento']);
            $evento->id_evento = $row['id_evento'];
            $result[] = $evento;
            $rs->free();
        } 
        else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

    public static function guardarEvento($evento)
    {
        if ($evento->id_evento !== null) {
            return self::actualizarEvento($evento);
        }
        return self::insertarEvento($evento);
    }

    private static function insertarEvento($evento)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO Eventos(nombre_evento, deporte, ciudad, municipio, localizacion, fecha_creacion, fecha_evento, hora_evento, descripcion, foto_evento) VALUES('%s', '%s', '%s', '%s', '%s','%s', '%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($evento->nombre_evento)
            , $conn->real_escape_string($evento->deporte)
            , $conn->real_escape_string($evento->ciudad)
            , $conn->real_escape_string($evento->municipio)
            , $conn->real_escape_string($evento->localizacion)
            , $conn->real_escape_string($evento->fecha_creacion)
            , $conn->real_escape_string($evento->fecha_evento)
            , $conn->real_escape_string($evento->hora_evento)
            , $conn->real_escape_string($evento->descripcion)
            , $conn->real_escape_string($evento->foto_evento));
        if ( $conn->query($query) ) {
            $evento->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $evento;
    }
    
    private static function actualizarEvento($evento)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE Eventos E SET nombre_evento = '%s', deporte='%s', ciudad='%s', municipio='%s', localizacion='%',fecha_creacion='%', fecha_evento='%', hora_evento='%',descripcion='%', foto_evento='%' WHERE U.id_evento=%i"
            , $conn->real_escape_string($evento->nombre_evento)
            , $conn->real_escape_string($evento->deporte)
            , $conn->real_escape_string($evento->ciudad)
            , $conn->real_escape_string($evento->municipio)
            , $conn->real_escape_string($evento->localizacion)
            , $conn->real_escape_string($evento->fecha_creacion)
            , $conn->real_escape_string($evento->fecha_evento)
            , $conn->real_escape_string($evento->hora_evento)
            , $conn->real_escape_string($evento->descripcion)
            , $conn->real_escape_string($evento->foto_evento)
            , $evento->id_evento);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el evento: " . $evento->id;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $evento;
    }

    //************************************************************************
    //                   IMPLEMENTACION DE LA CLASE EVENTOS
    //************************************************************************

    //Atributos de mi clase Eventos (concuerda con mi tabla eventos mysql)
    private $id_evento;
    private $nombre_evento;
    private $deporte;
    private $ciudad;
    private $municipio;
    private $localizacion;
    private $fecha_creacion;
    private $fecha_evento;
    private $hora_evento;
    private $descripcion;
    private $foto_evento;
    

    //Constructora
    private function __construct($nombre_evento, $deporte, $ciudad, $municipio, $localizacion, $fecha_creacion, $fecha_evento, $hora_evento, $descripcion, $foto_evento)
    {
        $this->nombre_evento= $nombre_evento;
        $this->deporte= $deporte;
        $this->ciudad=$ciudad;
        $this->municipio=$municipio;
        $this->localizacion = $localizacion;
        $this->fecha_creacion= $fecha_creacion;
        $this->fecha_evento=$fecha_evento;
        $this->hora_evento=$hora_evento;
        $this->descripcion=$descripcion;
        $this->foto_evento=$foto_evento;
    }

    //Funciones para acceder a los atributos de Eventos
    public function id_evento(){return $this->id_evento;}
    public function nombre_evento(){return $this->nombre_evento;}
    public function deporte(){return $this->deporte;}
    public function ciudad(){return $this->ciudad;}
    public function municipio(){return $this->municipio;}
    public function localizacion(){return $this->localizacion;}
    public function fecha_creacion(){return $this->fecha_creacion;}
    public function fecha_evento(){return $this->fecha_evento;}
    public function hora_evento(){return $this->hora_evento;}
    public function descripcion(){ return $this->descripcion;}
    public function foto_evento(){return $this->foto_evento;}
}

?>












