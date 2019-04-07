<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Mis Eventos</title>
</head>
<body>

	<?php 
		require("includes/comun/cabecera.php");
	?>


	<?php /*AQUI DEBERIA SER IGUAL QUE EL OTRO PERO CON COMPROBACIONES PARA VER SI TIENES EVENTOS CREADOS O A LOS QUE TE HAS UNIDO Y QUE TE LOS MUESTRE*/ ?>

	<div id="contenido">
		<form>
			<button formaction="crearEvento.php" id="eventos" type="submit" name="evento">CREAR EVENTO</button>
			<button formaction="eventos.php" id="eventos" type="submit" name="volver">VOLVER</button>
		</form>
		<div id="eventos">
			<fieldset id="eventos">
				<a href="pantallaEvento.php"><img class="logoC" src="images/event.png"></a>
				<div id="evento">
					<p id="evento">Nombre</p>
					<p id="evento">Fecha</p>
					<p id="evento">Deporte</p>
				</div>
			</fieldset>
				</div>
			</fieldset>
		</div>
	</div>

	<?php  
		require("includes/comun/pie.php");  
	?>

</body>
</html>