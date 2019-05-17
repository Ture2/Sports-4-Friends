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
			<p id="p4">FÚTBOL</p>
	  		<table>
	  			<tr>
	  				<th>Equipo</th>
	  				<th>Partidos Jugados</th>
	  				<th>Partidos Ganados</th>
	  				<th>Partidos Empatados</th>
	  				<th>Partidos Perdidos</th>
	  				<th>Goles</th>
	  				<th>Asistencias</th>
	  				<th>Tarjetas Amarillas</th>
	  				<th>Tarjetas Rojas</th>
	  			</tr>
	  				<?php
	  					$listaEquipos = array();
	  					$listaEstadisticas = Estadistica_futbol::listaEstadisticas($usuario->id());
	  					if($listaEstadisticas != NULL){
		  					foreach ($listaEstadisticas as $key) {
		  						echo '<tr>';
			  						//$equipo = Equipo::getInfoPorNombre($key);
									$ObjestadisticaF = json_decode($key);
			  						echo '<td>'.$ObjestadisticaF->equipo.'</td>';
			  						echo '<td>'.$ObjestadisticaF->partidosj.'</td>';
			  						echo '<td>'.$ObjestadisticaF->partidosg.'</td>';
			  						echo '<td>'.$ObjestadisticaF->partidose.'</td>';
			  						echo '<td>'.$ObjestadisticaF->partidosp.'</td>';
			  						echo '<td>'.$ObjestadisticaF->goles.'</td>';
			  						echo '<td>'.$ObjestadisticaF->asistencias.'</td>';	
			  						echo '<td>'.$ObjestadisticaF->tarjetaA.'</td>';
			  						echo '<td>'.$ObjestadisticaF->tarjetaR.'</td>';
		  						echo '<tr>';
		  					}
	  					}
	  				?>
	  		</table>
	  	</div>

	  	<div id="tabla">
	  		<p id="p4">BALONCESTO</p>
	  		<table>
	  			<tr>
	  				<th>Equipo</th>
	  				<th>Partidos Jugados</th>
	  				<th>Partidos Ganados</th>
	  				<th>Partidos Empatados</th>
	  				<th>Partidos Perdidos</th>
	  				<th>Puntos</th>
	  				<th>Asistencias</th>
	  				<th>Tapones</th>
	  				<th>Faltas</th>
	  			</tr>
					<?php
	  					$listaEquipos = array();
	  					$listaEstadisticas = Estadistica_baloncesto::listaEstadisticas($usuario->id());
	  					if($listaEstadisticas != NULL){
		  					foreach ($listaEstadisticas as $key) {
		  						echo '<tr>';
			  						//$equipo = Equipo::getInfoPorNombre($key);
									$ObjestadisticaF = json_decode($key);
			  						echo '<td>'.$ObjestadisticaF->equipo.'</td>';
			  						echo '<td>'.$ObjestadisticaF->partidosj.'</td>';
			  						echo '<td>'.$ObjestadisticaF->partidosg.'</td>';
			  						echo '<td>'.$ObjestadisticaF->partidose.'</td>';
			  						echo '<td>'.$ObjestadisticaF->partidosp.'</td>';
			  						echo '<td>'.$ObjestadisticaF->puntos.'</td>';
			  						echo '<td>'.$ObjestadisticaF->asistencias.'</td>';	
			  						echo '<td>'.$ObjestadisticaF->tapones.'</td>';
			  						echo '<td>'.$ObjestadisticaF->faltas.'</td>';
		  						echo '<tr>';
		  					}
	  					}
	  				?>
	  		</table>
	  	</div>

		<div id="tabla">
			<p id="p4">BEISBOL</p>
	  		<table>
	  			<tr>
	  				<th>Equipo</th>
	  				<th>Partidos Jugados</th>
	  				<th>Partidos Ganados</th>
	  				<th>Partidos Empatados</th>
	  				<th>Partidos Perdidos</th>
	  				<th>Strike</th>
	  				<th>Homerun</th>
	  				<th>Eliminaciones</th>
	  			</tr>
	  			<?php
	  				$listaEquipos = array();
	  				$listaEstadisticas = Estadistica_beisbol::listaEstadisticas($usuario->id());
	  				if($listaEstadisticas != NULL){
		  				foreach ($listaEstadisticas as $key) {
		  					echo '<tr>';
			  					//$equipo = Equipo::getInfoPorNombre($key);
								$ObjestadisticaF = json_decode($key);
			  					echo '<td>'.$ObjestadisticaF->equipo.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidosj.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidosg.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidose.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidosp.'</td>';
			  					echo '<td>'.$ObjestadisticaF->strike.'</td>';
			  					echo '<td>'.$ObjestadisticaF->homerun.'</td>';	
			  					echo '<td>'.$ObjestadisticaF->eliminaciones.'</td>';
		  					echo '<tr>';
		  				}
	  				}
	  			?>
	  		</table>
	  	</div>

	  	<div id="tabla">
			<p id="p4">BALONMANO</p>
	  		<table>
	  			<tr>
	  				<th>Equipo</th>
	  				<th>Partidos Jugados</th>
	  				<th>Partidos Ganados</th>
	  				<th>Partidos Empatados</th>
	  				<th>Partidos Perdidos</th>
	  				<th>Goles</th>
	  				<th>Asistencias</th>
	  				<th>Tapones</th>
	  				<th>Faltas</th>
	  				<th>Tarjetas Amarillas</th>
	  				<th>Tarjetas Rojas</th>
	  				<th>Expulsion</th>
	  			</tr>
	  			<?php
	  				$listaEquipos = array();
	  				$listaEstadisticas = Estadistica_balonmano::listaEstadisticas($usuario->id());
	  				if($listaEstadisticas != NULL){
		  				foreach ($listaEstadisticas as $key) {
		  					echo '<tr>';
			  					//$equipo = Equipo::getInfoPorNombre($key);
								$ObjestadisticaF = json_decode($key);
			  					echo '<td>'.$ObjestadisticaF->equipo.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidosj.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidosg.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidose.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidosp.'</td>';
			  					echo '<td>'.$ObjestadisticaF->goles.'</td>';
			  					echo '<td>'.$ObjestadisticaF->asistencias.'</td>';	
			  					echo '<td>'.$ObjestadisticaF->tapones.'</td>';
			  					echo '<td>'.$ObjestadisticaF->faltas.'</td>';
			  					echo '<td>'.$ObjestadisticaF->tarjetaA.'</td>';
			  					echo '<td>'.$ObjestadisticaF->tarjetaR.'</td>';
			  					echo '<td>'.$ObjestadisticaF->expulsion.'</td>';
		  					echo '<tr>';
		  				}
	  				}
	  			?>

	  		</table>
	  	</div>

	  	<div id="tabla">
	  		<p id="p4">TENIS</p>
	  		<table>
	  			<tr>
	  				<th>Equipo</th>
	  				<th>Partidos Jugados</th>
	  				<th>Partidos Ganados</th>
	  				<th>Partidos Empatados</th>
	  				<th>Partidos Perdidos</th>
	  				<th>Puntos</th>
	  				<th>Sets</th>
	  				<th>Juegos</th>
	  				<th>Aces</th>
	  				<th>Dobles Faltas</th>
	  				<th>Errores no forzados</th>
	  			</tr>
	  			<?php
	  				$listaEquipos = array();
	  				$listaEstadisticas = Estadistica_tenis::listaEstadisticas($usuario->id());
	  				if($listaEstadisticas != NULL){
		  				foreach ($listaEstadisticas as $key) {
		  					echo '<tr>';
			  					//$equipo = Equipo::getInfoPorNombre($key);
								$ObjestadisticaF = json_decode($key);
			  					echo '<td>'.$ObjestadisticaF->id_estadistica.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidosj.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidosg.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidose.'</td>';
			  					echo '<td>'.$ObjestadisticaF->partidosp.'</td>';
			  					echo '<td>'.$ObjestadisticaF->puntos.'</td>';
			  					echo '<td>'.$ObjestadisticaF->sets.'</td>';	
			  					echo '<td>'.$ObjestadisticaF->juegos.'</td>';
			  					echo '<td>'.$ObjestadisticaF->aces.'</td>';
			  					echo '<td>'.$ObjestadisticaF->dobles_faltas.'</td>';
			  					echo '<td>'.$ObjestadisticaF->errores.'</td>';
		  					echo '<tr>';
		  				}
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