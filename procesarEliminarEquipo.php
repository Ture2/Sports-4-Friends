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
    
    $equipo=Equipo::getInfoPorNombre($nombreEquipo);
    
    $id=$equipo->get_id();
    
    //eliminamos a todos los jugadores que tengan este id de equipo
    $resultado=Jugador::getJugadoresPorEquipo($equipo);
    
    foreach ($resultado as $jugador){
        
        $abandona=Jugador::salirEquipo($jugador, $equipo);
        if(!$abandona){
            $errores="Ha abido algun error a la hora de eliminar un jugador";
        }
        
    }
    
    $eliminar=Equipo::eliminaEquipo($id);
    
    if(!$eliminar){
        $errores="error al eliminar el equipo de la bd";
    }
    
    
    header('Location: index.php');



?>