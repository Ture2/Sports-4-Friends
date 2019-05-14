<?php
require_once __DIR__ . '/Aplicacion.php';

class Usuario
{

    public static function login($nombreUsuario, $password)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user && $user->compruebaPassword($password)) {
            return $user;
        }
        return false;
    }

    public static function buscaUsuario($nombreUsuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM usuarios WHERE nickname = '%s'",
                    $conn->real_escape_string($nombreUsuario));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                //$user = new Usuario($fila['nombreUsuario'], $fila['nombre'], $fila['password'], $fila['rol']);
                $user = new Usuario($fila['nickname'], $fila['nombre'], $fila['correo'], $fila['password'], $fila['rol_usuario']);
                $user->id = $fila['id_usuario'];
                $result = $user;
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
    
    private static function actualiza($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE usuarios SET nickname = '%s', nombre = '%s', correo = '%s', password = '%s', rol_usuario = '%s' WHERE id_usuario = '%s' "
            , $conn->real_escape_string($usuario->nickname)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->mail)
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

    public static function buscaUsuarioPorId($idusuario){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM usuarios WHERE id_usuario = '%s'",
                    $conn->real_escape_string($idusuario));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $user = new Usuario($fila['nickname'], $fila['nombre'], $fila['correo'], $fila['password'], $fila['rol_usuario']);
                $user->id = $fila['id_usuario'];
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

    //Pasas la ruta de la foto por parametro
    public static function guardaFotoUsuario($ruta){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("UPDATE usuarios SET foto_usuario = '%s'", $ruta);
        if ( !$conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            return false;
        }
        return true;
    }

    public static function compruebaFoto($usuario){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $foto = strtolower($usuario->nombreUsuario()) . ".jpg";
        $query = sprintf("SELECT * FROM usuarios WHERE foto_usuario = '%s'",
                    $conn->real_escape_string($foto));
        $rs = $conn->query($query);
        if($rs){
            $fila = $rs->fetch_assoc();
            if($fila['foto_usuario'] != NULL){
                $usuario->setImagenUsuario($fila['foto_usuario']);
                return true;
            }
        }
        return false;
    }

    private $id;

    private $nickname;

    private $nombre;

    private $password;

    private $mail;

    private $rol;

    private $foto_usuario;

    private function __construct($nombreUsuario, $nombre, $mail, $password, $rol)
    {
        $this->nickname= $nombreUsuario;
        $this->nombre = $nombre;
        $this->mail= $mail;
        $this->password = $password;
        $this->rol = $rol;
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

    public function nombreUsuario()
    {
        return $this->nombre;
    }

    public function nicknameUsuario()
    {
        return $this->nickname;
    }

    public function getImagenUsuario(){
        return $this->foto_usuario;
    }

    public function setNickname($nickname){
        $this->nickname = $nickname;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setMail($mail){
        $this->mail = $mail;
    }

    public function setImagenUsuario($imagen){
        $this->foto_usuario = $imagen;
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
