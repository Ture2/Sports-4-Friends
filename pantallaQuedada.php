<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Quedada.php';
	require_once __DIR__.'/includes/Invitado.php';
	require_once __DIR__.'/includes/Usuario.php';

	$info = Quedada::buscaQuedadaPorID($_GET['id_quedada']);
	$nombreQuedada=$info->nombre_quedada();
	
	
	$nickname=$_SESSION['nombre'];

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Detalles Quedada</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">

	  	<h1 id="h"><?php echo $info->nombre_quedada();?></h1>

		  	<div id="team">
		  		<img id="fut1" src=<?php echo $info->ruta_foto();?>>
		  	</div>

		<div>
			<b><p id="p1">DESCRIPCION</p></b>
			<p id="p2"><?php echo $info->descripcion();?></p>
			<div id="botones-equipo">
				<?php					    
						$invitado = Invitado::getInvitadoPorNombreDeUnaQuedada($_SESSION['nombre'], $info->nombre_quedada());
						$invitados = Invitado::getInvitadosPorQuedada($info);
						
							
						if($_SESSION["login"] && !is_null($invitado) &&  $invitado->compruebaInvitadoEnQuedada($invitados, $invitado) == true ){ ?>
						
						
							<?php 
						  // si el usuario es el creador de la quedada la puede eliminar
						if($invitado->compruebaCreador($invitado, $info )  ){ ?>
							<form action="procesarEliminarQuedada.php" method="POST">
			    			<input class="login-equipos" type="submit" name ="boton" value="eliminar"/>
			    			<input type="hidden" name="id_quedada" value=<?php echo $info->id_quedada();?>>
			    			<input onclick="history.back()" class="login-equipos" type="button" name="boton2" value="Volver"/>	
						</form>
						
						<?php } else{// resto de jugadores solo podran abandonar quedada
						     ?>
						
						<form action="procesarAbandonarQuedada.php" method="POST">
			    			<input class="login-equipos" type="submit" name ="boton" value="Abandonar Quedada"/>
			    			<input type="hidden" name="id_quedada" value=<?php echo $info->id_quedada();?>>
			    			<input onclick="history.back()" class="login-equipos" type="button" name="boton2" value="Volver"/>
						</form>
					
						<?php 
						}
						
						?>		
										
						
					<?php 
						}else {
						    
						    $lleno=Quedada::aforoCompleto($info);
							if($_SESSION["login"] && is_null($invitado)&& !$lleno){ ?>
								<form action="procesarApuntarseAquedada.php" method="POST">
					    			<input class="login-equipos" type="submit" name="boton2" value="Apuntarse a quedada"/>
					    			<input type="hidden" name="id_quedada" value=<?php echo $info->id_quedada();?>>
					    			<input onclick="history.back()" class="login-equipos" type="button" name="boton2" value="Volver"/>
								</form>
						<?php 
						}
						
						
					if($lleno){
						?>  
						 <fieldset id="errorLogin">
					<pre id="texto1">Aforo completo, busca otra quedada y unete 
						Volver a <a href="quedadas.php">Quedadas</a>
					</pre>
				</fieldset>
					
					<?php 
						}
						}
					?>

			</div>
			  	<div id="tabla">
			

			  		<table id="tabla">
			  			<tr>
			  				<th>invitados</th>
			  			</tr>
			  			<?php
			  				$invitados = Invitado::getInvitadosPorQuedada($info);
			  				foreach ($invitados as $value){
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

