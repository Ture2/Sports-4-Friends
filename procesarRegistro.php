
<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Usuario.php';

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

$correo = isset($_POST['correo']) ? $_POST['correo'] : null;
if ( empty($correo) || mb_strlen($correo) < 2 ) {
    $erroresFormulario[] = "El correo tiene que tener una longitud de al menos 5 caracteres.";
}

$password = isset($_POST['password']) ? $_POST['password'] : null;
if ( empty($password) || mb_strlen($password) < 3 ) {
	$erroresFormulario[] = "El password tiene que tener una longitud de al menos 5 caracteres.";
}
$password2 = isset($_POST['password2']) ? $_POST['password2'] : null;
if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
	$erroresFormulario[] = "Los passwords deben coincidir.";
}

if (count($erroresFormulario) === 0) {
	$usuario = Usuario::crea($nombreUsuario, $nombre, $correo, $password, 'USER');
    
    if (! $usuario ) {
        $erroresFormulario[] = "El usuario ya existe.";
    } else {
        $_SESSION['login'] = true;
        $_SESSION['nombre'] = $nombreUsuario;
        header('Location: index.php');
        exit();
        
    }
}

?>


<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<div id="logo">
		<img class="logo" src="images/logo.png">
	</div>
<div id="error">
	<fieldset id="errorReg">
		<legend id="error">ERROR</legend>
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
	</fieldset>		
</div>		



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
		<button formaction="index.php" id="index" type="submit" name="volver">Volver</button>
		</fieldset>
		</form>
	</div>




</body>
</html>