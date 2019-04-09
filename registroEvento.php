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
		<form action="procesarRegistroEvento.php" method="POST">
				<fieldset id="campo">
				<legend id="log">Registra tu Equipo en el evento</legend>
					Evento:<input list="lEventos" name="evento">
						<datalist id="lEventos">
								<option>Url</option>
								<option>PRU1E</option>
								<option>PRUE2</option>
								<option>PRUE3</option>
								<option>PRUE4</option>
								<option>PRUE5</option>
							</datalist>			
						</input>
					Equipos:<input list="lEquipos" name="equipo">
						<datalist id="lEquipos">
								<option>Url</option>
								<option>PRU1E</option>
								<option>PRUE2</option>
								<option>PRUE3</option>
								<option>PRUE4</option>
								<option>PRUE5</option>
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
