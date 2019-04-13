<?php
	require_once __DIR__.'/includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<?php
		require("../includes/comun/cabecera.php");
		require("menu.php");
	?>
	
	<div id="registro">
		<form action="procesarEvento" method="POST">
				<fieldset id="campo">
				<legend id="log">Registra tu Equipo en el evento</legend>
					<p id="reg"><label id="reg">Nombre evento:</label> <input type="text" name="nombreEvento" value=""></p>
					<p id="reg"><label id="reg">deporte:</label> <input type="text" name="deporte" value=""></p>
					<p id="reg"><label id="reg">ciudad:</label> <input type="text" name="ciudad" value=""></p>
					<p id="reg"><label id="reg">municipio:</label> <input type="text" name="municipio" value=""></p>
					<p id="reg"><label id="reg">localizacion:</label> <input type="text" name="localizacion" value=""></p>
					<p id="reg"><label id="reg">Fecha evento:</label> <input type="text" name="fecha" value=""></p>
					<p id="reg"><label id="reg">Hora evento:</label> <input type="text" name="hora" value=""></p>
					<p id="reg"><label id="reg">descripcion:</label> <input type="text" name="descripcion" value=""></p>

					<!---
						IMPORTANTE
						introducir una foto para el evento-->
						</datalist>	
							</input>	

			 NickUser:<input type="text" name="nickUsuario" value="">
			<button id= "index" type="submit" name="registro">Validar</button>
		</fieldset>
	</form>
	</div>
	<?php 
		include("includes/comun/pie.php"); 
	?>
</body>
</html>
