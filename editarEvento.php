<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Deporte.php';
require_once __DIR__.'/includes/Eventos.php';


if (!isset($_SESSION['esAdmin'])) {
    header('Location: eventos.php');
    exit();
}

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
	
	<div id="registro">
		<form action="procesarEditarEvento.php" method="POST" enctype="multipart/form-data">
				<fieldset id="campo">
						<legend id="log">EDITAR EVENTOS</legend>

							<p id="reg"><label id="reg">Nombre evento:</label> 
								<select name="evento" id="evento">
									<?php $evento = Eventos::listarEventos();
										foreach ($deportes as $key => $valor) { 
						  					echo '<option value="'.$valor->nombre_evento().'" >'.$valor->nombre_evento().'</option>';
						  			}?></select></p>

							<p id="log">Deporte:
								<select name="deporte" id="dep" required>
									<?php $deportes = Deporte::getAll();
										foreach ($deportes as $key => $valor) { 
						  					echo '<option value="'.$valor->nombreDeporte().'" >'.$valor->nombreDeporte().'</option>';
						  			}?></select></p>

							<p id="reg"><label id="reg">ciudad:</label> <input type="text" name="ciudad" value=""></p>
							<p id="reg"><label id="reg">municipio:</label> <input type="text" name="municipio" value=""></p>
							<p id="reg"><label id="reg">localizacion:</label> <input type="text" name="localizacion" value=""></p>
							<p id="reg"><label id="reg">Fecha evento:</label> <input type="text" name="fecha_evento" value=""></p>
							<p id="reg"><label id="reg">Hora evento:</label> <input type="text" name="hora_evento" value=""></p>
							<p id="reg"><label id="reg">descripcion:</label> <input type="text" name="descripcion" value=""></p>
							<p id="log">Imagen del Equipo: <input type="file" name="imagen"></p>
							<button id= "index" type="submit" name="registro">Validar</button>
				</fieldset>
		</form>
	</div>

	<?php 
		include("includes/comun/pie.php"); 
	?>


</body>
</html>
