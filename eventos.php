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

/*
Depuracion: solo para mostrar informacion de las variables

*/
var_dump($eventos);
var_dump($_SESSION);
var_dump($errores);

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
			if(empty($errores == 0))
			{
				/*
				recorro todos los eventos disponibles mostrando:
					-nombre del evento
					-url de la foto
					-decripcion del evento
				que recupero del array de objetos donde tengo mis eventos.

				*/
				foreach ($eventos as $key => $value) {
				?>
				<br/><br/>
				<h1 id="texto"><?=$value->nombre_evento();?></h1>

				<img id="img_eventos" src="<?=$value->foto_evento();?>"></img>


				<pre id=texto><?=$value->descripcion();?></pre>

				<?php
				}
				?>

				<br/><br/>
				<pre id="texto">Solo pueden inscribirsen los lideres de los equipos. Si no tienes equipo y quieres participar, puedes crear un <a id= "texto"href="crearEquipo.php">EQUIPO</a> y reunir a tus amigos para participar (minimo 3 personas)</pre>

				<br/><br/>
				<!--
					INDENTIFICADOR PARA EL CSS 
					ME GUSTARIA: lista desplegable al pulsar un boton
						Implementacion con javaScript
				-->
				<table id="eventos">
					<caption>LISTA DE LOS EVENTOS DISPONIBLES</caption>
						</thead>
							<tr>
								<th>Nº</th>
								<th>Ciudad</th>
								<th>Municipio</th>
								<th>Nombre del Evento</th>
								<th>Deporte </th>
								<th>Fecha evento</th>
								<th>Hora Evento </th>
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
										<td> <?=$value->id_evento(); ?> </td>
										<td> <?=$value->ciudad(); ?> </td>
										<td> <?=$value->Municipio(); ?> </td>
										<td> <?=$value->nombre_evento(); ?> </td>
										<td> <?=$value->deporte(); ?> </td>
										<td> <?=$value->fecha_evento(); ?> </td>
										<td> <?=$value->hora_evento(); ?> </td>
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
			<br/><br/>
			<h1 id="texto"> <?php print $errores['0'];?></h1>
			<br/>
			<p id="texto"><a  href="login.php">login</a> </p>
			<br/>
			<p id="texto"><a href="registro.php">registrarte</a></p>

		<?php
		}
		?>

	</div>

	<?php
	require("includes/comun/pie.php");
	?>	
</body>
</html>