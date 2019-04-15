<?php
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/includes/Eventos.php';
	require_once __DIR__.'/includes/Equipos.php';

if (! isset($_POST['login']) ) {
header('Location: login.php');
exit();
}

	$eventos = Eventos::listarEventos();
	$equipos = Equipo::getAllEquipos();
	
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title></title>
</head>
<body>

	<?php
		require("includes/comun/cabecera.php");
	?>
	
	<div id="contenido">
		<form action="procesarRegistroEvento.php" method="POST">
				<fieldset id="evento">
				<legend id="log">Registra tu equipo en el evento</legend>
					<p id="log">Evento: <input list="eventos" name="evento">
						<datalist id="eventos">
								<?php
										foreach ($eventos as $valor) { 
						  					echo '<option value="'.$valor->nombre_evento().'" >'.$valor->nombre_evento().'</option>';
						  		?>
							</datalist>			
						</input></p>
					<p id="log">Equipos: <input list="equipos" name="equipo">
						<datalist id="equipos">
								<?php
										foreach ($equipos as $valor) { 
						  					echo '<option value="'.$valor->get_id().'" >'.$valor->set_nombre_equipo().'</option>';
						  		?>
						</datalist>	
							</input></p>
							
			<button id= "index" type="submit" name="registro">Validar</button>
			<button formaction="eventos.php" id="index" type="submit" name="cancelar">Cancelar</button>
		</fieldset>
	</form>
	</div>

	<?php 
		include("includes/comun/pie.php"); 
	?>

</body>
</html>
