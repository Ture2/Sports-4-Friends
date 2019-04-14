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
		require("includes/comun/cabecera.php");
	?>
	
	<div id="contenido">
		<form action="procesarRegistroEvento.php" method="POST">
				<fieldset id="evento">
				<legend id="log">Registra tu equipo en el evento</legend>
					<p id="log">Evento: <input list="lEventos" name="evento">
						<datalist id="lEventos">
								<option>Url</option>
								<option>PRU1E</option>
								<option>PRUE2</option>
								<option>PRUE3</option>
								<option>PRUE4</option>
								<option>PRUE5</option>
							</datalist>			
						</input></p>
					<p id="log">Equipos: <input list="lEquipos" name="equipo">
						<datalist id="lEquipos">
								<option>Url</option>
								<option>PRU1E</option>
								<option>PRUE2</option>
								<option>PRUE3</option>
								<option>PRUE4</option>
								<option>PRUE5</option>
						</datalist>	
							</input></p>	

			 <p id="log">NickUser: <input type="text" name="nickUsuario" value=""></p>
			<button id= "index" type="submit" name="registro">Validar</button>
			<button formaction="eventos.php" id="index" type="submit" name="cancelar">Cancelar</button>
		</fieldset>
	</form>
	</div>
	<?php 
		include("includes/comun/pie.php"); 
	?>
</body>
</html>
