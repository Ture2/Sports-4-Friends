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
	<title>Editar</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>
	<div id="contenido">
	<div id="datos">
		<form action="procesarEditarEvento.php" method="POST" enctype="multipart/form-data">
				<fieldset id="quedada">
						<legend id="log">EDITAR EVENTO</legend>

							<p id="log">Nombre Evento: 
								<select name="nombre_evento" id="evento" required>
									<?php $eventos = Eventos::listarEventos();
										foreach ($eventos as $valor) { 
						  					echo '<option value="'.$valor->nombre_evento().'" >'.$valor->nombre_evento().'</option>';
						  			}?></select></p>

							<p id="log">Deporte: 
								<select name="deporte" id="dep" required>
									<?php $deportes = Deporte::getAll();
										foreach ($deportes as $key => $valor) { 
						  					echo '<option value="'.$valor->nombreDeporte().'" >'.$valor->nombreDeporte().'</option>';
						  			}?></select></p>
<p id="log">Ciudad: <input type="text" name="ciudad"  required value=""></p>
								<p id="log">Municipio: <input type="text" name="municipio" value=""></p>
								<p id="log">Localizaci&oacuten: <input type="text" name="localizacion" required value=""></p>
								<p id="log">Fecha Evento: <input type="date" name="fecha_evento" value="2019-08-08"min="2018-03-25"
                                  max="2020-05-25" step="1"></p>
                                  
								<p id="log">Hora Evento: <input type="time" name="hora_evento" value="11:45:00" max="22:30:00" min="10:00:00" step="1"></p>
								<p id="log">Descripci&oacuten: <input type="text" name="descripcion" value=""></p>
								<p id="log">Imagen del Equipo: <input type="file" name="imagen"></p>
								<button id= "index" type="submit" name="registro">Validar</button>
								<button formnovalidate formaction="adminEventos.php" id="index" type="submit" name="volver">Volver</button>
				</fieldset>
		</form>
	</div>
	</div>

	<?php 
		include("includes/comun/pie.php"); 
	?>


</body>
</html>
