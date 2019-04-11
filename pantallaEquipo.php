<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Equipo.php';
	require_once __DIR__.'/includes/Jugador.php';

	$info = Equipo::getInfoPorNombre($_GET['equipo']);
	$estadisticas = $info->get_estadisticas();

?>
	<?php
		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">

	  	<p><?php echo '/Sports-4-Friends/images/logo_equipos/'.$info->get_nombre_equipo();?></p>

		  	<div id="team">
		  		<img id="fut1" src=<?php echo '/Sports-4-Friends/images/logo_equipos/'.$info->get_logo_equipo();?>>
		  	</div>

		<div>
			<h2>DESCRIPCIÃ“N</h2>
			<p><?php echo '/Sports-4-Friends/images/logo_equipos/'.$info->get_descripcion_equipo();?></p>
			<div id="botones-equipo">
				<?php

				/*Fase sin acabar puesto que necesitamos saber si un jugador estÃ¡ ya dentro de un equipo
				(hay que modificar la base de datos) y tambien si se ha logueado. Esto es importante para
				decidir que botÃ³n mostrar*/

					if(!isset($_SESSION["login"])){ ?>
						<form action="procesarLogin.php" method="POST">
			    				Desea unirse a este equipo, pulse la siguiente casilla: <input type="submit" value="Sign Up"/>
						</form>
						<?php 
					}else {

						$jugador = Jugador::getJugadorPorNombre($_SESSION['nombre']);

						if($_SESSION["login"] && !is_null($jugador)) { ?>
						<form action="procesarSalirEquipo.php" method="POST">
			    			Si desea abandonar el equipo, pulse aquÃ­: <input type="submit" value="Abandonar Equipo"/>
			    			<input type="hidden" name="usuario" value=<?php echo $_SESSION['nombre'];?>>
						</form>
					<?php 
						}else 
							if($_SESSION["login"] && is_null($jugador)){ ?>
								<form action="procesarUnirmeEquipo.php" method="POST">
					    			Si desea unirse al equipo, pulse aquÃ­: <input type="submit" value="Unirme al Equipo"/>
					    			<input type="hidden" name="usuario" value=<?php echo $_SESSION['nombre'];?>>
								</form>
						<?php 
						}
					}?>

			</div>
			  	<div id="tabla">
			  		<h2 id="index">ESTADÃ�STICAS</h2>
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

