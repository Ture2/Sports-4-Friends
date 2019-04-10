<?php


require_once __DIR__ . '/Aplicacion.php';

class Equipo{
   

  //Función que nos devuelve los equipos que hay en un determinado deporte
	public static function getEquiposPorDeporte($deporte)
    {
       $app = Aplicacion::getSingleton();
       $conn = $app->conexionBd();
       $query = sprintf("SELECT e.NOMBRE_EQUIPO AS NOMBRE, e.LOGO_EQUIPO AS LOGO, e.DESCRIPCION_EQUIPO AS DESCRP FROM EQUIPOS e JOIN DEPORTES d ON d.ID_DEPORTE = e.DEPORTE AND d.NOMBRE_DEPORTE = '%s'", $deporte);
       $rs =$conn->query($query); 
       if ( $rs ) {
       		if($rs->num_rows == 0)
       			$equipos = null;
       		else {
       			$equipos = array();
       			while ($equipo = $rs->fetch_assoc()) {
       				$aux = new Equipo($deporte, $equipo["NOMBRE"], $equipo["LOGO"], $equipo["DESCRP"]);
       				array_push($equipos, $aux);
       			}
       			$rs->free();
       		}
        } else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $equipos;
    }

    //Funcion que nos permite añadir el logo de un equipo a la base de datos
    public static function setLogoEquipo($ruta){
    	$app = Aplicacion::getSingleton();
       	$conn = $app->conexionBd();
       	$query = sprintf("UPDATE EQUIPOS SET EQUIPOS = %s", $ruta);
       	if ( !$conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
    }

    //Funcion que nos permite obtener toda la información de un determinado equipo por el nombre de este
    public static function getInfoPorNombre($nombre_equipo){
      $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM EQUIPOS WHERE NOMBRE_EQUIPO = '%s'", $nombre_equipo);
        $rs = $conn->query($query);
        $equipo = null;
        if( $rs ){
          $row = $rs->fetch_assoc();
          $equipo = new Equipo($row["DEPORTE"], $row["NOMBRE_EQUIPO"], $row["LOGO_EQUIPO"], $row["DESCRIPCION_EQUIPO"]);
          $equipo->set_estadisticas($row["PARTIDOS_GANADOS"],$row["PARTIDOS_EMPATADOS"],$row["PARTIDOS_PERDIDOS"],
            $row["MAYOR_RACHA"],$row["ULTIMO_RESULTADO"], $row["POSICION_LIGA"]);
        }else {
            echo "Error al consultar la base de datos: (" . $conn->errno . ") " . utf8_encode($conn->error);
        }
        return $equipo;
    }

    /*Función que devuelve todos los equipos de la BBDD, solo su nombre e id*/
    public static function getAllEquipos()
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = "SELECT * FROM EQUIPOS";
        $rs = $conn->query($query);
        if ($rs) {
            if ( $rs->num_rows == 0)
                $equipos = null;
            else {
                $equipos = array();
                while($equipo = $rs->fetch_assoc()){
                    $aux = new Equipo($equipo['DEPORTE'], $equipo['NOMBRE_EQUIPO'], null, null);
                    $aux->set_id($equipo['ID_DEPORTE']);
                    array_push($equipos, $aux);
                }

            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $equipos;
    }
    /*Funcion que nos permitirá obtener los equipos a los que pertenece un jugador*/
    public static function equipoContieneAlUsuario(){
    }

    
    
    ////JJ
    
    /*
     * Devuelve false si el usuario no se encuentra, en caso contrario devuelve el equipo
     */
    public static function buscaEquipo($nombreEquipo)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM equipos E WHERE E.NOMBRE_EQUIPO = '%s'", $conn->real_escape_string($nombreEquipo));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                //var_dump($rs);
                //$user = new Usuario($fila['nombreUsuario'], $fila['nombre'], $fila['password'], $fila['rol']);
                $user = new Usuario($fila['NICKNAME'], $fila['NOMBRE'], $fila['CORREO'], $fila['PASSWORD'], $fila['ROL_USUARIO']);
                var_dump($user);
                $user->id = $fila['ID_USUARIO'];
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    
    
    
    
    
    public static function crea($deporte, $nombre, $imagen, $desc)
    {
        $equipo = self::buscaEquipo($nombre);
        if ($equipo) {
            return false;// el equipo ya existe
        }
        $equipo = new Equipo($deporte, $nombre, $imagen, $desc);
        return self::guarda($equipo);
    }
    
  
    
    public static function guarda($equipo)
    {
        if ($equipo->id !== null) {
            return self::actualiza($equipo);
        }
        return self::inserta($equipo);
    }
    
    //??????
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
    
    
    
    
    private static function inserta($equipo)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $fecha=date("Y-m-d");
        $hora=date("H:i:s");
        $query=sprintf("INSERT INTO equipos(DEPORTE, NOMBRE_EQUIPO,FECHA_CEQUIPO,HORA_CEQUIPO,LOGO_EQUIPO, DESCRIPCION_EQUIPO) VALUES('%s', '%s', '%s','%s' ,'%s','%s')"
            , $conn->real_escape_string($equipo->deporte)
            , $conn->real_escape_string($equipo->nombre_equipo)
            ,$conn->real_escape_string($fecha)
            ,$conn->real_escape_string($hora)
            , $conn->real_escape_string($equipo->logo_equipo)
            , $conn->real_escape_string($equipo->descripcion_equipo));
        if ( $conn->query($query) ) {
            $equipo->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $equipo;
    }
    


    /*TAO Region*/
    private $id;//autoincrement
    private $deporte;
    private $nombre_equipo;
    private $descripcion_equipo;
    private $logo_equipo;
    private $partidos_ganados;
    private $partidos_empatados;
    private $partidos_perdidos;
    private $mayor_racha;
    private $ultimo_resultado;
    private $posicion_liga;

    /*Constructor*/
    private function __construct($deporte, $nombre_equipo, $imagen_logo, $descripcion)
    {

        $this->deporte = $deporte;
        $this->nombre_equipo= $nombre_equipo;
        $this->logo_equipo = $imagen_logo;
        $this->descripcion_equipo = $descripcion;
    }



    /* Getters */
    public function get_deporte()
    {
        return $this->deporte;
    }

    public function get_nombre_equipo()
    {
        return $this->nombre_equipo;
    }

    public function get_descripcion_equipo()
    {
        return $this->descripcion_equipo;
    }

    public function get_logo_equipo()
    {
        return $this->logo_equipo;
    }

    public function get_estadisticas(){
        $estadisticas = array(
            "logo" =>  $this->logo_equipo,
            "ganados" => $this->partidos_ganados,
            "empatados" => $this->partidos_empatados,
            "perdidos" => $this->partidos_perdidos,
            "racha" => $this->mayor_racha,
            "ultimo_resultado" => $this->ultimo_resultado,
            "posicion" => $this->posicion_liga
         );
        return $estadisticas;
    }


    /*Setters*/
    public function set_id($id)
    {
        $this->id = $id;
    }

    public function set_deporte($deporte)
    {
        $this->deporte = $deporte;
    }

    public function set_nombre_equipo($nombre_equipo)
    {
        return $this->nombre_equipo = $nombre_equipo;
    }

    public function set_descripcion_equipo($descripcion_equipo)
    {
        return $this->descripcion_equipo = $descripcion_equipo;
    }

    public function set_logo_equipo($logo_equipo)
    {
        return $this->logo_equipo = $logo_equipo;
    }

    public function set_estadisticas($partidos_ganados, $partidos_empatados, $partidos_perdidos, $mayor_racha, $ultimo_resultado, $posicion_liga){
      $this->partidos_ganados = $partidos_ganados;
      $this->partidos_empatados = $partidos_empatados;
      $this->partidos_perdidos = $partidos_perdidos;
      $this->mayor_racha = $mayor_racha;
      $this->ultimo_resultado = $ultimo_resultado;
      $this->posicion_liga = $posicion_liga;
    }

} 

?>