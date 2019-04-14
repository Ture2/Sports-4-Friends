<?php
/*
----------------------------------------
METADATA:                               |
    imp_f (implementado y funcionando)  |
    ^  (falta por hacer)                |
----------------------------------------
CLASE EVENTOS: 
    1)debe devolver una lista de Reventos   imp
    2)permite crear un Reventos             ^
    3)poder eliminar un REventos             imp
    4)actuliazar eventos                    ^
    5)permitir editar un evento             ^
    6)buscar evento                         ^
*/
class RegistroEvento
{
    public static function listarRegistroEventos()
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM Registro_eventos");
        $result = false; 
        if ($rs = $conn->query($query))
        {
            $result = array();
            while($row = $rs->fetch_assoc())
            {
                $evento = new RegistroEvento($row['evento'],$row['equipo'],$row['porcentaje_victorias'],$row['fecha_creacion']);
                $evento->id_evento = $row['id_registro'];
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

    public static function elimnarRegistroEvento($id_registro)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $query=sprintf("DELETE FROM Eventos WHERE nombre_evento='%'"
            , $conn->real_escape_string($id_registro));

        $eliminar = false;

        if($conn->query($query))
        {
            $eliminar = true;
        }
        return $eliminar;
    }

    public static function crearRegistroEvento($evento, $deporte, $equipo, $porcentaje_victorias, $fecha_creacion)
    {
        $evento = Eventos::buscarEvento($evento);
        if ($evento) {
            return false;
        }
        $evento = new RegistroEvento($nombre_evento, $deporte, $ciudad, $municipio, $localizacion, $fecha_creacion, $fecha_evento, $hora_evento, $descripcion, $foto_evento);

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

    public static function guardarRegistroEvento($evento)
    {
        if ($evento->id_evento == null) {
             return self::insertarRegistroEvento($evento);
        }
    }
       

    private static function insertarRegistroEvento($evento)
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
    

    //************************************************************************
    //                   IMPLEMENTACION DE LA CLASE REGISTROEVENTOS
    //************************************************************************

    //Atributos de mi clase Eventos (concuerda con mi tabla RegistroEventos mysql)
    private $id_registro;
    private $evento;
    private $equipo;
    private $porcentaje_victorias;
    private $fecha_creacion;
   
    

    //Constructora
    private function __construct($evento, $deporte, $equipo, $porcentaje_victorias, $fecha_creacion)
    {
        $this->evento= $evento;
        $this->equipo= $equipo;
        $this->porcentaje_victorias=$porcentaje_victorias;
        $this->fecha_creacion=$fecha_creacion;

         //Funciones para acceder a los atributos de Eventos
         public function evento(){return $this->evento;}
         public function equipo(){return $this->equipo;}
         public function porcentaje_victorias(){return $this->porcentaje_victorias;}
         public function fecha_creacion(){return $this->fecha_creacion;}

    }
?>













