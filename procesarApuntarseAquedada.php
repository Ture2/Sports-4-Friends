<?php 
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Quedada.php';
	require_once __DIR__.'/includes/Invitado.php';
	require_once __DIR__.'/includes/Usuario.php';
	
	
	
	$nickname=$_SESSION['nombre'];
	
   
	//$Nequipo = str_replace('%', ' ', $_POST['equipo']);
	
	
	$id_quedada= $_POST['id_quedada'];
	
	$quedada =  Quedada::buscaQuedadaPorID($id_quedada);
	
	$usuario = Usuario::buscaUsuario($nickname);
	
	
	
	$invitado = Invitado::getInvitadoPorNombreDeUnaQuedada($nickname, $quedada->nombre_quedada());
    
	
	//ya comprobamos en pantallaQueadadas si el jugador ya esta registrado en la quedada
	
	if($invitado == null){
		$invitado = Invitado::creaInvitado($quedada->id_quedada(), $usuario->id());
	}
	
	
	$res = $invitado->apuntarQuedada($invitado);
	
	header('Location: pantallaQuedada.php?id_quedada='.$quedada->id_quedada());

 ?>

