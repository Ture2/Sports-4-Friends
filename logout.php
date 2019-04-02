<?php 
	session_start(); 

	unset($_SESSION);

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
		require("menu.php"); 
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