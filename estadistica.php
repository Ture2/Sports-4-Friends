<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Usuario.php';
	require_once __DIR__.'/includes/Jugador.php';
	require_once __DIR__.'/includes/Equipo.php';
	require_once __DIR__.'/includes/Estadistica.php';
	require_once __DIR__.'/includes/Estadistica_futbol.php';
	require_once __DIR__.'/includes/Estadistica_baloncesto.php';
	require_once __DIR__.'/includes/Estadistica_balonmano.php';
	require_once __DIR__.'/includes/Estadistica_beisbol.php';
	require_once __DIR__.'/includes/Estadistica_tenis.php';

	$nickname = $_SESSION['nombre'];
	$usuario = Usuario::buscaUsuario($nickname);
	$jugador = Jugador::getJugadorPorNombre($nickname);
	if($jugador == NULL){
		//MENSAJE DE QUE NO SE HA APUNTADO A NINGUN EQUIPO
	}
	$listaNombreEquipo =$jugador->listaEquiposPorJugador($nickname);
  ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Estadísticas</title>
</head>
<body>

	<?php 
		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
		<div id="containElem">
		<div id="tabla">
			<p id="p4">F&UacuteTBOL</p>
	  		<div id="table">
	  			<div id="fila">
	  				<div id="header">Equipo</div>
	  				<div id="header">Partidos Jugados</div>
	  				<div id="header">Partidos Ganados</div>
	  				<div id="header">Partidos Empatados</div>
	  				<div id="header">Partidos Perdidos</div>
	  				<div id="header">Goles</div>
	  				<div id="header">Asistencias</div>
	  				<div id="header">Tarjetas Amarillas</div>
	  				<div id="header">Tarjetas Rojas</div>
	  			</div>
	  				<?php
	  					$listaEquipos = array();
	  					$listaEstadisticas = Estadistica_futbol::listaEstadisticas($usuario->id());
	  					if($listaEstadisticas != NULL){
		  					foreach ($listaEstadisticas as $key) {

		  						echo '<div id="fila">';
			  						//$equipo = Equipo::getInfoPorNombre($key);
									$ObjestadisticaF = json_decode($key);
			  						echo '<div id="celda">'.$ObjestadisticaF->equipo.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->partidosj.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->partidosg.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->partidose.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->partidosp.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->goles.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->asistencias.'</div>';	
			  						echo '<div id="celda">'.$ObjestadisticaF->tarjetaA.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->tarjetaR.'</div>';
		  						echo '</div>';
		  					}
	  					}
	  				?>
	  		</div>
	  	</div>

	  	<div id="tabla">
	  		<p id="p4">BALONCESTO</p>
	  		<div id="table">
	  			<div id="fila">
	  				<div id="header">Equipo</div>
	  				<div id="header">Partidos Jugados</div>
	  				<div id="header">Partidos Ganados</div>
	  				<div id="header">Partidos Empatados</div>
	  				<div id="header">Partidos Perdidos</div>
	  				<div id="header">Puntos</div>
	  				<div id="header">Asistencias</div>
	  				<div id="header">Tapones</div>
	  				<div id="header">Faltas</div>
	  			</div>
					<?php
	  					$listaEquipos = array();
	  					$listaEstadisticas = Estadistica_baloncesto::listaEstadisticas($usuario->id());
	  					if($listaEstadisticas != NULL){
		  					foreach ($listaEstadisticas as $key) {
		  						echo '<div id="fila">';
			  						//$equipo = Equipo::getInfoPorNombre($key);
									$ObjestadisticaF = json_decode($key);
			  						echo '<div id="celda">'.$ObjestadisticaF->equipo.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->partidosj.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->partidosg.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->partidose.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->partidosp.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->puntos.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->asistencias.'</div>';	
			  						echo '<div id="celda">'.$ObjestadisticaF->tapones.'</div>';
			  						echo '<div id="celda">'.$ObjestadisticaF->faltas.'</div>';
		  						echo '</div>';
		  					}
	  					}
	  				?>
	  		</div>
	  	</div>

		<div id="tabla">
			<p id="p4">BEISBOL</p>
	  		<div id="table">
	  			<div id="fila">
	  				<div id="header">Equipo</div>
	  				<div id="header">Partidos Jugados</div>
	  				<div id="header">Partidos Ganados</div>
	  				<div id="header">Partidos Empatados</div>
	  				<div id="header">Partidos Perdidos</div>
	  				<div id="header">Strike</div>
	  				<div id="header">Homerun</div>
	  				<div id="header">Eliminaciones</div>
	  			</div>
	  			<?php
	  				$listaEquipos = array();
	  				$listaEstadisticas = Estadistica_beisbol::listaEstadisticas($usuario->id());
	  				if($listaEstadisticas != NULL){
		  				foreach ($listaEstadisticas as $key) {
		  					echo '<div id="fila">';
			  					//$equipo = Equipo::getInfoPorNombre($key);
								$ObjestadisticaF = json_decode($key);
			  					echo '<div id="celda">'.$ObjestadisticaF->equipo.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidosj.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidosg.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidose.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidosp.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->strike.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->homerun.'</div>';	
			  					echo '<div id="celda">'.$ObjestadisticaF->eliminaciones.'</div>';
		  					echo '</div>';
		  				}
	  				}
	  			?>
	  		</div>
	  	</div>

	  	<div id="tabla">
			<p id="p4">BALONMANO</p>
	  		<div id="table">
	  			<div id="fila">
	  				<div id="header">Equipo</div>
	  				<div id="header">Partidos Jugados</div>
	  				<div id="header">Partidos Ganados</div>
	  				<div id="header">Partidos Empatados</div>
	  				<div id="header">Partidos Perdidos</div>
	  				<div id="header">Goles</div>
	  				<div id="header">Asistencias</div>
	  				<div id="header">Tapones</div>
	  				<div id="header">Faltas</div>
	  				<div id="header">Tarjetas Amarillas</div>
	  				<div id="header">Tarjetas Rojas</div>
	  				<div id="header">Expulsi&oacuten</div>
	  			</div>
	  			<?php
	  				$listaEquipos = array();
	  				$listaEstadisticas = Estadistica_balonmano::listaEstadisticas($usuario->id());
	  				if($listaEstadisticas != NULL){
		  				foreach ($listaEstadisticas as $key) {
		  					echo '<div id="fila">';
			  					//$equipo = Equipo::getInfoPorNombre($key);
								$ObjestadisticaF = json_decode($key);
			  					echo '<div id="celda">'.$ObjestadisticaF->equipo.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidosj.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidosg.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidose.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidosp.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->goles.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->asistencias.'</div>';	
			  					echo '<div id="celda">'.$ObjestadisticaF->tapones.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->faltas.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->tarjetaA.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->tarjetaR.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->expulsion.'</div>';
		  					echo '</div>';
		  				}
	  				}
	  			?>

	  		</div>
	  	</div>

	  	<div id="tabla">
	  		<p id="p4">TENIS</p>
	  		<div id="table">
	  			<div id="fila">
	  				<div id="header">Equipo</div>
	  				<div id="header">Partidos Jugados</div>
	  				<div id="header">Partidos Ganados</div>
	  				<div id="header">Partidos Empatados</div>
	  				<div id="header">Partidos Perdidos</div>
	  				<div id="header">Puntos</div>
	  				<div id="header">Sets</div>
	  				<div id="header">Juegos</div>
	  				<div id="header">Aces</div>
	  				<div id="header">Dobles Faltas</div>
	  				<div id="header">Errores no forzados</div>
	  			</div>
	  			<?php
	  				$listaEquipos = array();
	  				$listaEstadisticas = Estadistica_tenis::listaEstadisticas($usuario->id());
	  				if($listaEstadisticas != NULL){
		  				foreach ($listaEstadisticas as $key) {
		  					echo '<div id="fila">';
			  					//$equipo = Equipo::getInfoPorNombre($key);
								$ObjestadisticaF = json_decode($key);
			  					echo '<div id="celda">'.$ObjestadisticaF->id_estadistica.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidosj.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidosg.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidose.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->partidosp.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->puntos.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->sets.'</div>';	
			  					echo '<div id="celda">'.$ObjestadisticaF->juegos.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->aces.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->dobles_faltas.'</div>';
			  					echo '<div id="celda">'.$ObjestadisticaF->errores.'</div>';
		  					echo '</div>';
		  				}
	  				}
	  			?>
	  		</div>
	  	</div>
	  	</div>
	</div>
	<?php  
		require("includes/comun/pie.php");  
	?>

</body>
</html>