<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Evento</title>
</head>
<body>

	<?php 
		require("includes/comun/cabecera.php");
	?>


	<?php /*AQUI DEBERIA MOSTRARSE EL EVENTO SELECCIONADO, CON COMPROBACIONES SI ES UNO NORMAL, UNO AL QUE TE HAS UNIDO, SI LO HAS CREADO TU
	Y TODO TAMBIEN COMPROBANDO SI ERES LIDER DE ALGUN EQUIPO PARA PODER CREAR UN EVENTO
	SUSTITUIR TODA LA INFORMACION CON LO QUE HAYA EN LA BASE DE DATOS */ ?>

	<div id="contenido">
		<div>
			<fieldset id="avatar">
				<img class="logoC" src="images/event.png">
			</fieldset>
		</div>

		<div>
			<fieldset id="event">
			<p><label>Nombre del evento</label></p>
			<p><label>Fecha del evento</label></p>
			<p><label>Deporte</label></p>
			<p><label>Descripción del evento</label></p>
			<div id="event">
				<form action="" method="POST">
					<button formaction="MisEventos.php" id="event" type="submit" name="unirse">Unirse</button>
					<button formaction="eventos.php" id="event" type="submit" name="abandonar">Abandonar</button>
					<button formaction="eventos.php" id="event" type="submit" name="eliminar">Eliminar</button>
					<button formaction="eventos.php" id="event" type="submit" name="volver">Volver</button>
				</form>
			</div>
			</fieldset>
		</div>
	</div>

	<?php  
		require("includes/comun/pie.php");  
	?>

</body>
</html>