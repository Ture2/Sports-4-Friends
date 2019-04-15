<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/RegistroEvento.php';
require_once __DIR__.'/includes/Jugador.php';


if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}


$errores = array();

$equiposPerteneceUsuario =Jugador::listaEquiposPorJugador($_SESSION['nombre']);

if(empty($equiposPerteneceUsuario))
{
		$errores[] = "No estas apuntado a ningun equipo";
}
else
{
	if(count($equiposPerteneceUsuario) > 0)
	{
		$registrosEventos = array();

		for($i = 0; $i < count($equiposPerteneceUsuario); $i++)
		{
			$comprobar  = RegistroEvento::buscaRegistroEventosEquipo($equiposPerteneceUsuario[$i]);
			//var_dump($equiposPerteneceUsuario[$i]);
			if($comprobar)
			{
				$registrosEventos[] = $comprobar;
			}
			
		}
	}
}

/*
var_dump($_SESSION['nombre']);
var_dump($equiposPerteneceUsuario);
var_dump($registrosEventos);
*/

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


	<?php
		if (isset($_SESSION["login"]))
		{
			if(empty($registrosEventos))
			{
				echo "TÚ/S NO TIENEN NINGUN EVENTO/S DISPONIBLE/S";
			}
			elseif(count($errores) == 0)
			{
			?>
					<div id="eventos">
						<fieldset id="eventos">
							<div id="evento">
								<?php foreach ($registrosEventos as $value) {?>
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
