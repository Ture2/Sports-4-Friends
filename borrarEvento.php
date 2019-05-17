<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Eventos.php';


if (!isset($_SESSION['login']) ) {
	header('Location: login.php');
	exit();
}


$errores = array();

$eventos = Eventos::listarEventos();

if(empty($eventos))
{
	$errores = "No estan en ningun equipo";
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Borrar</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>
	
	<div id="contenido">	
		<div id="datos">
		<form action="procesarBorrarEvento.php" method="POST">
			<fieldset id="quedada">
				<legend id="log">BORRAR EVENTO</legend>
					<p id="log">Evento: 
						<select name="evento">
							<?php
								foreach ($eventos as $valor) { 
				  					echo '<option value="'.$valor->nombre_evento().'" >'.$valor->nombre_evento().'</option>';
				  			}?>
						</select>			
					</p>
				<button id= "index" type="submit" name="registro">Borrar</button>
				<button formaction="adminEventos.php" id="index" type="submit" name="cancelar">Cancelar</button>
			</fieldset>
		</form>
	</div>
	</div>

	<?php 
		include("includes/comun/pie.php"); 
	?>

</body>
</html>