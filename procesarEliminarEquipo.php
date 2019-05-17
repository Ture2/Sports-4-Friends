<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Equipo.php';
require_once __DIR__.'/includes/Deporte.php';
require_once __DIR__.'/includes/Jugador.php';
require_once __DIR__.'/includes/Usuario.php';


    if (!isset($_SESSION['login']) ) {
        header('Location: index.php');
         exit();
    }
    
    $nombreEquipo = isset($_POST['equipo']) ? $_POST['equipo'] : null;

    $errores= array();
    //nececitamos que todos lo jugadores de este equipo abandonen
    
    $equipo=Equipo::buscaEquipoPorID($nombreEquipo);
    
    $id=$equipo->get_id();
    
    //eliminamos a todos los jugadores que tengan este id de equipo
    $resultado=Jugador::getJugadoresPorEquipo($equipo);
    
    foreach ($resultado as $jugador){
        
        $abandona=Jugador::salirEquipo($jugador, $equipo);
        if(!$abandona){
            $errores[]="Ha abido algun error a la hora de eliminar un jugador";
        }
        
    }
    
    $eliminar=Equipo::eliminaEquipo($id);
    
    if(!$eliminar){
        $errores[]="error al eliminar el equipo de la bd";
    }
    
    if(count($errores)==0)
        header('Location: index.php');



?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>ERROR EQUIPOS</title>
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


