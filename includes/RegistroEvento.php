<?php

class RegistroEvento
{
    public static function buscaRegistroEventosPorEquipos($equiposPerteneceUsuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $result = false;

        for($i = 0; $i < count($equiposPerteneceUsuario); $i++)
        {
            $query = sprintf("SELECT * FROM Registro_eventos RE WHERE equipo = '%s'", $conn->real_escape_string($equiposPerteneceUsuario[i]));

            $rs = $conn->query($query);
            if ($rs) 
            {
                if ( $rs->num_rows == 1) 
                {
                    $fila = $rs->fetch_assoc();

                    $registroEvento = new RegistroEvento($row['evento'],$row['equipo'],$row['p_victorias'],$row['fecha_creacion']);

                    $evento->id_registro = $row['id_registro'];

                    $result[] = $registroEvento;
                }
            $rs->free();
            }

        }
    }

    public static function buscaRegistroEvento($evento, $equipo)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $query = sprintf("SELECT * FROM Registro_eventos RE WHERE RE.evento = '%s'  and RE.equipo = '%s'", $conn->real_escape_string($evento),
                    $conn->real_escape_string($equipo));

        $rs = $conn->query($query);
        $result = false;

        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();

                $registroEvento = new RegistroEvento($row['evento'],$row['equipo'],$row['p_victorias'],$row['fecha_creacion']);

                $evento->id_registro = $row['id_registro'];

                $result = $registroEvento;
            }
            $rs->free();
        } 
        else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;

    }


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
                $evento = new RegistroEvento($row['evento'],$row['equipo'],$row['p_victorias'],$row['fecha_creacion']);
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

    public static function eliminarRegistroEvento($id_registro)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $query=sprintf("DELETE FROM registro_eventos RE WHERE RE.id_registro='%'"
            , $conn->real_escape_string($id_registro));

        $eliminar = false;

        if($conn->query($query))
        {
            $eliminar = true;
        }
        return $eliminar;
    }

    public static function crearRegistroEvento($evento, $equipo, $p_victorias, $fecha_creacion)
    {
        $registro = RegistroEvento::buscaRegistroEvento($evento, $equipo);
        if ($evento) {
            return false;
        }
        $registroEvento = new RegistroEvento($evento, $equipo, $p_victorias, $fecha_creacion);

        return self::guardarEvento($registroEvento);
    }

    public static function guardarRegistroEvento($registroEvento)
    {
        if ($registroEvento->id_registro == null) {
             return self::insertarRegistroEvento($RegistroEvento);
        }
    }
       

    private static function insertarRegistroEvento($registroEvento)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO Eventos(evento, equipo, p_victorias, fecha_creacion) VALUES('%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($registroEvento->evento)
            , $conn->real_escape_string($registroEvento->equipo)
            , $conn->real_escape_string($registroEvento->p_victorias)
            , $conn->real_escape_string($registroEvento->fecha_creacion));

        if ( $conn->query($query) )
        {
            $registroEvento->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $registroEvento;
    }
    

    //************************************************************************
    //                   IMPLEMENTACION DE LA CLASE REGISTROEVENTOS
    //************************************************************************

    //Atributos de mi clase Eventos (concuerda con mi tabla RegistroEventos mysql)
    private $id_registro;
    private $evento;
    private $equipo;
    private $p_victorias;
    private $fecha_creacion;
   
    

    //Constructora
    private function __construct($evento, $deporte, $equipo, $p_victorias, $fecha_creacion)
    {
        $this->evento= $evento;
        $this->equipo= $equipo;
        $this->p_victorias=$p_victorias;
        $this->fecha_creacion=$fecha_creacion;

         //Funciones para acceder a los atributos de Eventos
         public function evento(){return $this->evento;}
         public function equipo(){return $this->equipo;}
         public function p_victorias(){return $this->p_victorias;}
         public function fecha_creacion(){return $this->fecha_creacion;}

    }
?>













