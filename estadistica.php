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


	<!-- METER LOS DATOS DE CADA JUGADOR CON LA BASE DE DATOS -->
	<div id="contenido">
		<div id="tabla">
			<p>FÚTBOL</p>
	  		<table>
	  			<tr>
	  				<th>Equipo</th>
	  				<th>Posición</th>
	  				<th>Faltas</th>
	  				<th>Goles</th>
	  				<th>Tarjetas</th>
	  				<th>PJ</th>
	  				<th>PG</th>
	  				<th>PP</th>
	  			</tr>
	  			<tr>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  			</tr>
	  		</table>
	  	</div>

	  	<div id="tabla">
	  		<p>BALONCESTO</p>
	  		<table>
	  			<tr>
	  				<th>Equipo</th>
	  				<th>Posición</th>
	  				<th>Puntos</th>
	  				<th>Faltas</th>
	  				<th>PJ</th>
	  				<th>PG</th>
	  				<th>PP</th>
	  			</tr>
	  			<tr>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  			</tr>
	  		</table>
	  	</div>

	  	<div id="tabla">
	  		<p>TENIS</p>
	  		<table>
	  			<tr>
	  				<th>Equipo</th>
	  				<th>Sets</th>
	  				<th>Puntos</th>
	  				<th>PJ</th>
	  				<th>PG</th>
	  				<th>PP</th>
	  			</tr>
	  			<tr>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  				<td>-</td>
	  			</tr>
	  		</table>
	  	</div>
	</div>

	<?php  
		require("includes/comun/pie.php");  
	?>

</body>
</html>