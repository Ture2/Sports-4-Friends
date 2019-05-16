<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Eventos.php';

if (!isset($_SESSION['login']) ) {
	header('Location: login.php');
	exit();
}


$arrayData = array();


$evento = isset($_POST['evento']) ? $_POST['evento'] : null;

if (empty($evento))
{
	$erroresFormulario[] = "Error al procesar el nombre del evento";
}



$eliminarEvento = Eventos::eliminaEvento($evento);

var_dump($eliminarEvento);

if($eliminarEvento)
{
	$arrayData[] = "Se ha eliminado el evento correctamente";
}
else
{
	$arrayData[] = "No se ha podido eliminar el evento";
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
		require("includes/comun/cabecera.php");
	?>

	
	<?php 

	if ($_SESSION["esAdmin"] == true){?>
	
		<div id="contenido">	

			<button> <a href="adminEventos.php"  class='login-equipos' >VOLVER </a> </button>
 
			<div id="error">
					<fieldset id="errorReg">
						<legend id="error"></legend>
							<?php
								foreach ($arrayData as $value) { ?>
									<p> <?= $value ?> </p>
							<?php
								}
							?>
					</fieldset>		
				</div>	



		</div>

	<?php
	}
	?>

	<?php 
		include("includes/comun/pie.php"); 
	?>

</body>
</html>