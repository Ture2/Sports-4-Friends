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
	if(!sset($eventos)){
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

	<div id= "contenido">

		<?php
		if (isset($_SESSION["login"]))
		{
			if($errores == 0)
			{
			?>
				<h1>TORNEO 3V3 DE BALONCESTO </h1>
				<img id="evento1" src="images/evento1.jpg">evento1_3vs3_baloncesto</img>

				<p>Solo pueden inscribirsen los lideres de los equipos. Si no tienes equipo y quieres participar
					crear un <a href="crearEquipo.php">EQUIPO</a> y reune amigos para participar (minimo 3 personas)

				<!--INDENTIFICADO PARA EL CSS -->
				<table id="eventos">
					<caption>LISTA DE LOS EVENTOS DISPONIBLES</caption>
						</thead>
							<tr>
								<th>Numero</th>
								<th>Nombre del Evento</th>
								<th>Equipo</th>
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
										<td> <?php echo $value->id() ?> </td>
										<td> <?php echo $value->nombre() ?> </td>
										<td> <?php echo $value->tipo_deporte() ?> </td>
								<?php
								}
							?>
						</tbody>
				</table>
		<?php
			}	
			else
			{
				echo $errores()
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