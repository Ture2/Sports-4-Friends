 <?php
 	if (!isset($_SESSION)) { session_start(); }
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
	<div id="cabecera">
		<div id="logoC">
			<a href="index.php"><img class="logoC" src="images/logo.png"></a>
		</div>
		<!--div id="cab">
			<?php
				//echo $Error;
		  	?>
		</div-->
		<?php
			require("includes/comun/menu.php");
		?>
	</div>
</body>
</html>