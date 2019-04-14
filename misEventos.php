<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/RegistroEvento.php';

//guardamos en un array los posibles errores que puedan darse
$errores = array();

if(isset($_SESSION["login"])){

	$equiposPerteneceUsuario = ...($_SESSION['nombre']);

	if(!isset($equiposPerteneceUsuario)){
		$errores[] = "No te has unido a ningun equipo";
	}
	else
	{

		$registrosEventos = RegistroEvento::buscaRegistroEventosPorEquipos($equiposPerteneceUsuario);

		if(!isset($registrosEventos))
		{
			$errores[] = "Ningun equipo al que te has unido participa en los ventos";
		}
		/*
		else
		{
			$arrayEventos = array();
			foreach ($registrosEventos as $value) 
			{
				$arrayEventos[] = Eventos::buscarEvento($value->evento());
			}
		}
		*/
	}
}
else{
	$errores[] = "No puedes acceder al contenido";
}

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
		require("includes/comun/menu.php");
	?>


	<div id="logo">
		<img class="logo" src="images/logo.png">
	</div>   
	<div id="error">
		
		<fieldset id="errorLogin">
			<legend id="error">ERROR</legend>
		<?php
			if ($_SESSION["esAdmin"] == true) {
			
				foreach($errores as $error) {
					echo "<li>$error</li>";
				}
				if (count($errores) > 0) {
					echo '</ul>';
				}
			}
		?>
		</fieldset>
	</div>




	<?php
		if (isset($_SESSION["login"]))
		{
			if(count($errores) == 0)) 
			{
			?>
					<div id="eventos">
						<fieldset id="eventos">
							<div id="evento">
								<?php foreach ($registrosEventos as $key => $value) {?>
								<p id="evento"><?=$value->evento();?></p>
								<p id="evento"><?=$value->equipo();?></p>
								<p id="evento"><?=$value->p_victorias();?></p>
								<p id="evento"><?=$value->fecha_creacion();?></p>
								<?php
							}
							?>
							</div>
						</fieldset>
					</div>
				</div>
			<?php
			}
		}
		?>

	<?php 
		include("includes/comun/pie.php"); 
	?>
</body>
</html>
