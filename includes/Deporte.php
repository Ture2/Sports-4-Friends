<?php
require_once __DIR__ . '/Aplicacion.php';

class Deporte
{

    public static function login($nombreUsuario, $password)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user && $user->compruebaPassword($password)) {
            return $user;
        }
        return false;
    }

    public static function buscaDeporte($nombreDeporte)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM deportes D WHERE D.NOMBRE_DEPORTE = '%s'", $conn->real_escape_string($nombreDeporte));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                //var_dump($rs);
                //$user = new Usuario($fila['nombreUsuario'], $fila['nombre'], $fila['password'], $fila['rol']);
                $deporte = new Deporte($fila['NOMBRE_DEPORTE'], $fila['NUMERO_MAXIMO_JUGADORES'], $fila['DURACION_MIN'], $fila['FECHA_CDEPORTE'], $fila['HORA_CDEPORTE']);
                var_dump($deporte);
                $deporte->id = $fila['ID_DEPORTE'];
                $result = $deporte;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    public static function crea($nombreUsuario, $nombre, $correo, $password, $rol)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user) {
            return false;
        }
        $user = new Usuario($nombreUsuario, $nombre, $correo, self::hashPassword($password), $rol);
        return self::guarda($user);
    }
    
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
    public static function guarda($usuario)
    {
        if ($usuario->id !== null) {
            return self::actualiza($usuario);
        }
        return self::inserta($usuario);
    }
    
    private static function inserta($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO Usuarios(NICKNAME, NOMBRE, CORREO, PASSWORD, ROL_USUARIO) VALUES('%s', '%s', '%s', '%s', '%s')"
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
    
    private static function actualiza($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE Usuarios U SET nombreUsuario = '%s', nombre='%s', password='%s', rol='%s' WHERE U.id=%i"
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
    
    public function getAll(){
      //  $query = "Select * from deportes";
        $equipos = array();
      /* $con=$this->conexion->query($query);
        
        while($row = mysqli_fetch_array($con)){
            $equipo = new Deporte($row[0], $row[1], $row[2]);
            array_push($equipos, $equipo);
        }
        
        */
        
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = "SELECT * FROM deportes";
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows > 0) {//ojo mirar para el caso de deportes
                //$fila = $rs->fetch_assoc();
             
                
                while($row = mysqli_fetch_array($rs)){
                    $equipo = new Deporte($row[1], $row[2], $row[3],$row[4],$row[5]);
                    var_dump($equipo);
                    $equipo->id = $row['ID_DEPORTE'];
                    array_push($equipos, $equipo);
                }
                
                
                
               
                
               
            }
            $rs->free();// no hay deportes
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
       
        
        
        
        
        
        
        
        return $equipos;
    }
    
    
    
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

    public function id()
    {
        return $this->id;
    }

    public function rol()
    {
        return $this->rol;
    }

    public function mail()
    {
        return $this->mail;
    }

    public function nombreDeporte()
    {
        return $this->nombre_deporte;
    }

    public function compruebaPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }
}
