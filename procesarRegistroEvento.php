<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Jugador.php';
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

$eventos = Eventos::listarEventos();
$equipos = Jugador::listaEquiposPorJugador($_SESSION["nombre"]);

if(count($erroresFormulario) == 0)
{
	$tuplaEvento = Eventos::buscaEvento($nombre_evento);

	$existeJugador = Jugador::getJugadorPorNombreDeUnEquipo($_SESSION["nombre"], $equipo);


	if ($existeJugador != null)
	{
		$tuplaEquipo = Equipo::getInfoPorNombre($equipo);
		$tuplaDeporte = Deporte::buscaDeportePorId($tuplaEquipo->get_deporte());

		//si el deporte es el mismo 
		$deporteEvento = $tuplaEvento->deporte();
		$deporte =$tuplaDeporte->nombreDeporte();
		$rolJugador = $existeJugador->get_rol_jugador();

		if (strcasecmp($deporteEvento, $deporte) == 0)
		{
			if($rolJugador == 1)
			{
				$registro = RegistroEvento::crearRegistroEvento($nombre_evento, $equipo, $fecha_creacion);
				var_dump($registro);

				if($registro)
				{
				
					$erroresFormulario[] = "El equipo ya esta registrado en este evento";
				}
				else
				{
					$registroEvento = RegistroEvento::buscaRegistroEvento($nombre_evento, $equipo);
				}
			}
			else
			{
				$erroresFormulario[] = "Solo el administrador del equipo puede registrarse en el evento";
			}

		}
		else
		{
			$erroresFormulario[] = "Tu equipo no puede inscribirse en este evento";
		}

	}
	else
	{
		$erroresFormulario[] = "El usuario no pertenece a ningún equipo";
	}
}



var_dump($erroresFormulario);
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
		if (count($erroresFormulario) > 0)
		{
			?>

			<div id="contenido">

				<div id="error">
					<fieldset id="errorReg">
						<legend id="error">ERROR</legend>
							<?php
								foreach ($erroresFormulario as $value) { ?>
									<p> <?= $value ?> </p>
							<?php
								}
							?>

					</fieldset>		
				</div>	

				<form action="procesarRegistroEvento.php" method="POST">
					<fieldset id="evento">
						<legend id="log">Registra tu equipo en el evento</legend>
							<p id="log">Evento: 
								<select name="evento">
									<?php
										foreach ($eventos as $valor) { 
						  					echo '<option value="'.$valor->nombre_evento().'" >'.$valor->nombre_evento().'</option>';
						  			}?>
								</select>			
							</input></p>

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
		}
		else
		{
		?>
			<div id="error">
					<fieldset id="errorReg">
						<legend  >TU EQUIPO SE HA REGISTRO CON EXITO</legend>
							<p><?= $registroEvento->evento();?></p>
							<p><?= $registroEvento->equipo();?></p>
							<p><?= $registroEvento->fecha_creacion();?></p>
						</br></br>
							<button><a href="misEventos.php">VUELVE A MIS EVENTOS</a></button>
					</fieldset>		
				</div>	
		<?php	
		}
	}
	?>
	
	<?php 
		include("includes/comun/pie.php"); 
	?>

</body>
</html>