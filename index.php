<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Inicio</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
		require("contenido.php");
		require("includes/comun/pie.php");  
	?>

	<?php
	if(!isset(($_SESSION['login']))){
	
	echo "<div id='boxes'>";
  	echo "<div id='dialog' class='window'>";
    	echo "<div id='pop'><b>No has iniciado sesión</b></div>";
    	echo "<div id='pop'><b>Si quieres acceder a las funcionalidades regístrate o inicia sesión con tu cuenta.</b></div>";
    	echo "<div id='popupfoot'>";
    		echo " | <a id='popup' class='close' href='#''><b>Seguir Navegando</b></a>";
    		echo " | <a id='popup' href='login.php'><b>Iniciar Sesión</b></a>";
    		echo " | <a id='popup' href='registro.php'><b>Registrarse</b></a> | </div>";
  	echo "</div>";
  		echo "<div id='mask'></div>";
	echo "</div>";
	}
	?>

</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
<script src="javascript/popup.js"></script>
</html>

