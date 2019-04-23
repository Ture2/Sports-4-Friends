<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Eventos.php';

$errores = array();


$eventos = Eventos::listarEventos();

if(!isset($eventos)){
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
	<title>Eventos</title>
</head>
<body>
	<?php
		require("includes/comun/cabecera.php");
	?>	

	<div id= "contenido">

		<?php
		if (isset($_SESSION["login"])){

			if(empty($errores == 0)){

				if($_SESSION["esAdmin"] == true){

					echo "<a href='adminEventos.php'><button class='login-equipos'>ADMINISTRAR EVENTOS</button></a>";
				}
				else{
					echo "<a href='misEventos.php'><button class='login-equipos'>MIS EVENTOS</button>";
					echo "<a href='registroEvento.php'><button class='login-equipos'>REGISTRATE</button></a>";
				}

				foreach ($eventos as $key => $value) {
				?>
				<div id="eventos">
					<h1 id="h"><?=$value->nombre_evento();?></h1>
					<img id="img_eventos" src="<?=$value->ruta_foto();?>"></img>
					<pre id=texto><?=$value->descripcion();?></pre>
				</div>
				<?php
				}
				?>

				<fieldset id="errorLogin">
					<pre id="texto1">Solo pueden inscribirsen los lideres de los equipos. Si no tienes equipo y quieres participar, puedes crear un <a id= "texto"href="crearEquipo.php">EQUIPO</a> y reunir a tus amigos para participar (minimo 3 personas)</pre>
				</fieldset>

				<table>
					<p id="p6">LISTA DE LOS EVENTOS DISPONIBLES</p>
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
			<div id="errorEvento">
				<h1 id="h"> <?php print $errores['0'];?></h1>
				<div id="errorEvento2">
					<form>
						<button formaction='login.php' type='submit' class='login-equipos'>INICIAR SESIÓN</button></a>
						<button formaction='registro.php' type='submit' class='login-equipos'>REGISTRO</button></a>
						<button formaction='index.php' type='submit' class='login-equipos'>VOLVER</button></a>
					</form>
				</div>
			</div>
		<?php
		}
		?>

	</div>

	<?php
	require("includes/comun/pie.php");
	?>	
</body>
</html>