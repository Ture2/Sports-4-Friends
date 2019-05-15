<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Usuario.php';
	//comprobamos si hay una sesion activa
	if(!isset($_SESSION['login'])){
		header('Location: index.php');
		exit();
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Editar Perfil</title>
</head>
<body>

	<?php  
	require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
		<div id="datos">
			<?php
				//comprobamos que hay un usuario logueado
				if(isset($_SESSION['login'])){
			  ?>
			
			<div id="datos">
			<form action="procesarEditarPerfil.php" enctype="multipart/form-data" method="post">
				<fieldset id="avatar">
					<img class="logoC" src="images/user.png">
					<div>
						<input type="file" name="imagen">
					</div>
				</fieldset>
			</div>
				<fieldset id="perfil">
					<p id="perfil">Usuario: <input type="text" name="username" value=""></p>
					<p id="perfil">Nombre: <input type="text" name="nombre" value=""></p>
					<p id="perfil">Correo: <input type="text" name="correo" value=""></p>
					<p id="perfil">Nueva Contraseña: <input type="password" name="password" value=""></p>
					<p id="perfil">Repetir Nueva Contraseña: <input type="password" name="password2" value=""></p>
					<button id= "index" type="submit" name="guardar">Guardar Cambios</button>
					<button formaction="perfil.php" id="index" type="submit" name="cancelar">Cancelar</button>
				</fieldset>
			</form>
			<?php
			}
			 ?>
		</div>
	</div>

	<?php  
	require("includes/comun/pie.php");  
	?>

</body>
</html>