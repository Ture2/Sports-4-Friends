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
				echo "<h1 id='h'>NO PUEDES ACCEDER AL CONTENIDO</h1>";
				echo "<div id='errorQuedada2'>";
				echo "<form>";
					echo "<button formaction='login.php' type='submit' class='login-equipos'>INICIAR SESIÓN</button></a>";
					echo "<button formaction='registro.php' type='submit' class='login-equipos'>REGISTRO</button></a>";
					echo "<button formaction='index.php' type='submit' class='login-equipos'>VOLVER</button></a>";
				echo "</form>";
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