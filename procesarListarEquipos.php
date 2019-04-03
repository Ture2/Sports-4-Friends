<?php
	//session_start();
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Equipo.php';


	$deporte = $_GET['deporte'];
	$errores = array();
	$equipos = array();

	if( empty($deporte) ) $errores[] = "No se ha seleccionado ningun deporte";


	if(count($errores) == 0){
		$equipos = Equipo::getEquiposPorDeporte($deporte);
	}
?> 


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Inicio</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
		require("includes/comun/menu.php");

		var_dump($equipos);
		if(isset($equipos)) 
			echo "<p>Actualmente no hay ningun equipo disponible</p>";
		if(isset($_SESSION["login"])){
			echo "<button onclick='crearEquipo.php'>Pulsa aquí para crear un equipo</button>";
		}?>
		<div id="tablaEquipos">
			<table>
				<thead>
					<tr>
						<th colspan="4">Listado de los equipos actuales</th> 
					</tr>
					<tr>
						<th>
				</thead>
			<tbody>
				<?php
					foreach ($equipos as $equipo) {
						echo "<tr>";
						echo "<td colspan='2'>".$equipo->nombre_equipo."</td></tr>";
						echo "<tr>";
						echo "<td rowspan='2'><img src=".$equipo->logo_equipo."></td>";
						echo "<td>Descripcion</td>";
						echo "<td><p>".$equipo->descripcion_equipo."</p></td>";
						echo "<tr>";
					}
				?>
			</tbody>
			</table>
		</div>

		<?php
		
		require("includes/comun/pie.php");  
	?>

</body>
</html>