<?php
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
	<main>
	<?php
		require("includes/comun/cabecera.php");
		echo "<div id='contenido'>";
		
		if(isset($_SESSION["login"])){
			echo "<button class='login-equipos' onclick='crearEquipo.php'>Pulsa aquí para crear un equipo</button>";
		}else{
			echo "<button class='login-equipos'><a href='registro.php'>Si desea crear un equipo pulse aquí para crear una cuenta</a></button>";
		}?>
			<?php
			if(!isset($equipos))
				echo "<p>Actualmente no hay ningun equipo disponible</p>";
			else{
				echo "<div class='teams_container'>";
				echo "<p class='titulo'>Listado de los equipos actuales</p>";
				foreach ($equipos as $equipo){ 
				?>
					<div class="box">
						<p class="box-equipo"><?php echo $equipo->get_nombre_equipo();?></p>
						<a href="pantallaEquipo.php?equipo=<?php echo $equipo->get_nombre_equipo();?>"><img class ="box-logo" src=<?php echo $equipo->get_logo_equipo();?> alt='No image'></a>
						<div class = "box-texto">
							<h4 class ="box-desc">Descripcion</h4>
							<p class = "box-texto2"><?php echo $equipo->get_descripcion_equipo();?></p>
						</div>
					</div>
				
				<?php
				}
				echo "</div>";
				echo "</div>";
			}
			?>
			
		</main>
		<?php
		require("includes/comun/pie.php");  
	?>

</body>
</html>