<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Crear Evento</title>
</head>
<body>

	<?php 
		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
		<div>
			<fieldset id="avatar">
				<img class="logoC" src="images/event.png">
				<div>
					<input type="file" name="imagen">
				</div>
			</fieldset>
		</div>

		<div id="">
			<form action="MisEventos.php" method="POST">
			<fieldset id="event">
			<p><label>Nombre del evento:</label> <input type="text" name="name" value=""></p>
			<p><label>Fecha del evento:</label> <input type="date" name="fecha" value=""></p>
			<p><label>Deporte:</label> <input type="text" name="sport" value=""></p>
			<p><label>Descripción del evento: </label><textarea></textarea></p>
			<div id="event">
				<button id="event" type="submit" name="crear">Crear</button>
				<button formaction="eventos.php" id="event" type="submit" name="volver">Volver</button>
			</div>
			</fieldset>
			</form>
		</div>
			<?php /*AQUI DEBERIA IR EL CODIGO QUE GUARDE ESTO EN LA BASE DE DATOS*/ ?>
	</div>

	<?php  
		require("includes/comun/pie.php");  
	?>

</body>
</html>