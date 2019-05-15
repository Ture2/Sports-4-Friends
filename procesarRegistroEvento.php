<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Jugador';
require_once __DIR__.'/includes/Equipo.php';
require_once __DIR__.'/includes/Deporte.php';
require_once __DIR__.'/includes/Eventos.php';
require_once __DIR__.'/includes/RegistroEvento.php';

if (! isset($_SESSION['login']) ) {
    header('Location: login.php');
    exit();
}


$erroresFormulario = array();

$fecha_creacion=date("Y-m-d");

$nombre_evento = isset($_POST['evento']) ? $_POST['evento'] : null;

if ( empty($nombre_evento))
{
	$erroresFormulario[] = "Error al procesar el nombre del evento";
}

$equipo = isset($_POST['equipo']) ? $_POST['equipo'] : null;
if ( empty($equipo))
{
	    $erroresFormulario[] = "Error al procesar el nombre del equipo";
}


if(count($erroresFormulario) == 0 )
{

	$tuplaEvento = Evento::buscaEvento($nombre_evento);

	$existeJugador = Jugador::getJugadorPorNombreDeUnEquipo($nickname, $equipo);

	if ($existeJugador ! null)
	{
		$tuplaEquipo = Equipo::getInfoPorNombre($equipo);
		$tuplaDeporte = Deporte::buscaDeportePorId($tuplaEquipo->get_deporte());

		//si el deporte es el mismo 
		if ($tuplaEvento->deporte() === $ $tuplaDeporte->nombreDeporte())
		{

			//ahora si existe un evento con este equipo
			$existeEquipoEnRegistroEvento = RegistroEvento::buscaRegistroEventosEquipo($equipo);

			if ($existeEquipoEnRegistroEvento ! null)
			{

				$registro = RegistroEvento::crearRegistroEvento($nombre_evento, $equipo, $fecha_creacion);
			}
			else
			{
				$erroresFormulario ="El equipo ya esta registrado"
			}
		}
		else
		{
			$erroresFormulario[] = "Tu equipo no puede inscribirse en el evento"
		}

	}
	else
	{
		$erroresFormulario[] = "El usuario no pertenece a ningún equipo";
	}
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
	if (isset($_SESSION["login"]))
	{
		if (count($erroresFormulario) >= 0)
		{
			?>

			<div id="contenido">

				<div id="error">
					<fieldset id="errorReg">
						<legend id="error">ERROR</legend>
							<?php
								if (count($erroresFormulario) > 0) {
									echo '<ul class="errores">';
								}
								foreach($erroresFormulario as $error) {
									echo "<li>$error</li>";
								}
								if (count($erroresFormulario) > 0) {
									echo '</ul>';
								}
							?>
					</fieldset>		
				</div>	

				<form action="procesarRegistroEvento.php" method="POST">
					<fieldset id="evento">
						<legend id="log">Registra tu equipo en el evento</legend>
							<p id="log">Evento: 
								<select id="even">
									<?php
										foreach ($eventos as $valor) { 
						  					echo '<option value="'.$valor->nombre_evento().'" >'.$valor->nombre_evento().'</option>';
						  			}?>
								</select>			
							</input></p>

					<p id="log">Equipos: 
						<select id="equipos">
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
		}
		else
		{
			echo '<p> TE HAS REGISTRADO EN EL EVENTO:';
			echo  $tuplaEvento->evento();
			echo  $tuplaEvento->equipo();
			echo  $tuplaEvento->fecha_creacion();
		}
	}
	?>
	
	<?php 
		include("includes/comun/pie.php"); 
	?>

</body>
</html>