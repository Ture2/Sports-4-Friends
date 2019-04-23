
<?php
	
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Usuario.php';

if (! isset($_POST['login']) ) {
    header('Location: login.php');
    exit();
}


$erroresFormulario = array();

$nombreUsuario = isset($_POST['username']) ? $_POST['username'] : null;

if ( empty($nombreUsuario) ) {
    $erroresFormulario[] = "El nombre de usuario no puede estar vacio.";
}

$password = isset($_POST['password']) ? $_POST['password'] : null;
if ( empty($password) ) {
    $erroresFormulario[] = "El password no puede estar vacio.";
}

if (count($erroresFormulario) === 0) {
    $usuario = Usuario::buscaUsuario($nombreUsuario);
    
    if (!$usuario) {
        $erroresFormulario[] = "El usuario o el password no coinciden.";
    } else {
        if ( $usuario->compruebaPassword($password) ) {
            $_SESSION['login'] = true;
            $_SESSION['nombre'] = $nombreUsuario;
            // Comparación de string segura a nivel binario devuelve 0 si son iguales
           	$_SESSION['esAdmin'] = strcmp($usuario->rol(), 'ADMIN') == 0 ? true : false;
            header('Location: index.php');
            exit();
        } else {
            $erroresFormulario[] = "El usuario o el password no coinciden.";
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/LogReg.css" />
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<div id="logo">
		<img class="logo" src="images/logo.png">
	</div>   
	<div id="error">
		<fieldset id="errorLogin">
			<legend id="error">ERROR</legend>
		<?php
			if (isset($_SESSION["login"])) {  //Usuario incorrecto
					
			    echo "<h1>Bienvenido ". $_SESSION['nombre'] . "</h1>";
			    echo "<p>Usa el menú de la izquierda para navegar.</p>";
			}
			else {
		    
				foreach($erroresFormulario as $error) {
					echo "<li>$error</li>";
				}
				if (count($erroresFormulario) > 0) {
					echo '</ul>';
				}
			}
		?>
		</fieldset>
	</div>

	<section class="forms-section">
  <div class="forms">
    <div class="form-wrapper is-active">
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

    <div class="form-wrapper">
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