<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Eventos.php';
require_once __DIR__.'/includes/Jugador.php';



if (!isset($_SESSION['login']) ) {
	header('Location: login.php');
	exit();
}


$errores = array();

$eventos = Eventos::listarEventos();
$equipos = Jugador::listaEquiposPorJugador($_SESSION["nombre"]);

if(empty($equipos))
{
	$errores = "No estan en ningun equipo";
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
	
	<div id="contenido">	

		<form action="procesarRegistroEvento.php" method="POST">
			<fieldset id="evento">
				<legend id="evento">Registra tu equipo en el evento</legend>
					<p id="log">Evento: 
						<select name="evento">
							<?php
								foreach ($eventos as $valor) { 
				  					echo '<option value="'.$valor->nombre_evento().'" >'.$valor->nombre_evento().'</option>';
				  			}?>
						</select>			
					</p>

			<p id="log">Equipos: 
				<select name="equipo">
						<?php
								if(!empty($equipos))
								{
									foreach ($equipos as $valor) {
				  					echo '<option value="'.$valor.'" >'.$valor.'</option>';
				  					}
				  				}
								else
								{
									echo $errores;
				  		}?>
				</select>	
					</input></p>
						
				<button id= "index" type="submit" name="registro">Validar</button>
				<button formaction="eventos.php" id="index" type="submit" name="cancelar">Cancelar</button>
			</fieldset>
		</form>
	</div>

	<?php 
		include("includes/comun/pie.php"); 
	?>

</body>
</html>