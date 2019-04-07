<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Equipos</title>
</head>
<body>

	<?php 
	require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
			<u><p>EQUIPOS</p></u>
			<div id="team">
				<fieldset id="team1">
					<legend id="team"><a href="pantallaEquipo.php"><button id="index">Equipo 1</button></a></legend>
					<img id="fut" src="fut.png">
				</fieldset>

				<fieldset id="team2">
					<legend id="team"><button id="index">Equipo 2</button></legend>
					<img id="bask" src="bask.png">
				</fieldset>
			</div>
			<div id="opc">
				<ul><li><a href="crearEquipo.php"><button id="opc">Crear Equipo</button></a></li>
				<li><a href="eliminarEquipo.php"><button id="opc">Eliminar Equipo</button></a></li>
				<li><a href="unirEquipo.php"><button id="opc">Unirse a un Equipo</button></a></li>
				<li><a href="salirEquipo.php"><button id="opc">Salir de un Equipo</button></a></li></ul>
			</div>
	</div>

	<?php  
	require("includes/comun/pie.php");  
	?>

</body>
</html>