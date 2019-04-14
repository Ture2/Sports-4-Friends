<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<title>Quedadas</title>
</head>
<body>
	<?php
		require("includes/comun/cabecera.php");
	?>	

	<div id= "contenido">

		<?php
		if (isset($_SESSION["login"])){
				echo "<div id='quedadas'>";
					echo "<h1 id='h1'>Bar Manolo</h1>";
					echo "<img id='quedada' src='images/bar.jpg'></img>";
					echo "<pre id='texto1'>Tu bar de confianza.</pre>";
				echo "</div>";

				echo "<div id='quedadas'>";
					echo "<h1 id='h1'>Parque de la plaza</h1>";
					echo "<img id='quedada' src='images/parque.jpg'></img>";
					echo "<pre id='texto1'>Parque situado en la calle falsa 123.</pre>";
				echo "</div>";

				echo "<div id='quedadas'>";
					echo "<h1 id='h1'>Estadio Imperial</h1>";
					echo "<img id='quedada' src='images/estadio.jpg'></img>";
					echo "<pre id='texto1'>El polideportivo favorito de los deportistas.</pre>";
				echo "</div>";
		}
		else{
			echo "<div id='errorQuedada'>";
				echo "<h1 id='h'>NO PUEDES VER ESTA SECCIÓN</h1>";
				echo "<div id='errorQuedada2'>";
					echo "<a href='login.php'><button class='login-equipos'>INICIAR SESIÓN</button></a>";
					echo "<a href='registro.php'><button class='login-equipos'>REGISTRO</button></a>";
					echo "<a href='index.php'><button class='login-equipos'>VOLVER</button></a>";
				echo "</div>";
			echo "</div>";
		}
		?>
	</div>

	<?php
	require("includes/comun/pie.php");
	?>	
</body>
</html>