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
	<script src="javascript/crearEquipoForm.js"></script>
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
	    	   //echo"<button onclick= 'location.href='crearEquipo.php''id='index' type='button' name='editar'>Pulse aqui para crear Equipo</button>";
	    	   //<button onclick= "location.href='editarPerfil.php'" id="index" type="button" name="editar">Editar</button>
			}else{ ?>
				<div id = 'container-equipos'>
					<div class = 'botones-eventos'>
			    	   	<button  id="botonCrearEquipo" onclick ="openForm()"class = 'login-equipos'>Crear Equipo</button>
			    	   	<button  id="botonCerrarFormulario" onclick ="closeForm()" class = 'login-equipos'>Cerrar</button>
			    	   	<a href='procesarListarMisEquipos.php'><button  class = 'login-equipos'>Mis equipos</button></a>
		    	   	</div>
	    	   	</div>

	    	<?php
			if(!isset($equipos))
				echo "<p>Actualmente no hay ningun equipo disponible</p>";
			else{
				echo "<div class='teams_container'>";
				echo "<p class='titulo'>LISTADO DE LOS EQUIPOS ACTUALES</p>";
				foreach ($equipos as $equipo){ 
				?>
					<div class="box">
						<a href="pantallaEquipo.php?equipo=<?php echo $equipo->get_nombre_equipo();?>" class="unit-link">
						<p class="box-equipo"><?php echo $equipo->get_nombre_equipo();?></p>
						<div class ="box-img">
							<figure>
								<img class ="box-logo" src=<?php echo '/Sports-4-Friends/images/logo_equipos/'.$equipo->get_logo_equipo();?>>
							</figure>
						</div>
						<div class = "box-texto">
							<h4 class ="box-desc">Descripción</h4>
							<p class = "box-texto2"><?php echo $equipo->get_descripcion_equipo();?></p>
						</div>
						</a>
					</div>
				
				<?php
				}
				echo "</div>";
			}

			echo "</div>";
		}
			if(isset($_SESSION["login"])){
			?>
			<div id="crearEquipoForm">
	    	 		<div id="datos">
						<fieldset id="perfil">
						<legend id="log">EQUIPO</legend>
							<form action="procesarCrearEquipo.php" enctype="multipart/form-data" method="post">
							<p id="log">Nombre del Equipo: <input type="text" name="name" style="width: 24em;height: 3em;" required></p>
							<p id="log">Deporte:
							<select name="deporte" id="dep" style="width: 24em; height: 3em;" required>
								<?php

								$deportes = Deporte::getAll();
									
									foreach ($deportes as $valor) { 
										//echo $valor. " ";
									  	echo '<option value="'.$valor->nombreDeporte().'" >'.$valor->nombreDeporte().'</option>';
									  }  
								?>
							</select></p>
							<p id="log">Imagen del Equipo: <input type="file" name="imagen"></p>
							<p id="log">Descripcion (max 50): <textarea type="text" name="desc" maxlength="50"></textarea></p>
							<button id="index" type="submit" name="crear">CREAR</button>
							<button onclick="history.back()" id="index" type="submit" name="volver">VOLVER</button>
							</form>
						</fieldset>
					</div>
				</div>
				<?php
			}?>
		</main>
		<?php
		require("includes/comun/pie.php");  
	?>

</body>
</html>