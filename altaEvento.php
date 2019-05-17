<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Deporte.php';

if (!isset($_SESSION['esAdmin'])) {
    header('Location: login.php');
    exit();
}

$deporte = Deporte::getAll();

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Alta</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>
	<div id="contenido">
	<?php
	if ($_SESSION['esAdmin'] == true)
	{
	?>
		<div id="datos">
			<form action="procesarEvento.php" method="POST" enctype="multipart/form-data">
					<fieldset id="quedada">
							<legend id="log">REGISTRO DEL EVENTO</legend>
								<p id="log">Nombre Evento: <input type="text" name="nombre_evento"  required value=""></p>
								<p id="log">Deporte:
									<select name="deporte" id="dep" required>
										<?php foreach ($deporte as $valor) { 
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

	<?php
	}
	?>
	</div>

	<?php 
		include("includes/comun/pie.php"); 
	?>
</body>
</html>
