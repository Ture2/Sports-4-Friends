<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Eventos</title>
</head>
<body>

	<?php 
		require("includes/comun/cabecera.php");
	?>


	<?php /*AQUI SE DEBERIA CONSULTAR LA BASE DE DATOS PARA QUE MUESTRE TODOS LOS EVENTOS DISPONIBLES, 
	DONDE PONE NOMBRE-FECHA-DEPORTE QUE SE ACTUALICE AUTOMATICAMENTE
	TAMBIEN ALGO QUE GENERE <DIV> PARA QUE ALMACENE ESOS DATOS*/ ?>

	<div id="contenido">
		<form>
			<button formaction="crearEvento.php" id="eventos" type="submit" name="evento">CREAR EVENTO</button>
			<button formaction="MisEventos.php" id="eventos" type="submit" name="MisEventos">MIS EVENTOS</button>
		</form>
		<div id="eventos">
			<fieldset id="eventos">
				<a href="pantallaEvento.php"><img class="logoC" src="images/event.png"></a>
				<div id="evento">
					<p id="evento">Nombre</p>
					<p id="evento">Deporte</p>
					<p id="evento">Fecha</p>
					<p id="evento">Hora</p>
					<p id="evento">Ubicación</p>
				</div>
			</fieldset>
			<fieldset id="eventos">
				<img class="logoC" src="images/event.png">
				<div id="evento">
					<p id="evento">Nombre</p>
					<p id="evento">Deporte</p>
					<p id="evento">Fecha</p>
					<p id="evento">Hora</p>
					<p id="evento">Ubicación</p>
				</div>
			</fieldset>
			<fieldset id="eventos">
				<img class="logoC" src="images/event.png">
				<div id="evento">
					<p id="evento">Nombre</p>
					<p id="evento">Deporte</p>
					<p id="evento">Fecha</p>
					<p id="evento">Hora</p>
					<p id="evento">Ubicación</p>
				</div>
			</fieldset>
			<fieldset id="eventos">
				<img class="logoC" src="images/event.png">
				<div id="evento">
					<p id="evento">Nombre</p>
					<p id="evento">Deporte</p>
					<p id="evento">Fecha</p>
					<p id="evento">Hora</p>
					<p id="evento">Ubicación</p>
				</div>
			</fieldset>
			<fieldset id="eventos">
				<img class="logoC" src="images/event.png">
				<div id="evento">
					<p id="evento">Nombre</p>
					<p id="evento">Deporte</p>
					<p id="evento">Fecha</p>
					<p id="evento">Hora</p>
					<p id="evento">Ubicación</p>
				</div>
			</fieldset>
			<fieldset id="eventos">
				<img class="logoC" src="images/event.png">
				<div id="evento">
					<p id="evento">Nombre</p>
					<p id="evento">Deporte</p>
					<p id="evento">Fecha</p>
					<p id="evento">Hora</p>
					<p id="evento">Ubicación</p>
				</div>
			</fieldset>
			<fieldset id="eventos">
				<img class="logoC" src="images/event.png">
				<div id="evento">
					<p id="evento">Nombre</p>
					<p id="evento">Deporte</p>
					<p id="evento">Fecha</p>
					<p id="evento">Hora</p>
					<p id="evento">Ubicación</p>
				</div>
			</fieldset>
		</div>
	</div>

	<?php  
		require("includes/comun/pie.php");  
	?>

</body>
</html>