<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Quedada.php';
require_once __DIR__.'/includes/Usuario.php';
require_once __DIR__.'/includes/Invitado.php';
$errores = array();


    $quedadas = Quedada::getAllQuedadas();


    if(!isset($_SESSION['login']))
     $errores[]="Registrate para apuntarte a una quedada";
    
     if(count($quedadas)==0){
         $errores[] = "No hay quedadas registradas";
     }



?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<title>Quedadas</title>
</head>
<body>
	<?php
		require("includes/comun/cabecera.php");
	?>	

	<div id= "contenido">

		<?php

		// si hay una sesion activa
		if (isset($_SESSION["login"])){
                
		    echo "<form>";
		    echo "<button formaction='crearQuedada.php' class='login-equipos'>Pulsa aqui para crear una quedada</button>";
		    echo "</form>";
		    
			if(count($errores) == 0){
                

				foreach ($quedadas as  $value) {
				// vamos a hacerlo todo con id de queadadas
				  $creador=Usuario::buscaUsuarioPorId($value->creador());  
				  $num_invitados=Quedada::numeroInvitados($value);
				  
				  
				  ?>
				<div id="quedadas">
					<h1 id="h"><?=$value->nombre_quedada();?></h1>
					<img id="quedada" src="<?=$value->ruta_foto();?>"></img>
					<pre id=texto><?=  "Localizacion: ".$value->localizacion();?></pre>
					<pre id=texto><?= "CREADOR: " .$creador->nicknameUsuario()?></pre>
					<pre id=texto><?=$value->ciudad();?></pre>
					<pre id=texto><?=$value->fecha_quedada();?></pre>
					<pre id=texto><?="AFORO: ".$value->get_aforo_quedada();?></pre>
					<pre id=texto><?="NUMERO DE ASISTENTES: ".$num_invitados?></pre>
					<pre id=texto><?="HORA DE QUEADADA ".$value->hora_quedada();?></pre>
					<div>
						<a href="pantallaQuedada.php?id_quedada=<?php echo $value->id_quedada();?>"><button class ="login-equipos" >INFO QUEDADA</button>></a>
						</div>
				</div>
				<?php
				}
				?>

		<?php
			}	
			else
			{
						  //muestra todos los posibles errores  
			    foreach ($errores as $error){
			        echo "<p>$error</p>";
			    }
			}
		}
		else{
		?>
		
	
		
		
			<div id="errorQuedada">
				<h1 id="h"> <?php print $errores['0'];?></h1>
				<div id="errorEvento2">
					<form>
						<button formaction='login.php' type='submit' class='login-equipos'>INICIAR SESIÓN</button></a>
						<button formaction='registro.php' type='submit' class='login-equipos'>REGISTRO</button></a>
						<button formaction='index.php' type='submit' class='login-equipos'>VOLVER</button></a>
					</form>
				</div>
			</div>
		<?php
		}
		?>

	</div>

	<?php
	require("includes/comun/pie.php");
	?>	
</body>
</html>