<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
	<meta charset="utf-8">
	<title>Crear Equipo</title>
</head>
<body>

	<?php
		require("../includes/comun/cabecera.php");
	?>

	<div id="contenido">
		<div id="crear">
			<fieldset id="crear">
				<legend id="log">EQUIPO</legend>
				<form action="procesarCrearEquipo.php">
				<p>Nombre del Equipo: <input type="text" name="name"></p>
				<p>Deporte:
				<select>
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
				</select></p>
				<p>Imagen del Equipo: <input type="file" name="imagen"></p>
				<button id="index" type="submit">Entrar</button>
				</form>
			</fieldset>
		</div>
		
	</div>

	<?php
		require("../includes/comun/pie.php");
	?>	

</body>
</html>