<?php
require_once __DIR__.'/includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Registro</title>
</head>

<body>
	<div>
		<img class="logo" src="images/logo.png">
	</div>

	<div id="registro">
		<form action="procesarRegistro.php" method="POST">
		<fieldset id="crear">
			<legend id="log">Registro</legend>
			<p id="reg"><label id="reg">Usuario*:</label> <input type="text" name="username" required></p>
			<p id="reg"><label id="reg">Nombre*:</label> <input type="text" name="nombre" required></p>
			<p id="reg"><label id="reg">Correo*:</label> <input type="email" name="correo" required></p>
			<p id="reg"><label id="reg">Contraseña*:</label> <input type="password" name="password" minlength="4" maxlength="16" required></p>
			<p id="reg"><label id="reg">Repetir Contraseña*:</label> <input type="password" name="password2" minlength="4" maxlength = "16" required></p>
			<button id= "index" type="submit" name="registro">Validar</button>
			</form>
			<button formnovalidate formaction="index.php" type="submit" id="index" name="volver">Volver</button>
		</fieldset>
	</div>
</body>
</html>