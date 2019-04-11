<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Usuario.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Perfil</title>
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
					//Creamos el objeto usuario de la sesion que está inciada actualmente
					$nickname = $_SESSION['nombre'];
				 	$usuario = Usuario::buscaUsuario($nickname);
			  ?>
			<fieldset id="avatar">
				<img class="logoC" src="images/user.png">
				<div>
					<input type="file" name="imagen">
				</div>
			</fieldset>
			</div>
			<div id="datos">
				<fieldset id="perfil">
					<legend id="log">PANEL DE CONTROL</legend>
					<?php
						//campos que el usuario le interesa que muestre a nivel de cuenta
						echo '<p id="perfil">Usuario: '.$usuario->nicknameUsuario().'</p>';
						echo '<p id="perfil">Nombre: '.$usuario->nombreUsuario().'</p>';
						echo '<p id="perfil">Correo: '.$usuario->mail().'</p>';
					  ?>
					<div>
						<button onclick= "location.href='editarPerfil.php'" id="index" type="button" name="editar">Editar</button>
					</div>
				</fieldset>
			</div>
			<?php
			}else{
			 ?>
			 <h1>Error debes estar logueado para poder acceder al contenido de esta pagina</h1>
			 <?php
				}
			 ?>
		
	</div>

	<?php  
	require("includes/comun/pie.php");  
	?>

</body>
</html>