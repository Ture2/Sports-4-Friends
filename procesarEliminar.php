<?php

session_start();


require'../Data/DAOs/DAOsImp/DAOEquiposImp.php';

    if (! isset($_POST['eliminar']) ) {
        header('Location: login.php');
         exit();
}
    
$nombreEquipo = isset($_POST['equipo']) ? $_POST['equipo'] : null;

    
$conn= new DAOEquiposImp();

/// por restriciones necesitamos el id_equipo

    $rs=$conn->get($nombreEquipo);
    $fila = $rs->fetch_assoc();

$rs=$conn->delete($fila['ID_EQUIPO'],$nombreEquipo);

$conn->desconexion();
header('Location: equipo.php');



?>