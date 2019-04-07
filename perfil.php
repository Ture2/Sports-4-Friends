<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Perfil</title>
</head>
<body>

	<?php  
	require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
		<div id="datos">
			<div id="perfil">
			<fieldset id="avatar">
				<img class="logoC" src="images/user.png">
				<div>
					<input type="file" name="imagen">
				</div>
			</fieldset>
			</div>
			<fieldset id="perfil"> <!-- CAMBIAR LOS DATOS POR LOS DATOS DE LA BASE DE DATOS -->
				<p>Nombre:</p>
				<p>Apellido:</p>
				<p>Correo:</p>
				<p>Usuario:</p>
				<p>Teléfono:</p>
			</fieldset>
		</div>
	</div>

	<?php  
	require("includes/comun/pie.php");  
	?>

</body>
</html>