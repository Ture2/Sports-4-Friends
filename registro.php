<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
	<meta charset="utf-8">
	<title>Registro</title>
</head>

<body>
	<div id="logo">
		<img class="logo" src="logo.png">
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
		</fieldset>
		</form>
	</div>


</body>
</html>