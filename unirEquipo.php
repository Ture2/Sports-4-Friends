<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Unirse a Equipo</title>
</head>
<body>

	<?php
		require("cabecera.php");
		require("menu.php");
	?>

	<div id="contenido">
		<div id="crear">
			<fieldset id="crear">
				<legend id="log">EQUIPO</legend>
				<p>Selecciona el Deporte:
				<select>
					<option selected>Seleccione una opción</option>
				   <option value="1">Fútbol</option> 
				   <option value="2">Baloncesto</option> 
				   <option value="3">Tenis</option>
				   <option value="4">Balonmano</option>
				</select></p>
				<p>Nombre del Equipo: <input type="search" name="name"></p>
				<button id="index" type="submit">Unirse</button>
			</fieldset>
		</div>
		
	</div>

	<?php
		require("pie.php");
	?>	

</body>
</html>