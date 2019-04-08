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
                /*
                1)cargo en el array el objeto (valor) 
                2)el objecto es una de las tuplas devueltas de la consulta
                3)se instancia el objeto con el orden de los campos sport4friends.evento
                */
                $result[] = new Eventos($row['id_evento'], 
                                        $row['nombre_evento'],
                                        $row['deporte'],
                                        $row['ciudad'],
                                        $row['municipio'],
                                        $row['localizacion'],
                                        $row['fecha_creacion'],
                                        $row['fecha_evento'],
                                        $row['hora_evento'],
                                        $row['descripcion'],
                                        $row['foto_evento']);
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
    private function __construct($id_evento, $nombre_evento, $deporte, $ciudad, $municipio, $localizacion, $fecha_creacion, $fecha_evento, $hora_evento, $descripcion, $foto_evento)
    {
        $this->id_evento=$id_evento;
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













