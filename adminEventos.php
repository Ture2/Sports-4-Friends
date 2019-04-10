<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/RegistroEvento.php';

//guardamos en un array los posibles errores que puedan darse
$errores = array();

if(isset($_SESSION["esAdmin"])){
	
	/*
	CONSULTA SQL:
	todos los equipos donde pertenezca el usuario y ademas este registrado el equipo en un evento
	*/
	$eventos = Eventos::listarEventos();

	if(!isset($eventos)){
		$errores[] = "No hay registros disponibles";
	}
}
	else{
		$errores[] = "No puedes acceder al contenido";
}

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Mis Eventos</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
	<?php

	if (isset($_SESSION["esAdmin"])){

		if(empty($errores == 0)){
				/*
				recorro todos los eventos disponibles mostrando:
					-nombre del evento
					-url de la foto
					-decripcion del evento
				que recupero del array de objetos donde tengo mis eventos.

				*/
				foreach ($eventos as $key => $value) {
				?>
				<div id="eventos">
					<h1 id="h"><?=$value->nombre_evento();?></h1>
					<img id="img_eventos" src="<?=$value->foto_evento();?>"></img>
					<pre id=texto><?=$value->descripcion();?></pre>
				</div>
				<?php
				}//foreach
				?>
				<!--
					INDENTIFICADOR PARA EL CSS 
					ME GUSTARIA: lista desplegable al pulsar un boton
						Implementacion con javaScript
				-->
				<table>
					<p class="titulo">LISTA DE LOS EVENTOS DISPONIBLES</p>
						</thead>
							<tr>
								<th>Ciudad</th><th>Municipio</th><th>Nombre del Evento</th><th>Deporte </th>
								<th>Fecha evento</th><th>Hora Evento </th>
							</tr>
						</thead>
						<tbody>
							<?php
								/*
								1)Recorremos todo el array.
								2)Accedemos a nuestro objeto (valor) y a los metodos
								3)Mostramos lo que nos retorna los metodos
								*/
								foreach ($eventos as $key => $value) {
								?>
									<tr>
										<td> <?=$value->ciudad(); ?> </td>
										<td> <?=$value->Municipio(); ?> </td>
										<td> <?=$value->nombre_evento(); ?> </td>
										<td> <?=$value->deporte(); ?> </td>
										<td> <?=$value->fecha_evento(); ?> </td>
										<td> <?=$value->hora_evento(); ?> </td>
									</tr>
								<?php
								}//foreach
							?>
						</tbody>
				</table>
		<?php
			}//if errores
			else{
				echo $errores();
			}//else
		}//if admin
		?>

		<!--crear un boton de nos de acceso al formulario -->

	<!--implenmentar el formulario de registro de eventos
		que redirige a procesarregistroevento con su logica correspondiente
	-->

	?>
	</div>
	<?php 
		include("includes/comun/pie.php"); 
	?>
</body>
</html>
