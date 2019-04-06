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
		
		if(isset($_SESSION["login"])){
			echo "<button onclick='crearEquipo.php'>Pulsa aquí para crear un equipo</button>";
		}else{
			echo "<p><a href='registro.php'>Si desea crear un equipo pulse aquí para crear una cuenta</a></p>";
		}?>
		<div>
			<?php
			if(!isset($equipos))
				echo "<p>Actualmente no hay ningun equipo disponible</p>";
			else{
			 	
				echo "<div class='teams_container'>";
				echo "<p class='titulo'>Listado de los equipos actuales</p>";
				foreach ($equipos as $equipo){ 
				?>
					<div class="team box">
						<div class="team title"><p><?php echo $equipo->get_nombre_equipo();?></p></div>
						<div class="team img"><img class ="logo_equipo" src=<?php echo $equipo->get_logo_equipo();?> alt='No image'></div>
						<div class="team text_title"><h4>Descripcion</h4></div>
						<div class="team text"><p><?php echo $equipo->get_descripcion_equipo();?></p></div>
					</div>
				
				<?php
				}
				echo "</div>";
			}
			?>
			
		</div>

		<?php
		require("includes/comun/pie.php");  
	?>

</body>
</html>