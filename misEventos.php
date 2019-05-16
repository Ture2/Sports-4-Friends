<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/RegistroEvento.php';
require_once __DIR__.'/includes/Jugador.php';


if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}


$errores = array();

$registrosEventos = RegistroEvento::registrosEventosUsuario($_SESSION['nombre']);

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
	<?php
		if (isset($_SESSION["login"]))
		{
			if(empty($registrosEventos))
			{
	?>

				<fieldset id="errorLogin">
					<pre id="texto1">NO TIENES NINGUN EVENTO DISPONIBLE 
						Volver a <a href="eventos.php">Eventos</a>
					</pre>
				</fieldset>

			<?php
			}

			else
			{
			?>
			<form>
				<input formaction="eventos.php" class="login-equipos" type="submit" name="boton2" value="Volver"/>
			</form>
					<div id="evento1">
						<fieldset id="evento1">
								<?php foreach ($registrosEventos as $value) {?>
								<h1 id="h"><?=$value->evento();?></h1>
								<p id="evento">Equipo: <?=$value->equipo();?></p>
								<p id="evento">Fecha: <?=$value->fecha_creacion();?></p>
								<?php
							}
							?>
						</fieldset>
					</div>
			<?php
			}
		}
		?>
	</div>

	<?php 
		include("includes/comun/pie.php"); 
	?>
</body>
</html>
