<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Quedada.php';
require_once __DIR__.'/includes/Invitado.php';
require_once __DIR__.'/includes/Usuario.php';



    $errores= array();

    if (!isset($_SESSION['login']) ) {
        header('Location: index.php');
         exit();
    }
  
    if (!isset($_SESSION['nombre']) ) {
        
        $errores[]="Error con la sesion del usuario";
    }
    
    
    $id_quedada = isset($_POST['id_quedada']) ? $_POST['id_quedada'] : null;
    
    if ( empty($id_quedada) ) {
        $errores[] = "Error en el envio del id del formulario";
    }
    
    //bucamos la quedada
    
    $quedada=Quedada::buscaQuedadaPorID($id_quedada);
    
    $id=$quedada->id_quedada();
    
    //eliminamos a todos los invitados de la quedada
    $resultado=Invitado::getInvitadosPorQuedada($quedada);
    
    
    
    foreach ($resultado as $invitado){
        
        $usuario=Usuario::buscaUsuarioPorId($invitado->get_usuario());
        
        if ( empty($usuario) ) {
            $errores[] = "Error con el jugador";
        }
        
        $abandona=Invitado::eliminaInvitado($usuario, $quedada);
        if(!$abandona){
            $errores[]="Ha abido algun error a la hora de eliminar un jugador";
        }
        
    }
    
    $eliminar=Quedada::eliminaQuedada($id_quedada);
    
    if(!$eliminar){
        $errores[]="error al eliminar el equipo de la bd";
    }
    
    
    if(count($errores) == 0)
    {
    
    header('Location: quedadas.php');
    }


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>ERROR QUEDADA</title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
		
		<?php
		if (isset($_SESSION["login"]))
		{
			if(count($errores)!=0)
			{
				?>
				<fieldset id="errorLogin">
					<pre id="texto1">Ha habido algun problema interno en la bd vuelva al inicio para empezar 
						Volver a <a href="index.php">INICIO</a>
					</pre>
				</fieldset>
			<?php
			}
		}
		?>
				
		
		
		
		
	</div>
	
	<?php
		require("includes/comun/pie.php");  
	?>	

</body>
</html>


