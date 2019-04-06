<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Eventos.php';

//guardamos en un array los posibles errores que puedan darse
$errores = array();

if(isset($_SESSION["login"])){

	/*
	1)guardo en un variable el array de listar eventos
	2)comprueba si la variable esta declarada y no es nula
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
	<title>Eventos</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
		require("includes/comun/menu.php");
	?>	

	<div id= "eventos">

		<?php
		if (isset($_SESSION["login"]))
		{
			if(empty($errores))
			{
			?>
				<br/><br/>
				<h1 id="texto"> TORNEO 3V3 DE BALONCESTO </h1>

				<img id="img_eventos" src="images/evento1.png"></img>

				<pre id="texto">Solo pueden inscribirsen los lideres de los equipos. Si no tienes equipo y quieres participar, puedes crear un <a id= "texto"href="crearEquipo.php">EQUIPO</a> y reunir a tus amigos para participar (minimo 3 personas)</pre>

				<br/><br/>
				<!--INDENTIFICADO PARA EL CSS -->
				<table id="eventos">
					<caption>LISTA DE LOS EVENTOS DISPONIBLES</caption>
						</thead>
							<tr>
								<th>Nº </th>
								<th>Nombre del Evento</th>
								<th>Deporte </th>
								<th>Victorias (%) </th>
								<th>Fecha creacion </th>
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
										<td> <?=$value->id(); ?> </td>
										<td> <?=$value->nombre(); ?> </td>
										<td> <?=$value->tipo_deporte(); ?> </td>
										<td> <?=$value->porcentaje_victorias(); ?> </td>
										<td> <?=$value->fecha(); ?> </td>
								<?php
								}
							?>
						</tbody>
				</table>
		<?php
			}	
			else
			{
				echo $errores();
			}
		}
		else{
		?>
			<p>Debes hacer <a href="login.php">login</a> o <a 	href="registro.php">registrarte</a> para
			poder ver el contenido de los PROXIMOS EVENTOS DE TU CIUDAD </p>

		<?php
		}
		?>

	</div>

	<?php
	require("includes/comun/pie.php");
	?>	
</body>
</html>