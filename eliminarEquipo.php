<?php 
	session_start();
	
	
	require'../Data/DAOs/DAOsImp/DAOEquiposImp.php';



 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="estilo.css" />
	<meta charset="utf-8">
	<title>Eliminar Equipo</title>
</head>
<body>

	<?php
		require("cabecera.php");
	?>

	<div id="contenido">
		<div id="eliminar">
			<fieldset id="eliminar">
				<legend id="log">EQUIPO</legend>
				<p>Seleccione el equipo que desea eliminar:<p>
				
				<form action="procesarEliminar.php" id="form" method= "POST">

				<select name="equipo" id= "eli">
					
					
					<?php
					
					$con = new DAOEquiposImp();
					$equipos = $con->getAll();
					//echo $equipos[0]. " " .$equipos[1];
					$longitud = count($equipos);
					$equipos[1]->getNombreEquipo();
					foreach ($equipos as $valor) { 
						//echo $valor. " ";
					  	echo '<option value=" '.$valor->getNombreEquipo().'" >'.$valor->getNombreEquipo().'</option>';
					  }  
					  ?>
				   

				
				</select> 
				<button id="index" type="submit" name="eliminar">Eliminar</button>
				</form>
				
				
			</fieldset>
		</div>
		
	</div>

	<?php
		require("pie.php");
	?>	

</body>
</html>