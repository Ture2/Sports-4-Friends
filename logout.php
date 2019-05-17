<?php 
	header('Refresh: 3; URL=index.php');
	require_once __DIR__.'/includes/config.php';

	//Doble seguridad: unset + destroy
	unset($_SESSION["login"]);
	unset($_SESSION["esAdmin"]);

	//pruebagit
	unset($_SESSION["nombre"]);
	session_destroy();
	
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
		<div id="adios">
			<h1 id="out">Cerrando Sesión</h1>
			<h2 id="p5">Será redireccionado automáticamente.</h2>
		</div>
	</div>

	<?php  
		include("includes/comun/pie.php"); 
	?>
</body>
</html>

