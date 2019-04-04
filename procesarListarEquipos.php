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
	<!--<link rel="stylesheet" type="text/css" href="css/estilo.css" />-->
	<meta charset="utf-8">
	<title>Inicio</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
		require("includes/comun/menu.php");
		
		if(isset($_SESSION["login"])){
			echo "<button onclick='crearEquipo.php'>Pulsa aquí para crear un equipo</button>";
		}else{
			echo "<p><a href='registro.php'>Si desea crear un equipo pulse aquí para crear una cuenta</a></p>";
		}?>
		<div>
			<table id="tablaEquipos">
				<thead>
					<tr>
						<th colspan="4">Listado de los equipos actuales</th> 
					</tr>
				</thead>
			<tbody>
				<?php
				if(!isset($equipos))
					echo "<p>Actualmente no hay ningun equipo disponible</p>";
				else{
					foreach ($equipos as $equipo) {
						echo "<div>";
						echo "<tr class='celdaVerEquipos'>";
						echo "<td colspan='2'>".$equipo->get_nombre_equipo()."</td></tr>";
						echo "<tr>";
						echo "<td rowspan='2'><img src=".$equipo->get_logo_equipo()." alt='No image'></td>";
						echo "<td>Descripcion</td>";
						echo "<td><p>".$equipo->get_descripcion_equipo()."</p></td>";
						echo "<tr>";
						echo "</div>";
					}
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