<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Equipo.php';
require_once __DIR__.'/includes/Deporte.php';
require_once __DIR__.'/includes/Eventos.php';
require_once __DIR__.'/includes/RegistroEvento.php';

if (! isset($_SESSION['login']) ) {
    header('Location: login.php');
    exit();
}


//al hacer un post de una etiqueta select:


$erroresFormulario = array();

if (isset($_SESSION["esAdmin"]) && $_SESSION["esAdmin"] == true )
{

	$fecha_creacion=date("Y-m-d");

	$nombre_evento = isset($_POST['evento']) ? $_POST['evento'] : null;

	if ( empty($nombre_evento) || mb_strlen($nombre_evento) < 5 )
	{
		$erroresFormulario[] = "El nombre del evento tiene que tener una longitud de al menos 5 caracteres.";
	}

	$equipo = isset($_POST['equipo']) ? $_POST['equipo'] : null;
	if ( empty($equipo) || mb_strlen($equipo) < 5 )
	{
	    $erroresFormulario[] = "El equipo tiene que tener una longitud de al menos 5 caracteres.";
	}

}
else
{
	$erroresFormulario = "NO eres el administrador del equipo.";
}


if (count($erroresFormulario) == 0)
{
	$eventos = Eventos::listarEventos();
	$equipos = Jugador::listaEquiposPorJugador($_SESSION["nombre"]);

	$registro = RegistroEvento::crearRegistroEvento($nombre_evento, $equipo, $fecha_creacion);
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
	if (isset($_SESSION["admin"]))
	{
		?>
			<div id="contenido">
		<form action="procesarRegistroEvento.php" method="POST">
			<fieldset id="evento">
				<legend id="log">Registra tu equipo en el evento</legend>
					<p id="log">Evento: <input list="even" name="evento">
						<datalist id="even">
								<?php
										foreach ($eventos as $valor) { 
						  					echo '<option value="'.$valor->nombre_evento().'" >'.$valor->nombre_evento().'</option>';
						  				}?>
							</datalist>			
						</input></p>
					<p id="log">Equipos: <input list="equipos" name="equipo">
						<datalist id="equipos">
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
						</datalist>	
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
		<div id="contenido">	

				<?php 
				for ($i = 0; $i < count($erroresFormulario); $i++) {?>
				<p>	<?php echo $erroresFormulario; ?> </p>
				<?php
				}
				?>
				<a href="Eventos.php">Volver a eventos</a>
		</div>
	<?php
	}
	?>
	
	
	<?php 
		include("includes/comun/pie.php"); 
	?>

</body>
</html>