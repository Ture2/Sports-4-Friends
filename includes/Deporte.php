<?php

require_once __DIR__ . '/Aplicacion.php';

class Deporte
{



    public static function buscaDeporte($nombreDeporte)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM deportes d WHERE d.nombre_deporte = '%s'", $conn->real_escape_string($nombreDeporte));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                //var_dump($rs);
                //$user = new Usuario($fila['nombreUsuario'], $fila['nombre'], $fila['password'], $fila['rol']);
                $deporte = new Deporte($fila['nombre_deporte'], $fila['numero_maximo_jugadores'], $fila['duracion_min'], $fila['fecha_cdeporte'], $fila['hora_cdeporte']);
                var_dump($deporte);
                $deporte->id = $fila['id_deporte'];
                $result = $deporte;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
     /*???????*/
    public static function crea($nombreUsuario, $nombre, $correo, $password, $rol)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user) {
            return false;
        }
        $user = new Usuario($nombreUsuario, $nombre, $correo, self::hashPassword($password), $rol);
        return self::guarda($user);
    }
    
    /*???????*/
    public static function guarda($usuario)
    {
        if ($usuario->id !== null) {
            return self::actualiza($usuario);
        }
        return self::inserta($usuario);
    }
    
    /*??????*/
    private static function inserta($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO usuarios(nickname, nombre, correo, password, rol_usuario) VALUES('%s', '%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($usuario->nickname)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->mail)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->rol));
        if ( $conn->query($query) ) {
            $usuario->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $usuario;
    }
    
    /*???????*/
    private static function actualiza($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE usuarios u SET nombreUsuario = '%s', nombre='%s', password='%s', rol='%s' WHERE u.id=%i"
            , $conn->real_escape_string($usuario->nickname)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->rol)
            , $usuario->id);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el usuario: " . $usuario->id;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        
        return $usuario;
    }
    
    /*Función que devuelve un array con todos los deportes*/
    public static function getAll(){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = "SELECT * FROM deportes";
        $rs = $conn->query($query);
        if ($rs) {
            if ( $rs->num_rows == 0)
                $deportes = null;
            else {
                $deportes = array();
                while($deporte = $rs->fetch_assoc()){
                    $aux = new Deporte($deporte['nombre_deporte'], $deporte['numero_maximo_jugadores'], $deporte['duracion_min'],$deporte['fecha_cdeporte'],$deporte['hora_cdeporte']);
                    $aux->set_id($deporte['id_deporte']);
                    array_push($deportes, $aux);
                }

            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
       
        return $deportes;
    }
    


    public static function buscaDeportePorId($id_deporte)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM deportes d WHERE d.id_deporte = '%s'", $conn->real_escape_string($id_deporte));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                //var_dump($rs);
                //$user = new Usuario($fila['nombreUsuario'], $fila['nombre'], $fila['password'], $fila['rol']);
                $deporte = new Deporte($fila['nombre_deporte'], $fila['numero_maximo_jugadores'], $fila['duracion_min'], $fila['fecha_cdeporte'], $fila['hora_cdeporte']);
                var_dump($deporte);
                $deporte->id = $fila['id_deporte'];
                $result = $deporte;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    /*TAO Region*/
    private $id;

    private $nombre_deporte;

    private $numero_maximo_jugadores;

    private $duracion_min;

    private $fecha_cdeporte;

    private $hora_cdeporte;

    private function __construct($nombreD, $nmaxju, $dur_min, $fecha, $hora)
    {
        $this->nombre_deporte= $nombreD;
        $this->numero_maximo_jugadores = $nmaxju;
        $this->duracion_min= $dur_min;
        $this->fecha_cdeporte = $fecha;
        $this->hora_cdeporte = $hora;
    }


    /*Getters*/

    public function id()
    {
        return $this->id;
    }

    public function nombreDeporte()
    {
        return $this->nombre_deporte;
    }

    public function get_numero_maximo_jugadores()
    {
        return $this->numero_maximo_jugadores;
    }
    
    public function get_duracion_min()
    {
        return $this->duracion_min;
    }

    public function get_fecha_cdeporte()
    {
        return $this->fecha_cdeporte;
    }

    public function get_hora_cdeporte()
    {
        return $this->hora_cdeporte;
    }

    /*Setters*/

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function set_nombreDeporte($nombre_deporte)
    {
        $this->nombre_deporte = $nombre_deporte;
    }

    public function set_numero_maximo_jugadores($numero_maximo_jugadores)
    {
        $this->numero_maximo_jugadores = $numero_maximo_jugadores;
    }
    
    public function set_duracion_min($duracion_min)
    {
        $this->duracion_min = $duracion_min;
    }

    public function set_fecha_cdeporte($fecha_cdeporte)
    {
        $this->fecha_cdeporte = $fecha_cdeporte;
    }

    public function set_hora_cdeporte($hora_cdeporte)
    {
        $this->hora_cdeporte = $hora_cdeporte;
    }
}
