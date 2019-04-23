<?php 
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Equipo.php';
	require_once __DIR__.'/includes/Jugador.php';
	require_once __DIR__.'/includes/Usuario.php';
	$nickname=$_SESSION['nombre'];
	$Nequipo = str_replace('%', ' ', $_POST['equipo']);
	$equipo =  Equipo::getInfoPorNombre($Nequipo);
	var_dump($equipo);
	$usuario = Usuario::buscaUsuario($nickname);
	$jugador = Jugador::getJugadorPorNombreDeUnEquipo($nickname, $equipo->get_nombre_equipo());
	var_dump($jugador);
	if($jugador == NULL){
		$jugador = Jugador::crea($equipo->get_id(), $usuario->id(),'0', $fecha, $hora);
	}
	$res = $jugador->salirEquipo($jugador, $equipo);
	var_dump($res);
	header('Location: pantallaEquipo.php?equipo='.$equipo->get_nombre_equipo());
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