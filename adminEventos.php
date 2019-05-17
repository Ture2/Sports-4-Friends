<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Eventos.php';


if (!isset($_SESSION['esAdmin'])) {
    header('Location: eventos.php');
    exit();
}


$errores = array();


$eventos = Eventos::listarEventos();

if(!isset($eventos))
{
	$errores[] = "No hay registros disponibles";
}
else
{
	$errores[] = "No puedes acceder al contenido";
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>ADMINISTRAR EVENTOS</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>

	
	<?php
	
	if ($_SESSION["esAdmin"] == true){
		if(empty($errores == 0)) 
		{
		?>
			<div id="contenido">
				<form>
					<button formaction='altaEvento.php' type='submit' class='login-equipos'>CREAR EVENTO</button></a>
					<button formaction='editarEvento.php' type='submit' class='login-equipos'>EDITAR EVENTO</button></a>
					<button formaction='borrarEvento.php' type='submit' class='login-equipos'>BORRAR EVENTO</button></a>
					<button formaction='eventos.php' type='submit' class='login-equipos'>VOLVER</button></a>

				</form>
				
				<div id="evento1">
					
						<?php foreach ($eventos as $value) {?>
						<div>
							<fieldset id="evento1">
							<h1 id="evento"><?=$value->nombre_evento();?></h1>
							<p id="evento"><?=$value->deporte();?></p>
							<p id="evento"><?=$value->ciudad();?></p>
							<p id="evento"><?=$value->municipio();?></p>
							<p id="evento"><?=$value->fecha_evento();?></p>
							<p id="evento"><?=$value->hora_evento();?></p>
							<p id="evento"><?=$value->descripcion();?></p>
							</fieldset>
						</div>
						<?php
						}
						?>
					
				</div>
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