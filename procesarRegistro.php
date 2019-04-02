<!DOCTYPE html>

<?php

session_start();

require'../Data/DAOs/DAOsImp/DAOUsuariosImp.php';

if (! isset($_POST['registro']) ) {
	header('Location: registro.php');
	exit();
}


$erroresFormulario = array();

$nombreUsuario = isset($_POST['username']) ? $_POST['username'] : null;

if ( empty($nombreUsuario) || mb_strlen($nombreUsuario) < 2 ) {
	$erroresFormulario[] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
}

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
if ( empty($nombre) || mb_strlen($nombre) < 2 ) {
	$erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
}

$apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
if ( empty($apellido) || mb_strlen($apellido) < 2 ) {
    $erroresFormulario[] = "El apellido tiene que tener una longitud de al menos 2 caracteres.";
}

$correo = isset($_POST['correo']) ? $_POST['correo'] : null;
if ( empty($correo) || mb_strlen($correo) < 2 ) {
    $erroresFormulario[] = "El correo tiene que tener una longitud de al menos 5 caracteres.";
}

$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
if ( empty($telefono) || mb_strlen($telefono) < 2 ) {
    $erroresFormulario[] = "El telefono tiene que tener una longitud de al menos 5 caracteres.";
}



$password = isset($_POST['password']) ? $_POST['password'] : null;
if ( empty($password) || mb_strlen($password) < 3 ) {
	$erroresFormulario[] = "El password tiene que tener una longitud de al menos 5 caracteres.";
}
$password2 = isset($_POST['password2']) ? $_POST['password2'] : null;
if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
	$erroresFormulario[] = "Los passwords deben coincidir";
}

if (count($erroresFormulario) === 0) {
	//$conn = new \mysqli('localhost', 'root', '', 'ejercicio3');
	
	$conn= new DAOUsuariosImp();
	/*if ( $conn->connect_errno ) {
		echo "Error de conexión a la BD: (" . $this->conn->connect_errno . ") " . utf8_encode($this->conn->connect_error);
		exit();
	}
	if ( ! $conn->set_charset("utf8mb4")) {
		echo "Error al configurar la codificación de la BD: (" . $this->conn->errno . ") " . utf8_encode($this->conn->error);
		exit();
	}*/
	
	
	
	//$query=sprintf("SELECT * FROM Usuarios U WHERE U.nombreUsuario = '%s'", $conn->real_escape_string($nombreUsuario));
	
	//$rs = $conn->query($query);
	
	$rs=$conn->get($nombreUsuario);
	
	if ($rs) {
		if ( $rs->num_rows > 0 ) {
			$erroresFormulario[] = "El usuario ya existe";
			$rs->free();
		} else {
		    
			/*$query=sprintf("INSERT INTO Usuarios(nombreUsuario, nombre, password, rol) VALUES('%s', '%s', '%s', '%s')"
					, $conn->getConexion()->real_escape_string($nombreUsuario)
					, $conn->getConexion()->real_escape_string($nombre)
					, password_hash($password, PASSWORD_DEFAULT)
					, 'user');*/
		    
		    $usuario=new Usuario($nombreUsuario,$nombre,$apellido,$correo,$telefono,$password);
		    
		   // $reg=$conn->set($usuario);
			
		    if ($conn->set($usuario)) {
		     $_SESSION['login'] = true;
		     $_SESSION['nombre'] = $nombreUsuario;
		     header('Location: login.php');
		     exit();
		     } else {
		     echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->geerror);
		     exit();
		     }
		    
			/*if ( $conn->query($query) ) {
				$_SESSION['login'] = true;
				$_SESSION['nombre'] = $nombreUsuario;
				header('Location: index.php');
				exit();
			} else {
				echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
				exit();
			}*/
		
		
		}		
	} else {
		echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
		exit();
	}
	$rs->free();
}

?>


<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<div id="logo">
		<img class="logo" src="logo.png">
	</div>

	<?php
		if (count($erroresFormulario) > 0) {
			echo '<ul class="errores">';
		}
		foreach($erroresFormulario as $error) {
			echo "<li>$error</li>";
		}
		if (count($erroresFormulario) > 0) {
			echo '</ul>';
		}
	?>		
		



	<div id="registro">
		<form action="procesarRegistro.php" method="POST">
		<fieldset id="campo">
		<legend id="log">Registro</legend>
		<p id="reg"><label id="reg">Usuario:</label> <input type="text" name="username" value=""></p>
		<p id="reg"><label id="reg">Nombre:</label> <input type="text" name="nombre" value=""></p>
		<p id="reg"><label id="reg">Apellidos:</label> <input type="text" name="apellido" value=""></p>
		<p id="reg"><label id="reg">Correo:</label> <input type="text" name="correo" value=""></p>
		<p id="reg"><label id="reg">Teléfono:</label> <input type="text" name="telefono" value=""></p>
		<p id="reg"><label id="reg">Contraseña:</label> <input type="password" name="password" value=""></p>
		<p id="reg"><label id="reg">Repetir Contraseña:</label> <input type="password" name="password2" value=""></p>
		<button id= "index" type="submit" name="registro">Validar</button>
		</fieldset>
		</form>
	</div>




</body>
</html>