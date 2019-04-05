 <?php
 	session_start();
	$Error = "";
	if(!isset(($_SESSION['login']))){
		$Error = "No tienes una sesión iniciada.";
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div>
		<?php
			echo $Error;
		  ?>
	</div>
	<div id="cabecera">
		<div id="logoC">
			<img class="logoC" src="images/logo.png">
		</div>
	</div>
</body>
</html>