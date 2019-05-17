<?php 
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Quedada.php';
	require_once __DIR__.'/includes/Invitado.php';
	require_once __DIR__.'/includes/Usuario.php';
	
	
	
	$nickname=$_SESSION['nombre'];
    
	
	
	$id_quedada=$_POST['id_quedada'];
	
	// ahora eliminarmos el invitado de esta quedada
	$quedada=Quedada::buscaQuedadaPorID($id_quedada);
	////
	$usuario=Usuario::buscaUsuario($nickname);
    
	$res=Invitado::eliminaInvitado($usuario, $quedada);
	

	
	//ahora eliminamos el invitado 
	
	
	
	
	
	
	header('Location: pantallaQuedada.php?id_quedada='.$id_quedada);
 ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Salir del Equipo</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
		
	</div>
	
	<?php
		require("includes/comun/pie.php");  
	?>	

</body>
</html>