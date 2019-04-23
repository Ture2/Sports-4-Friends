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
	<title></title>
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
					<fieldset id="perfil">
							<legend id="log">REGISTRO DEL EVENTO</legend>
								<p id="perfil">Nombre Evento: <input type="text" name="nombre_evento" value=""></p>
								<p id="perfil">Deporte:
									<select name="deporte" id="dep" required>
										<?php foreach ($deporte as $valor) { 
							  					echo '<option value="'.$valor->nombreDeporte().'" >'.$valor->nombreDeporte().'</option>';
							  			}?></select></p>
								<p id="perfil">Ciudad: <input type="text" name="ciudad" value=""></p>
								<p id="perfil">Municipio: <input type="text" name="municipio" value=""></p>
								<p id="perfil">Localización: <input type="text" name="localizacion" value=""></p>
								<p id="perfil">Fecha Evento: <input type="text" name="fecha_evento" value=""></p>
								<p id="perfil">Hora Evento: <input type="text" name="hora_evento" value=""></p>
								<p id="perfil">Descripción: <input type="text" name="descripcion" value=""></p>
								<p id="perfil">Imagen del Equipo: <input type="file" name="imagen"></p>
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
