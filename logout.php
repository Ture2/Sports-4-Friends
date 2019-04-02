<?php 
require_once __DIR__.'/includes/config.php';

//Doble seguridad: unset + destroy
unset($_SESSION["login"]);
unset($_SESSION["esAdmin"]);
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
		require("includes/comun/menu.php"); 
	?>

	<div id="contenido">
		<div id="adios">
			<h1>Hasta pronto!</h1>
		</div>
	</div>

	<?php  
		include("includes/comun/pie.php"); 
	?>

</body>
</html>