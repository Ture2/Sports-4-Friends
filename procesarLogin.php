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
    $erroresFormulario[] = "El nombre de usuario no puede estar vacÌo";
}

$password = isset($_POST['password']) ? $_POST['password'] : null;
if ( empty($password) ) {
    $erroresFormulario[] = "El password no puede estar vacÌo.";
}

if (count($erroresFormulario) === 0) {
    $usuario = Usuario::buscaUsuario($nombreUsuario);
    
    if (!$usuario) {
        $erroresFormulario[] = "El usuario o el password no coinciden";
    } else {
        if ( $usuario->compruebaPassword($password) ) {
            $_SESSION['login'] = true;
            $_SESSION['nombre'] = $nombreUsuario;
           // $_SESSION['esAdmin'] = strcmp($fila['rol'], 'admin') == 0 ? true : false;
            header('Location: index.php');
            exit();
        } else {
            $erroresFormulario[] = "El usuario o el password no coinciden2";
        }
    }
}




?>

<!DOCTYPE html>
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

		<?php
			if (isset($_SESSION["login"])) {  //Usuario incorrecto
					
			    echo "<h1>Bienvenido ". $_SESSION['nombre'] . "</h1>";
			    echo "<p>Usa el men˙ de la izquierda para navegar.</p>";
			}
			else {  //Usuario registrado
				/*echo "<h1>Bienvenido {$_SESSION['nombre']}</h1>";
				echo "<p>Usa el men√∫ para navegar.</p>";*/
				
				echo"<h1>ERROR</h1>";
		    
				foreach($erroresFormulario as $error) {
					echo "<li>$error</li>";
				}
				if (count($erroresFormulario) > 0) {
					echo '</ul>';
				}
			}
		?>

	<div id="login">
		<form action="procesarLogin.php" method="POST">
		<fieldset id="campo">
		<legend id="log">Usuario y contrase√±a</legend>
		<p id="log"><label id="reg">Usuario:</label> <input type="text" name="username" value=""></p>
		<p id="log"><label id="reg">Contrase√±a:</label> <input type="password" name="password" value=""></p>
		<button id="index" type="submit" name="login" >Entrar</button>
		</fieldset>
		</form>
	</div>
	<?php 
		include("includes/comun/pie.php"); 
	?>

</body>
</html>