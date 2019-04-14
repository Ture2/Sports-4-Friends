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
	<title>Equipos</title>
</head>
<body>
	<main>
	<?php
		require("includes/comun/cabecera.php");
	echo "<div id='contenido'>";
		echo "<form>";
			if(isset($_SESSION["login"])){
	    	   echo "<button formaction='crearEquipo.php' class='login-equipos'>Pulsa aquí para crear un equipo</button>";
	    	   //echo"<button onclick= 'location.href='crearEquipo.php''id='index' type='button' name='editar'>Pulse aqui para crear Equipo</button>";
	    	   //<button onclick= "location.href='editarPerfil.php'" id="index" type="button" name="editar">Editar</button>
			}else{
				echo "<button class='login-equipos' formaction'registro.php'>Si desea crear un equipo pulse aquí para crear una cuenta</button>";
		echo "</form>";
		}?>
			<?php
			if(!isset($equipos))
				echo "<p>Actualmente no hay ningun equipo disponible</p>";
			else{
				echo "<div class='teams_container'>";
				echo "<p class='titulo'>LISTADO DE LOS EQUIPOS ACTUALES</p>";
				foreach ($equipos as $equipo){ 
				?>
					<div class="box">
						<p class="box-equipo"><?php echo $equipo->get_nombre_equipo();?></p>
						<div>
						<a href="pantallaEquipo.php?equipo=<?php echo $equipo->get_nombre_equipo();?>"><img class ="box-logo" src=<?php echo '/Sports-4-Friends/images/logo_equipos/'.$equipo->get_logo_equipo();?>></a>
						</div>
						<div class = "box-texto">
							<h4 class ="box-desc">Descripcion</h4>
							<p class = "box-texto2"><?php echo $equipo->get_descripcion_equipo();?></p>
						</div>
					</div>
				
				<?php
				}
				echo "</div>";
			}

			echo "</div>";
			?>
			
		</main>
		<?php
		require("includes/comun/pie.php");  
	?>

</body>
</html>