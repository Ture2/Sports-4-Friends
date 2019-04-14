<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Deporte.php';

if($_SESSION["esAdmin"] == true){

	$deporte = Deporte::getAll();

else{
	header('Location: eventos.php');
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
		//require("includes/comun/menu.php");
	?>
	
	<?php
	if ($_SESSION['esAdmin'] == true)
	{
	?>
		<div id="registro">
			<form action="procesarEvento.php" method="POST" enctype="multipart/form-data">
					<fieldset id="campo">
							<legend id="log">REGISTRO DEL EVENTO</legend>
								<p id="reg"><label id="reg">Nombre evento:</label> <input type="text" name="nombre_evento" value=""></p>
								<p id="log">Deporte:
									<select name="deporte" id="dep" required>
										<?php foreach ($deporte as $valor) { 
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
	}
	?>

	<?php 
		include("includes/comun/pie.php"); 
	?>
</body>
</html>
