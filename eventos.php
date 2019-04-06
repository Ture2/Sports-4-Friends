<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Eventos.php';

$errores = array();

$eventos = Eventos::listarEventos();

var_dump($eventos);

if(isset($_SESSION["login"])){

	$eventos = Eventos::listarEventos();
	if(!sset($eventos)){
		$errores[] = "No hay registros disponibles";
	}
}
else{
	$errores[] = "No puedes acceder al contenido";
}
		
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<title>Eventos</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
		require("includes/comun/menu.php");
	?>	

	<div id= "contenido">

		<?php
		if (isset($_SESSION["login"]))
		{
		?>
		<h1>TORNEO 3V3 DE BALONCESTO </h1>
		<img id="evento1" src="images/evento1.jpg">evento1_3vs3_baloncesto</img>

		<p>Solo pueden inscribirsen los lideres de los equipos. Si no tienes equipo y quieres participar
			crear un <a href="crearEquipo.php">EQUIPO</a> y reune amigos para participar (minimo 3 personas)
		</p>

		<?php
		}
		else{
		?>
		<p>Debes hacer <a href="login.php">login</a> o <a 	href="registro.php">registrarte</a> para
		poder ver el contenido de los PROXIMOS EVENTOS DE TU CIUDAD </p>
		<?php
		}
		?>

	</div>

	<?php
	require("includes/comun/pie.php");
	?>	
</body>
</html>