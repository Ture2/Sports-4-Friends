<?php 
require_once __DIR__.'/includes/config.php';
//require_once __DIR__.'/includes/Usuario.php';
require_once __DIR__.'/includes/Deporte.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Crear Equipo</title>
</head>
<body>

	<?php

		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
		<div id="crear">
			<fieldset id="crear">
				<legend id="log">EQUIPO</legend>
				<form action="procesarCrearEquipo.php" enctype="multipart/form-data" method="post">
				<p id="log">Nombre del Equipo: <input type="text" name="name" required></p>
				<p id="log">Deporte:
				<select name="deporte" id="dep" required>
					<?php

					$deportes = Deporte::getAll();
						
						foreach ($deportes as $valor) { 
							//echo $valor. " ";
						  	echo '<option value="'.$valor->nombreDeporte().'" >'.$valor->nombreDeporte().'</option>';
						  }  
					?>
				</select></p>
				<p id="log">Imagen del Equipo: <input type="file" name="imagen"></p>
				<p id="log">Descripcion (max 50): <textarea type="text" name="desc" maxlength="50"></textarea></p>
				<button id="index" type="submit" name="crear">CREAR</button>
				<button onclick="history.back()" id="index" type="submit" name="volver">VOLVER</button>
				</form>
			</fieldset>
		</div>
		
	</div>

	<?php
		require("includes/comun/pie.php");
	?>	

</body>
</html>