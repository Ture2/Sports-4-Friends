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
			if(!isset($_SESSION["login"])){
				echo "<div id='errorQuedada'>";
					echo "<h1 id='h'>NO PUEDES VER ESTA SECCIÓN</h1>";
				echo "<div id='errorQuedada2'>";
					echo "<a href='login.php'><button class='login-equipos'>INICIAR SESIÓN</button></a>";
					echo "<a href='registro.php'><button class='login-equipos'>REGISTRO</button></a>";
					echo "<a href='index.php'><button class='login-equipos'>VOLVER</button></a>";
				echo "</div>";
				echo "</div>";
	    	   //echo"<button onclick= 'location.href='crearEquipo.php''id='index' type='button' name='editar'>Pulse aqui para crear Equipo</button>";
	    	   //<button onclick= "location.href='editarPerfil.php'" id="index" type="button" name="editar">Editar</button>
			}else{
				echo "<form>";
	    	   		echo "<button formaction='crearEquipo.php' class='login-equipos'>Pulsa aquí para crear un equipo</button>";
	    	   	echo "</form>";
	    	   	
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
		}
			?>
			
		</main>
		<?php
		require("includes/comun/pie.php");  
	?>

</body>
</html>