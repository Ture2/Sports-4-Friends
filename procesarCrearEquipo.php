<?php
	
	require("Data/DAOs/DAOsImp/DAOEquiposImp"); 
	require("Data/DAOs/DAOsImp/DAODeportesImp");

	$nombre = $_POST["nombre"];
	$deporte = $_POST["deporte"];
	//$a = $_POST["imagen"];

	
	if(isset($deporte) && isset($nombre)){
		$conEquipos = new DAOEquiposImp();
		$conDeportes = new DAODeportesImp();
		if($conEquipos->get($nombre) == NULL && $conDeportes->get($deporte) != NULL){
			$equipo = new Equipo($deporte, $nombre);
			
			$conEquipos->insert($equipo);
		}

	}



?>