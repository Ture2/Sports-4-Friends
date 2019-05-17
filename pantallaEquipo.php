<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Equipo.php';
	require_once __DIR__.'/includes/Jugador.php';
	require_once __DIR__.'/includes/Usuario.php';
	require_once __DIR__.'/includes/Estadistica.php';
	require_once __DIR__.'/includes/Estadistica_futbol.php';
	require_once __DIR__.'/includes/Estadistica_baloncesto.php';
	require_once __DIR__.'/includes/Estadistica_balonmano.php';
	require_once __DIR__.'/includes/Estadistica_beisbol.php';
	require_once __DIR__.'/includes/Estadistica_tenis.php';

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
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="javascript/verEstadisticasJugador.js"></script>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
		<div class="titulo-equipo">
			<h1 id="h"><?php echo $info->get_nombre_equipo();?></h1>
		</div>
		<div id="container-eventos">
			<div id="subcontainer-eventos1">
				<div id="elem1"> 
					<div id="team">
		  				<img id="fut1" src=<?php echo 'images/logo_equipos/'.$info->get_logo_equipo();?>>
		  			</div>
					<div>
						<div>
							<b><p id="p1">DESCRIPCI&OacuteN</p></b>
							<p id="p2"><?php echo $info->get_descripcion_equipo();?></p>
						</div>

						<div id="botones-equipo">
						<?php

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
						</div><!--botones-->
					</div><!--descp-->
				</div><!--elem1-->
				<div id="elem1">
			  		<div id="table">

			  			<div id="fila">
			  				<div id="header"><p>Posici&oacuten en la liga</p></div>
			  				<div id="celda"><p id="p-result"><?php echo $estadisticas["posicion"]; ?></p></div>
			  			</div>

			  			<div id="fila">
			  				<div id="header"><p>Mayor racha de partidos ganados</p></div>
			  				<div id="celda"><p id="p-result"><?php echo $estadisticas["racha"]; ?></p></div>
			  			</div>

			  			<div id="fila">
			  				<div id="header"><p>&Uacuteltimo resultado</p></div>
			  				<div id="celda"><p id="p-result"><?php echo $estadisticas["ultimo_resultado"]; ?></p></div>
			  			</div>

			  			<div id="fila">
			  				<div id="header"><p>Partidos Ganados</p></div>
			  				<div id="celda"><p id="p-result"><?php echo $estadisticas["ganados"]; ?></p></div>
			  			</div>

			  			<div id="fila">
			  				<div id="header"><p>Partidos Empatados</p></div>
			  				<div id="celda"><p id="p-result"><?php echo $estadisticas["empatados"]; ?></p></div>
			  			</div>

			  			<div id="fila">
			  				<div id="header"><p>Partidos Perdidos</p></div>
			  				<div id="celda"><p id="p-result"><?php echo $estadisticas["perdidos"]; ?></p></div>
			  			</div>

			  		</div><!--table-->
			  	</div><!--elem1-->
			</div><!--eventos1-->
		</div><!--eventos-->
		<div id="container-eventos2">
			<b><p id="p3">JUGADORES</p></b>
		  		<div class="tab">
		  			<?php
		  				$jugadores = Jugador::getJugadoresPorEquipo($info);
		  				foreach ($jugadores as $key => $value){
		  					$usuario = Usuario::buscaUsuarioPorId($value->get_usuario());
		  					$nombre = $usuario->nombreUsuario();
		  				?>
		  				
		  				<h4 class="tablinks"><?php echo $nombre;?></h4>
		  				<div class = "tabcontent" id=<?php echo $nombre;?>>
		  					<?php
		  						$deporte = Deporte::buscaDeportePorId($info->get_deporte());
		  						
		  						if($deporte->nombreDeporte() == 'FUTBOL'){
		  							$estadisticas = Estadistica_futbol::buscaEstadisticaPorEquipo($usuario->id(), $info->get_nombre_equipo());
		  							$Objestadistica = json_decode($estadisticas);
					  				echo '<p id="p-tabs">Partidos Jugados: '. $Objestadistica->partidosj.'</p>';
					  				echo '<p id="p-tabs">Partidos Ganados: '. $Objestadistica->partidosg.'</p>';
					  				echo '<p id="p-tabs">Partidos Empatados: '. $Objestadistica->partidose.'</p>';
					  				echo '<p id="p-tabs">Partidos Perdidos: ' . $Objestadistica->partidosp.'</p>';
					  				echo '<p id="p-tabs">Goles: ' . $Objestadistica->goles.'</p>';
					  				echo '<p id="p-tabs">Asistencias: '. $Objestadistica->asistencias.'</p>';
					  				echo '<p id="p-tabs">Tarjetas Amarillas: '. $Objestadistica->tarjetaA.'</p>';
					  				echo '<p id="p-tabs">Tarjetas Rojas: '. $Objestadistica->tarjetaR.'</p>';

		  						}else if($deporte->nombreDeporte() == 'BALONCESTO'){
		  							$estadisticas = Estadistica_baloncesto::buscaEstadisticaPorEquipo($usuario->id(), $info->get_nombre_equipo());
		  							$Objestadistica = json_decode($estadisticas);
		  							echo '<p id="p-tabs">Partidos Jugados: '. $Objestadistica->partidosj.'</p>';
					  				echo '<p id="p-tabs">Partidos Ganados: '. $Objestadistica->partidosg.'</p>';
					  				echo '<p id="p-tabs">Partidos Empatados: '. $Objestadistica->partidose.'</p>';
					  				echo '<p id="p-tabs">Partidos Perdidos: ' . $Objestadistica->partidosp.'</p>';
					  				echo '<p id="p-tabs">Puntos: ' . $Objestadistica->puntos.'</p>';
					  				echo '<p id="p-tabs">Asistencias: '. $Objestadistica->asistencias.'</p>';
					  				echo '<p id="p-tabs">Tapones: '. $Objestadistica->tapones.'</p>';
					  				echo '<p id="p-tabs">Faltas: '. $Objestadistica->faltas.'</p>';

		  						}else if($deporte->nombreDeporte() == 'BALONMANO'){
		  							$estadisticas = Estadistica_balonmano::buscaEstadisticaPorEquipo($usuario->id(), $info->get_nombre_equipo());
		  							$Objestadistica = json_decode($estadisticas);
		  							echo '<p id="p-tabs">Partidos Jugados: '. $Objestadistica->partidosj.'</p>';
					  				echo '<p id="p-tabs">Partidos Ganados: '. $Objestadistica->partidosg.'</p>';
					  				echo '<p id="p-tabs">Partidos Empatados: '. $Objestadistica->partidose.'</p>';
					  				echo '<p id="p-tabs">Partidos Perdidos: ' . $Objestadistica->partidosp.'</p>';
					  				echo '<p id="p-tabs">Goles: ' . $Objestadistica->goles.'</p>';
					  				echo '<p id="p-tabs">Asistencias: '. $Objestadistica->asistencias.'</p>';
					  				echo '<p id="p-tabs">Tapones: '. $Objestadistica->tapones.'</p>';
					  				echo '<p id="p-tabs">Faltas: '. $Objestadistica->faltas.'</p>';
					  				echo '<p id="p-tabs">Tarjetas Amarillas: '. $Objestadistica->tarjetaA.'</p>';
					  				echo '<p id="p-tabs">Tarjetas Rojas: '. $Objestadistica->tarjetaR.'</p>';
					  				echo '<p id="p-tabs">Expulsiones: '. $Objestadistica->expulsion.'</p>';
		  						}else if($deporte->nombreDeporte() == 'BEISBOL'){
		  							$estadisticas = Estadistica_beisbol::buscaEstadisticaPorEquipo($usuario->id(), $info->get_nombre_equipo());
		  							$Objestadistica = json_decode($estadisticas);
		  							echo '<p id="p-tabs">Partidos Jugados: '. $Objestadistica->partidosj.'</p>';
					  				echo '<p id="p-tabs">Partidos Ganados: '. $Objestadistica->partidosg.'</p>';
					  				echo '<p id="p-tabs">Partidos Empatados: '. $Objestadistica->partidose.'</p>';
					  				echo '<p id="p-tabs">Partidos Perdidos: ' . $Objestadistica->partidosp.'</p>';
					  				echo '<p id="p-tabs">Strike: ' . $Objestadistica->strike.'</p>';
					  				echo '<p id="p-tabs">Homerun: '. $Objestadistica->homerun.'</p>';
					  				echo '<p id="p-tabs">Eliminaciones: '. $Objestadistica->eliminaciones.'</p>';
		  						}else{
		  							$estadisticas = Estadistica_tenis::buscaEstadisticaPorEquipo($usuario->id(), $info->get_nombre_equipo());
		  							$Objestadistica = json_decode($estadisticas);
		  							echo '<p id="p-tabs">Partidos Jugados: '. $Objestadistica->partidosj.'</p>';
					  				echo '<p id="p-tabs">Partidos Ganados: '. $Objestadistica->partidosg.'</p>';
					  				echo '<p id="p-tabs">Partidos Empatados: '. $Objestadistica->partidose.'</p>';
					  				echo '<p id="p-tabs">Partidos Perdidos: ' . $Objestadistica->partidosp.'</p>';
					  				echo '<p id="p-tabs">Puntos: ' . $Objestadistica->puntos.'</p>';
					  				echo '<p id="p-tabs">Sets: '. $Objestadistica->sets.'</p>';
					  				echo '<p id="p-tabs">Juegos: '. $Objestadistica->juegos.'</p>';
					  				echo '<p id="p-tabs">Aces: '. $Objestadistica->aces.'</p>';
					  				echo '<p id="p-tabs">Dobles Faltas: '. $Objestadistica->dobles_faltas.'</p>';
					  				echo '<p id="p-tabs">Errores: '. $Objestadistica->errores.'</p>';
		  						}
		  					  ?>
		  				</div><!--tabcontent-->
		  			<?php
		  				}
		  				?>
		  		</div>
		</div>
		</div>		
	</div>

	<script>
		$(".tab").accordion({ header: ".tablinks", collapsible: true, active: false }); 	
	</script>

	<?php
		require("includes/comun/pie.php");
	?>

</body>
</html>