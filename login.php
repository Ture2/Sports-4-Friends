<?php

    require_once __DIR__.'/includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Login</title>
</head>

<body>
	<div id="logo">
		<img class="logo" src="images/logo.png">
	</div>

	<div id="login">
		<form action="procesarLogin.php" method="POST">
		<fieldset id="campo">
		<legend id="log">Usuario y contraseña</legend>
		<p id="log"><label id="reg">Usuario:</label> <input type="text" name="username" value=""></p>
		<p id="log"><label id="reg">Contraseña:</label> <input type="password" name="password" value=""></p>
		<button id="index" type="submit" name="login">Entrar</button>
		<button formaction="index.php" id="index" type="submit" name="volver">Volver</button>
		</fieldset>
		</form>
	</div>

</body>
</html>