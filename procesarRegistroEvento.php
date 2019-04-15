<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Equipo.php';
require_once __DIR__.'/includes/Deporte.php';
require_once __DIR__.'/includes/Evento.php';

if (! isset($_SESSION['login']) ) {
    header('Location: login.php');
    exit();
}

$erroresFormulario = array();


$nombre_evento = isset($_POST['evento']) ? $_POST['evento'] : null;
if ( empty($nombre_evento) || mb_strlen($nombre_evento) < 5 ) {
	$erroresFormulario[] = "El nombre del evento tiene que tener una longitud de al menos 5 caracteres.";
}

$equipo = isset($_POST['equipo']) ? $_POST['equipo'] : null;
if ( empty($equipo) || mb_strlen($equipo) < 5 ) {
    $erroresFormulario[] = "El equipo tiene que tener una longitud de al menos 5 caracteres.";
}

$evento = Eventos::buscaEvento($nombre_evento);

if(empty($evento))
{
	$erroresFormulario[] = "El evento no existe";
}
else
{
	$deporte = Deporte::buscaDeporte($evento->deporte);

}

$equipo = Equipo::buscaEquipo($equipo);

if(empty($equipo))
{
	$erroresFormulario[] = "El equipo no existe";
}
else
{
	if($deporte->id() != $equipo->deporte())
	{
		$erroresFormulario[] = "Tú equipo no esta autorizado para registrarse en este evento";
	}

}

if (count($erroresFormulario) === 0) {

	$fecha_creacion=date("Y-m-d");
	$registro = RegistroEvento::crearRegistroEvento($nombre_evento, $equipo, $equipo->get_p_victorias(), $fecha_creacion));



	if(empty($registro))
	{
		$erroresFormulario[] = "Error al registrar el equipo en el evento";
	}
	else 
    {       
            header('Location: misEventos.php');
            exit();
    }  
}

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
		require("includes/comun/menu.php");
	?>

	<div id="logo">
		<img class="logo" src="images/logo.png">
	</div>

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

	<div id="contenido">
		<form action="procesarRegistroEvento.php" method="POST">
				<fieldset id="evento">
				<legend id="log">REGISTRA TU EQUIPO EN UN EVENTO</legend>
					<p id="log">Evento: <input list="eventos" name="evento">
						<datalist id="eventos">
								<?php
										foreach ($eventos as $valor) { 
						  					echo '<option value="'.$valor->nombre_evento().'" >'.$valor->nombre_evento().'</option>';
						  		?>
							</datalist>		
						</input></p>
					<p id="log">Equipos: <input list="equipos" name="equipo">
						<datalist id="equipos">
								<?php
										foreach ($equipos as $valor) { 
						  					echo '<option value="'.$valor->set_nombre_equipo().'" >'.$valor->set_nombre_equipo().'</option>';
						  		?>
						</datalist>	
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