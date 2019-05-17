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
				<div id="container-proximosEventos">
					<div id="botones-eventos">
				<form>
					<button formaction='altaEvento.php' type='submit' class='login-equipos'>CREAR EVENTO</button></a>
					<button formaction='editarEvento.php' type='submit' class='login-equipos'>EDITAR EVENTO</button></a>
					<button formaction='borrarEvento.php' type='submit' class='login-equipos'>BORRAR EVENTO</button></a>
					<button formaction='eventos.php' type='submit' class='login-equipos'>VOLVER</button></a>
				</form>
			</div><!--botones-->
		</div><!--container-->
				
				<div id="container-eventos">
						<?php foreach ($eventos as $value) {?>
						<div id="eventos">
							<fieldset id="evento1">
							<h1 id="evento"><?=$value->nombre_evento();?></h1>
							<p id="evento"><?= "Deporte: ".$value->deporte();?></p>
							<p id="evento"><?="Ciudad: ".$value->ciudad();?></p>
							<p id="evento"><?="Municipio: ".$value->municipio();?></p>
							<p id="evento"><?="Fecha: ".$value->fecha_evento();?></p>
							<p id="evento"><?="Hora: ".$value->hora_evento();?></p>
							<p id="evento"><?=$value->descripcion();?></p>
							</fieldset>
						</div><!--eventos-->
						<?php
						}
						?>
				</div><!--container-->
			</div><!--contenido-->
	<?php
		}
	}
	?>


	<?php 
		include("includes/comun/pie.php"); 
	?>

</body>
</html>