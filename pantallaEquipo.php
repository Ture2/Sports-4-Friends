<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Equipo.php';

	$info = Equipo::getInfoPorNombre($_GET['equipo']);
	$estadisticas = $info->get_estadisticas();

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<meta charset="utf-8">
	<title>Información del Equipo</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
		require("includes/comun/menu.php");
	?>

	<div id="contenido">

	  	<p><?php echo $info->get_nombre_equipo();?></p>

		  	<div id="team">
		  		<img id="fut1" src=<?php echo $info->get_logo_equipo();?>>
		  	</div>

		<div>

			<h2>DESCRIPCIÓN</h2>
			<p><?php echo $info->get_descripcion_equipo();?></p>
			<div id="botones-equipo">
				<?php

				/*Fase sin acabar puesto que necesitamos saber si un jugador está ya dentro de un equipo
				(hay que modificar la base de datos) y tambien si se ha logueado. Esto es importante para
				decidir que botón mostrar*/

					if(isset($_SESSION["login"])){ ?>
						<form action="procesarUnirEquipo.php" method="POST">

			    			<input type="submit" value="Unirme a este quipo" />
			    			<input type="hidden" name="usuario" value="">
						</form>
						<?php 
					}else{ ?>
						<form action="procesarSalirEquipo.php" method="POST">
			    			<input type="submit" value="Abandonar Equipo" />
			    			<input type="hidden" name="usuario" value="">
						</form>
					<?php } ?>


			</div>
			  	<div id="tabla">

			  		<h2 id="index">ESTADÍSTICAS</h2>
			  		<table>
			  			<tr>
			  				<th>Posición en la liga</th>
			  				<td colspan="2"><?php echo $estadisticas["posicion"]; ?></td>
			  			</tr>
			  			<tr>

			  				<th>Mayor racha de partidos ganados</th>
			  				<td colspan="2"><?php echo $estadisticas["racha"]; ?></td>
			  			</tr>
			  			<tr>
			  				<th>Ultimo resultado</th>
			  				<td colspan="2"><?php echo $estadisticas["ultimo_resultado"]; ?></td>
			  			</tr>
			  			<tr>
			  				<th>PJ</th>
			  				<th>PG</th>
			  				<th>PP</th>
			  			</tr>
			  			<tr>
			  				<td><?php echo $estadisticas["ganados"]; ?></td>
			  				<td><?php echo $estadisticas["empatados"]; ?></td>
			  				<td><?php echo $estadisticas["perdidos"]; ?></td>
			  			</tr>
			  		</table>
			  	</div>
		</div>
	  	
	</div>

	<?php
		require("includes/comun/pie.php");  
	?>  

</body>
</html>