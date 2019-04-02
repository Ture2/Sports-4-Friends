<?php 
	session_start();
	
	
	require'../Data/DAOs/DAOsImp/DAOJugadoresImp.php';
	require'../Data/DAOs/DAOsImp/DAOUsuariosImp.php';
	
	
	$usuario=$_SESSION['nombre']

 ?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Salir del Equipo</title>
</head>
<body>

	<?php
		require("cabecera.php");
		require("menu.php");
	?>

	<div id="contenido">
		<div id="eliminar">
			<fieldset id="eliminar">
				<legend id="log">EQUIPO</legend>
				<p>Seleccione el equipo del que desea salir:
				
				<form action="procesarSalir.php" id="saliEquipo" method= "POST">
				
				<select name="salir" id= "eli">
					
					
					<?php
					$con = new DAOJugadoresImp();
					$usu= new DAOUsuariosImp();
					//$jugadores = $con->getAll()
					//obnetemos el id del jugador
					$jugador = $usu->get($usuario);
					
					$fila = $jugador->fetch_assoc();
					 
					 
					
                    $res=$con->getEquipos($fila['ID_USUARIO']);
					
					//$res=$equi->getEquipos($jugador->getUser());
					
					
					
					
					
					//$equipos[1]->getNombreEquipo();
					foreach ($jugadores as $valor) {
					    //echo $valor. " ";
					    echo '<option value=" '.$valor->getNombreEquipo().'" >'.$valor->getNombreEquipo().'</option>';
					}
					
					
					
					$jugadores[1]->getName() . " " . $jugadores[1]->getLastName();
					foreach ($jugadores as $valor) { 
						//echo $valor. " ";
					  	echo '<option value=" '.$valor->getNombreJugador().'" >'.$valor->getNombreJugador().'</option>';
					  }  
					?>
				   

				
				</select> 
				<button id="index" type="submit" name="eliminar">Eliminar</button>
				</form>
			
			</fieldset>
		
		
		
		
		</div>
		
	</div>

	<?php
		require("pie.php");
	?>	

</body>
</html>