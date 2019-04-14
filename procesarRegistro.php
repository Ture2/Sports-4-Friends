
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

	<section class="forms-section">
  <div class="forms">
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-login">
        Iniciar Sesi&oacuten
        <span class="underline"></span>
      </button>
      <form action="procesarLogin.php" method="POST" class="form form-login">
        <fieldset>
          <div class="input-block">
            <label for="login-username">Usuario</label>
            <input id="login-username" type="text" name="username" required>
          </div>
          <div class="input-block">
            <label for="login-password">Contrase&ntildea</label>
            <input id="login-password" type="password" name="password" required>
          </div>
        </fieldset>
        <button type="submit" class="btn-login" name="login">Iniciar Sesi&oacuten</button>
        <button formnovalidate formaction="index.php" type="submit" class="btn-login" name="volver">Inicio</button>
      </form>
    </div>

    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-signup">
        Registro
        <span class="underline"></span>
      </button>
      <form action="procesarRegistro.php" method="POST" class="form form-signup">
        <fieldset>
          <div class="input-block">
            <label for="signup-username">Usuario</label>
            <input id="signup-username" type="text" name="username" required>
          </div>
          <div class="input-block">
            <label for="signup-nombre">Nombre</label>
            <input id="signup-nombre" type="text" name="nombre" required>
          </div>
          <div class="input-block">
            <label for="signup-correo">Correo</label>
            <input id="signup-correo" type="email" name="correo" required>
          </div>
          <div class="input-block">
            <label for="signup-password">Contrase&ntildea</label>
            <input id="signup-password" type="password" name="password" required>
          </div>
          <div class="input-block">
            <label for="signup-password-confirm">Confirmar Contrase&ntildea</label>
            <input id="signup-password-confirm" type="password" name="password2" required>
          </div>
        </fieldset>
        <button type="submit" class="btn-signup" name="registro">Crear Cuenta</button>
        <button formnovalidate formaction="index.php" type="submit" class="btn-signup" name="volver">Inicio</button>
      </form>
    </div>
</section>

</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
<script src="javascript/LogReg.js"></script>
</html>