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

/*
debuggin

var_dump($eventos);
var_dump($_SESSION);
var_dump($errores);
var_dump($_SESSION["esAdmin"]);
*/

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
				<a href="altaEvento.php">CREAR EVENTO</a>
				<a href="editarEvento.php">EDITAR EVENTO</a>
				<a href="eventos.php">VOLVER ATRAS</a>
				
				<div id="eventos">
					<fieldset id="eventos">
						<div id="evento">
							<?php foreach ($eventos as $value) {?>
							<p id="evento"><?=$value->nombre_evento();?></p>
							<p id="evento"><?=$value->deporte();?></p>
							<p id="evento"><?=$value->ciudad();?></p>
							<p id="evento"><?=$value->municipio();?></p>
							<p id="evento"><?=$value->fecha_evento();?></p>
							<p id="evento"><?=$value->hora_evento();?></p>
						<?php
						}
						?>
						</div>
					</fieldset>
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