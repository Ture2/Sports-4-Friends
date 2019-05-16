<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Equipo.php';
	require_once __DIR__.'/includes/Jugador.php';
	require_once __DIR__.'/includes/Usuario.php';

	$info = Equipo::getInfoPorNombre($_GET['equipo']);
	$nombreEquipo=$_GET['equipo'];
	$_GET['equipo'] = str_replace(' ', '%', $info->get_nombre_equipo());
	$estadisticas = $info->get_estadisticas();
	$nickname=$_SESSION['nombre'];

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Detalles</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">

	  	<h1 id="h"><?php echo $info->get_nombre_equipo();?></h1>

		  	<div id="team">
		  		<img id="fut1" src=<?php echo '/Sports-4-Friends/images/logo_equipos/'.$info->get_logo_equipo();?>>
		  	</div>

		<div>
			<b><p id="p1">DESCRIPCIÃ“N</p></b>
			<p id="p2"><?php echo $info->get_descripcion_equipo();?></p>
			<div id="botones-equipo">
				<?php

				/*Fase sin acabar puesto que necesitamos saber si un jugador estÃƒÂ¡ ya dentro de un equipo
				(hay que modificar la base de datos) y tambien si se ha logueado. Esto es importante para
				decidir que botÃƒÂ³n mostrar*/

					if(!isset($_SESSION["login"])){ ?>
						<form action="procesarLogin.php" method="POST">
			    				Desea unirse a este equipo, pulse la siguiente casilla: <input type="submit" value="Sign Up"/>
						</form>
						<?php 
					}else {

					    
						$jugador = Jugador::getJugadorPorNombreDeUnEquipo($_SESSION['nombre'], $info->get_nombre_equipo());
						$jugadores = Jugador::getJugadoresPorEquipo($info);
						if(!is_null($jugador)){
								if($jugador->compruebaJugadorEnEquipo($jugadores, $jugador) == false)
									$jugador = null;
							}
							$jugadores = Jugador::getJugadoresPorEquipo($info);
						if($_SESSION["login"] && !is_null($jugador) &&  $jugador->compruebaJugadorEnEquipo($jugadores, $jugador) == true) { ?>
						<form action="procesarSalirEquipo.php" method="POST">
			    			<input class="login-equipos" type="submit" name ="boton" value="Abandonar Equipo"/>
			    			<input type="hidden" name="equipo" value=<?php echo $_GET['equipo'];?>>
			    			<input onclick="history.back()" class="login-equipos" type="button" name="boton2" value="Volver"/>
						</form>
					
						<?php 
						  // si el jugador es lider el equipo, tiene la posibilidad de eliminarlo  
						  // prueba commint and push
						if($jugador->compruebaLider($nickname, $nombreEquipo )  ){ ?>
							<form action="procesarEliminarEquipo.php" method="POST">
			    			<input class="login-equipos" type="submit" name ="boton" value="eliminar"/>
			    			<input type="hidden" name="equipo" value=<?php echo $info->get_id();?>>
			    	
						</form>
								
						
						
						<?php }?>
						
					<?php 
						}else 
							if($_SESSION["login"] && is_null($jugador)){ ?>
								<form action="procesarUnirEquipo.php" method="POST">
					    			<input class="login-equipos" type="submit" name="boton2" value="Unirme al Equipo"/>
					    			<input type="hidden" name="equipo" value=<?php echo $_GET['equipo'];?>>
					    			<input onclick="history.back()" class="login-equipos" type="button" name="boton2" value="Volver"/>
								</form>
						<?php 
						}
					}?>

			</div>
			  	<div id="tabla">
			  		<b><p id="p3">ESTADÃ�STICAS</p></b>
			  		<table>
			  			<tr>
			  				<th>PosiciÃ³n en la liga</th>
			  				<td colspan="2"><?php echo $estadisticas["posicion"]; ?></td>
			  			</tr>
			  			<tr>

			  				<th>Mayor racha de partidos ganados</th>
			  				<td colspan="2"><?php echo $estadisticas["racha"]; ?></td>
			  			</tr>
			  			<tr>
			  				<th>Ãšltimo resultado</th>
			  				<td colspan="2"><?php echo $estadisticas["ultimo_resultado"]; ?></td>
			  			</tr>
			  			<tr>
			  				<th>PG</th>
			  				<th>PE</th>
			  				<th>PP</th>
			  			</tr>
			  			<tr>
			  				<td><?php echo $estadisticas["ganados"]; ?></td>
			  				<td><?php echo $estadisticas["empatados"]; ?></td>
			  				<td><?php echo $estadisticas["perdidos"]; ?></td>
			  			</tr>
			  		</table>

			  		<table id="tabla">
			  			<tr>
			  				<th>Jugadores</th>
			  			</tr>
			  			<?php
			  				$jugadores = Jugador::getJugadoresPorEquipo($info);
			  				foreach ($jugadores as $key => $value){
			  					$usuario = Usuario::buscaUsuarioPorId($value->get_usuario());
			  				?>
			  			<tr>
			  				<td> <?php echo $usuario->nombreUsuario(); ?> </td>
			  			</tr>
			  			<?php
			  				}
			  				?>
			  		</table>
			  	</div>
		</div>
	  	
	</div>

	<?php
		require("includes/comun/pie.php");  
	?>

</body>
</html>

