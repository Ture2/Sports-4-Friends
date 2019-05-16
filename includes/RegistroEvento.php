<?php


require_once __DIR__ . '/Aplicacion.php';

class RegistroEvento
{
    public static function buscaRegistroEventosEquipo($equipo)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $result = null;

        $query = sprintf("SELECT * FROM registros_eventos RE WHERE RE.equipo = '%s'", $conn->real_escape_string($equipo));
        $rs = $conn->query($query);
        if ($rs) 
        {
            if ( $rs->num_rows == 1) 
            {
                $row = $rs->fetch_assoc();
                $registroEvento = new RegistroEvento($row['evento'],$row['equipo'],$row['fecha_creacion']);
                $registroEvento->id_registro = $row['id_registro'];
                $result = $registroEvento;
            }
            $rs->free();
        }
        return $result;
    }

    public static function buscaRegistroEvento($evento, $equipo)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $query = sprintf("SELECT * FROM registros_eventos RE WHERE RE.evento = '%s'  and RE.equipo = '%s'"
            , $conn->real_escape_string($evento),
            $conn->real_escape_string($equipo));

        $rs = $conn->query($query);
        $result = false;

        if ($rs) {
            if ( $rs->num_rows == 1) {
                $row = $rs->fetch_assoc();

                $registroEvento = new RegistroEvento($row['evento'],$row['equipo'],$row['fecha_creacion']);
                $registroEvento->id_registro = $row['id_registro'];
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
                $evento = new RegistroEvento($row['evento'],$row['equipo'],$row['fecha_creacion']);
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

    public static function crearRegistroEvento($evento, $equipo, $fecha_creacion)
    {
        $registro = RegistroEvento::buscaRegistroEvento($evento, $equipo);
        var_dump($registro);
        if ($registro) {
            return true;
        }
        $registroEvento = new RegistroEvento($evento, $equipo, $fecha_creacion);

        return self::guardarRegistroEvento($registroEvento);
    }

    public static function guardarRegistroEvento($registroEvento)
    {
        if ($registroEvento->id_registro == null) {
             return self::insertarRegistroEvento($registroEvento);
        }
    }
       

    private static function insertarRegistroEvento($registroEvento)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO registros_eventos (evento, equipo, fecha_creacion) VALUES('%s', '%s', '%s')"
            , $conn->real_escape_string($registroEvento->evento)
            , $conn->real_escape_string($registroEvento->equipo)
            , $conn->real_escape_string($registroEvento->fecha_creacion));

        if ( $conn->query($query) )
        {
            $registroEvento->id_registro = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $registroEvento;

    }
    

     public static function registrosEventosUsuario($nickname)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT RE.evento, E.NOMBRE_EQUIPO, RE.fecha_creacion FROM `usuarios` U join `jugadores` J on  U.ID_USUARIO = J.usuario  join `equipos` E on  J.equipo = E.id_equipo join `registros_eventos` RE on RE.equipo = E.nombre_equipo WHERE U.nickname = '%s'"
            , $conn->real_escape_string($nickname));

        $result = false; 
        if ($rs = $conn->query($query))
        {
            $result = array();
            while($row = $rs->fetch_assoc())
            {
                $evento = new RegistroEvento($row['evento'],$row['equipo'],$row['fecha_creacion']);
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

    //************************************************************************
    //                   IMPLEMENTACION DE LA CLASE REGISTROEVENTOS
    //************************************************************************

    //Atributos de mi clase Eventos (concuerda con mi tabla RegistroEventos mysql)
    private $id_registro;
    private $evento;
    private $equipo;
    private $fecha_creacion;
   
    

    //Constructora
    private function __construct($evento, $equipo, $fecha_creacion)
    {
        $this->evento= $evento;
        $this->equipo= $equipo;
        $this->fecha_creacion=$fecha_creacion;
    }
         //Funciones para acceder a los atributos de Eventos
         public function evento(){return $this->evento;}
         public function equipo(){return $this->equipo;}
         public function fecha_creacion(){return $this->fecha_creacion;}
}
?>













