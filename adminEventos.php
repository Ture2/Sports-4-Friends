<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/RegistroEvento.php';

//guardamos en un array los posibles errores que puedan darse
$errores = array();

if(isset($_SESSION["esAdmin"])){
	
	/*
	CONSULTA SQL:
	todos los equipos donde pertenezca el usuario y ademas este registrado el equipo en un evento
	*/
	$eventos = Eventos::listarEventos();

	if(!isset($eventos)){
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
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<?php
		require("../includes/comun/cabecera.php");
		require("menu.php");
	?>


	<?php
	/*
	mostrar en forma de regilla

	*/

	if (isset($_SESSION["esAdmin"]))
	{
		if(empty($errores == 0))
		{
			//...
		}
		else{
			//....
		}
	}
	else
	{
			//...
	}


	?>

	<?php 
		include("includes/comun/pie.php"); 
	?>
</body>
</html>
