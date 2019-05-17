<?php

require_once __DIR__ . '/Aplicacion.php';


class Quedada
{
   
    //busca quedada por nombre de queadada
    public static function buscaQuedada($nombreQuedada)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $query = sprintf("SELECT * FROM quedadas WHERE nombre_quedada='%s'", $conn->real_escape_string($nombreQuedada));

        $rs = $conn->query($query);

        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1)
            {

                $row = $rs->fetch_assoc();
                //new Quedada($nombre_quedada, $creador, $ciudad, $localizacion,$fecha_quedada, $hora_quedada,  $descripcion, $ruta_foto,$aforo);
                $quedada = new Quedada($row['nombre_quedada'],$row['creador'],$row['ciudad'],$row['localizacion'],$row['fecha_quedada'],$row['hora_quedada'],$row['descripcion'],$row['ruta_foto'],$row['aforo']);
                    
                $quedada->id_quedada= $row['id_quedada'];

                $result = $quedada;
            }
            $rs->free();
        } 
        else {
            echo "Error al consultar en la BD" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;

    }
    
    
    public static function buscaQuedadaPorID($id_quedada)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        
        $query = sprintf("SELECT * FROM quedadas WHERE id_quedada='%s'", $conn->real_escape_string($id_quedada));
        
        $rs = $conn->query($query);
        
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1)
            {
                
                $row = $rs->fetch_assoc();
                //new Quedada($nombre_quedada, $creador, $ciudad, $localizacion,$fecha_quedada, $hora_quedada,  $descripcion, $ruta_foto,$aforo);
                $quedada = new Quedada($row['nombre_quedada'],$row['creador'],$row['ciudad'],$row['localizacion'],$row['fecha_quedada'],$row['hora_quedada'],$row['descripcion'],$row['ruta_foto'],$row['aforo']);
                
                $quedada->id_quedada= $row['id_quedada'];
                
                $result = $quedada;
            }
            $rs->free();
        }
        else {
            echo "Error al consultar en la BD " . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
        
    }
    
    
    
    
    
    // deuelve todas las quedadas que hay en la bd
    public static function getAllQuedadas()
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $query = sprintf("SELECT * FROM quedadas");
        $result = false; 
        if ($rs = $conn->query($query))
        {   
            $result = array();
            while($row = $rs->fetch_assoc())
            {
              
                $quedada = new Quedada($row['nombre_quedada'],$row['creador'],$row['ciudad'],$row['localizacion'],$row['fecha_quedada'],$row['hora_quedada'],$row['descripcion'],$row['ruta_foto'],$row['aforo']);
                
                $quedada->id_quedada = $row['id_quedada'];

                $result[] = $quedada;
            }
            $rs->free();
        } 
        else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

    
    
   //crea una quedada
    public static function crearQuedada($nombre_quedada, $creador, $ciudad, $localizacion,$fecha_quedada, $hora_quedada, $descripcion, $ruta_foto,$aforo)
    {
        $quedada = self::buscaQuedada($nombre_quedada);
        if ($quedada) {
            return false;
        }
        $quedada = new Quedada($nombre_quedada, $creador, $ciudad, $localizacion,$fecha_quedada, $hora_quedada,  $descripcion, $ruta_foto,$aforo);

        return self::guardarQuedada($quedada);
    }
    
    
    //devuvlve el numero de invitados que hay en una determianda quedada
    public static function numeroInvitados($quedada){
        
        
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $id_quedada=$quedada->id_quedada();
        $num_invitados=null;

        
        $query = sprintf("SELECT  nombre_quedada, COUNT(*) AS num  FROM quedadas JOIN  
            invitados  WHERE  quedadas.id_quedada=invitados.quedada and   
        quedadas.id_quedada='%s'", $conn->real_escape_string($id_quedada));
    
        if ($rs = $conn->query($query))
        {
            
           $row = $rs->fetch_assoc();
           $num_invitados=$row['num'];     
                
            $rs->free();
        }
        else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $num_invitados;
        
        
        
    }
    
    public static function aforoCompleto($quedada){
        
        $aforo=$quedada->get_aforo_quedada();
        $invitados=$quedada->numeroInvitados($quedada);
        
        return $aforo<=$invitados;
        
    }
    
    
    

    public static function guardarQuedada($quedada)
    {
        if ($quedada->id_evento !== null) {
            return self::actualizarQuedada($quedada);
        }
        return self::insertarQuedada($quedada);
    }

    private static function insertarQuedada($quedada)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO quedadas(nombre_quedada, creador, ciudad,localizacion, fecha_quedada, hora_quedada, descripcion, ruta_foto,aforo) VALUES('%s', '%s', '%s', '%s', '%s','%s', '%s', '%s','%s')"
            , $conn->real_escape_string($quedada->nombre_quedada)
            , $conn->real_escape_string($quedada->creador)
            , $conn->real_escape_string($quedada->ciudad)
            , $conn->real_escape_string($quedada->localizacion)
            , $conn->real_escape_string($quedada->fecha_quedada)
            , $conn->real_escape_string($quedada->hora_quedada)
            , $conn->real_escape_string($quedada->descripcion)
            , $conn->real_escape_string($quedada->ruta_foto)
            , $conn->real_escape_string($quedada->aforo)
            );
        if ( $conn->query($query) ) {
            $quedada->id_quedada= $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $quedada;
    }
    
   
    //Elimina una queadada de la bd
    public static function eliminaQuedada($id_quedada){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $ok = true;
        $query=sprintf("DELETE FROM quedadas WHERE id_quedada = '%s'"
            , $id_quedada);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows == 1) {
                $ok = true;
            }
        } else {
            echo "Error al eliminar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $ok;
    }
  
    
    
    

    //atribburos
    private $id_quedada;
    private $nombre_quedada;
    private $creador;
    private $ciudad;
    private $localizacion;
    //private $fecha_creacion;
    private $fecha_quedada;
    private $hora_quedada;
    private $descripcion;
    private $ruta_foto;
    private $aforo;
    

    //Constructora quedada
    private function __construct($nombre, $creador, $ciudad,$localizacion, $fecha, $hora, $descripcion, $ruta_foto,$aforo)
    {
        $this->nombre_quedada= $nombre;
        $this->creador= $creador;
        $this->ciudad=$ciudad;
        $this->localizacion = $localizacion;
        //$this->fecha_creacion= $fecha_creacion;
        $this->fecha_quedada=$fecha;
        $this->hora_quedada=$hora;
        $this->descripcion=$descripcion;
        $this->ruta_foto=$ruta_foto;
        $this->aforo=$aforo;
    }

    
    
    public function id_quedada(){return $this->id_quedada;}
    public function nombre_quedada(){return $this->nombre_quedada;}
    public function creador(){return $this->creador;}
    public function ciudad(){return $this->ciudad;}
    public function localizacion(){return $this->localizacion;}
    public function fecha_creacion(){return $this->fecha_creacion;}
    public function fecha_quedada(){return $this->fecha_quedada;}
    public function hora_quedada(){return $this->hora_quedada;}
    public function descripcion(){ return $this->descripcion;}
    public function ruta_foto(){return $this->ruta_foto;}
    public function get_aforo_quedada(){return $this->aforo;}


    
    public function set_deporte($deporte){$this->deporte = $deporte;}
    public function set_ciudad($ciudad){$this->ciudad = $ciudad;}
    public function set_municipio($municipio){$this->municipio = $municipio;}
    public function set_localizacion($localizacion){$this->localizacion = $localizacion;}
    public function set_fecha_creacion($fecha_creacion){$this->fecha_creacion = $fecha_creacion;}
    public function set_fecha_evento($fecha_evento){$this->fecha_evento = $fecha_evento;}
    public function set_descripcion($descripcion){$this->descripcion = $descripcion;}
    public function set_ruta_foto($ruta_foto){$this->ruta_foto = $ruta_foto;}
}

?>













