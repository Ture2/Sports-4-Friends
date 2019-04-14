<?php

	require_once __DIR__.'/../config.php';
	require_once __DIR__.'/../Deporte.php';

	if(!isset(($_SESSION['login']))){
		$username = false; 
	}else{
		$username = $_SESSION['nombre'];
	}

	$deportes = Deporte::getAll();

  ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title></title>
</head>
<body>
		<div id="barra">
			<nav>
				<ul class="nav">
					<li><a href="index.php"><img id="menu" src="images/inicio.png">Inicio</a></li>
					<li><a><img id="menu" src="images/deportes.png">Deportes</a>
						<ul>
							<?php
								$i = 0;
								while($i < 5 && $i < count($deportes)){
									echo "<li><a href='procesarListarEquipos.php?deporte=".$deportes[$i]->nombreDeporte()."''>".ucfirst(strtolower($deportes[$i]->nombreDeporte()))."</a></li>";
									$i++;
								}
							?>
						</ul></li>

					<li><a href="eventos.php"><img id="menu" src="images/eventos.png">Eventos</a></li>

					<li><a href="quedadas.php"><img id="menu" src="images/quedadas.png">Quedadas</a></li>

					<li>
						<?php
							if($username){
								echo '<a href=""><img id="menu" src="images/cuenta.png">Hola '.$username.'</a>';
							}else{
								echo '<a href="login.php"><img id="menu" src="images/login.png"> Iniciar Sesión</a>';
							}
						  ?>
					<!--</a>-->
					<?php
						if ($username) {
							echo '<ul>
									<li><a href="perfil.php">Mi Perfil</a></li>
									<li><a href="estadistica.php">Estadísticas</a></li>
									<li><a href="logout.php">Cerrar Sesión</a></li>
								</ul>';
						}
					  ?>
					</li>
					<?php
						if(!$username){
							echo '<li><a href="registro.php"><img id="menu" src="images/registro.png">Registrarse</a></li>';
						}
					  ?>		
				</ul>
			</nav>
		</div>
</body>
</html>