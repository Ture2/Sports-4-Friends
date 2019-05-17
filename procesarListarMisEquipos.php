<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Equipo.php';
	require_once __DIR__.'/includes/Usuario.php';
	require_once __DIR__.'/includes/Jugador.php';
	
	$nombreUsuario = $_SESSION['nombre'];
	$errores = array();
	$equipos = array();
	$usuario=Usuario::buscaUsuario($nombreUsuario);
    $id_usuario=$usuario->id();
    //buscamos los equipos donde este jugador sea lider
    
    
	if( empty($usuario) ) $errores[] = "El usuario no existe";


	if(count($errores) == 0){
	    $equipos=Equipo::listaEquiposPorJugadorYlider($id_usuario);
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
					echo "<h1 id='h'>NO PUEDES ACCEDER AL CONTENIDO</h1>";
				echo "<div id='errorQuedada2'>";
				echo "<form>";
					echo "<button formaction='login.php' type='submit' class='login-equipos'>INICIAR SESIÓN</button></a>";
					echo "<button formaction='registro.php' type='submit' class='login-equipos'>REGISTRO</button></a>";
					echo "<button formaction='index.php' type='submit' class='login-equipos'>VOLVER</button></a>";
				echo "</form>";
				echo "</div>";
				echo "</div>";
			}else{
				?>
				<div id="container-equipos">
					<div id='botones-eventos'>
						<a href='crearEquipo.php'><button  class ='login-equipos'>Crear Equipo</button></a>
						<a><button  onclick="history.back()" class ='login-equipos'>Volver</button></a>
			    	</div>
		    	</div>
	    	   	<?php
			if(!isset($equipos))
				echo "<p>Actualmente no hay ningun equipo disponible</p>";
			else{
				echo "<div class='teams_container'>";
				echo "<p class='titulo'>LISTADO DE MIS EQUIPOS, PINCHA EN ALGUNO PARA ADMINISTRAR</p>";
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