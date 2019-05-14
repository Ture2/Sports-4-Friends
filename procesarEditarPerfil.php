<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Usuario.php';
	//si la hay procedemos a crear un objeto usuario
	$nickname = $_SESSION['nombre'];
	$usuario = Usuario::buscaUsuario($nickname);
	//
	$erroresFormulario = array();

	$username = isset($_POST['username']) ? $_POST['username'] : null;
	$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
	$correo = isset($_POST['correo']) ? $_POST['correo'] : null;
	$password = isset($_POST['password']) ? $_POST['password'] : null;

	$nombre_img = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	$tamano = $_FILES['imagen']['size'];
	if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)) 
	{
   		//indicamos los formatos que permitimos subir a nuestro servidor
   		if (($_FILES["imagen"]["type"] == "image/gif")
   			|| ($_FILES["imagen"]["type"] == "image/jpeg")
   			|| ($_FILES["imagen"]["type"] == "image/jpg")
   			|| ($_FILES["imagen"]["type"] == "image/png"))
   		{
      // Ruta donde se guardarán las imágenes que subamos
   		    //C:\xampp\htdocs\Sports-4-Friends\imgbd
      $directorio = __DIR__.'/images/foto_usuarios/';
     
      
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre_img);     	
   	}else{
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }
}else{
   //si existe la variable pero se pasa del tamaño permitido
   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
}






	if ( empty($password) || mb_strlen($password) < 3 ) {
		$erroresFormulario[] = "El password tiene que tener una longitud de al menos 5 caracteres.";
	}
	$password2 = isset($_POST['password2']) ? $_POST['password2'] : null;
	if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
		$erroresFormulario[] = "Los passwords deben coincidir.";
	}


	if (count($erroresFormulario) === 0) {
		$usuario->setNickname($username);
		$usuario->setNombre($nombre);
		$usuario->setMail($correo);
		$usuario->cambiaPassword($password);
		$usuario->setImagenUsuario($nombre_img);
		$usuario = Usuario::guarda($usuario);
		$usuario->guardaFotoUsuario($nombre_img);
	    if (! $usuario ) {
	        $erroresFormulario[] = "El usuario ya existe.";
	    } else {
	        $_SESSION['login'] = true;
	        $_SESSION['nombre'] = $username;
	        header('Location: perfil.php');
	        exit();
	    }
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
				if(isset(($_SESSION['login']))){
					if (count($erroresFormulario) > 0) {
						echo '<ul class="errores">';
					}
					foreach($erroresFormulario as $error) {
						echo "<li>$error</li>";
					}
					if (count($erroresFormulario) > 0) {
						echo '</ul>';
					}
			  ?>
			<div id="perfil">
			<fieldset id="avatar">
				<img class="logoC" src="images/user.png">
				<div>
					<input type="file" name="imagen">
				</div>
			</fieldset>
			</div>
			<form action="procesarEditarPerfil.php"  enctype="multipart/form-data" method="post">
				<fieldset id="perfil">
					<p id="perfil">Usuario:<input type="text" name="username" value=""></p>
					<p id="perfil">Nombre:<input type="text" name="nombre" value=""></p>
					<p id="perfil">Correo:<input type="text" name="correo" value=""></p>
					<p id="perfil">Nueva Contraseña:<input type="password" name="password" value=""></p>
					<p id="perfil">Repetir Nueva Contraseña:<input type="password" name="password2" value=""></p>
					<button id= "perfil" type="submit" name="guardar">Guardar Cambios</button>
					<button formaction="perfil.php" id="perfil" type="submit" name="cancelar">Cancelar</button>
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