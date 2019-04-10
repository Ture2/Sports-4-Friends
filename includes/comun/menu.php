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
					<li><a href=""><img id="menu" src="images/deportes.png">Deportes</a>
						<ul>
							<?php
								$i = 0;
								while($i < 3 && $i < count($deportes)){
									echo "<li><a href='procesarListarEquipos.php?deporte=".$deportes[$i]->nombreDeporte()."''>".$deportes[$i]->nombreDeporte()."</a></li>";
									$i++;
								}
							?>
							<li><a href="">Otros</a></li>
						</ul></li>

					<li><a href="">Eventos</a>
							<ul>
							<li><a href="eventos.php"> proximos eventos </a></li>
							</ul></li>
					<li><a href="">Quedadas</a>
						<ul>
							<li><a href="">Bares</a></li>
							<li><a href="">Estadios</a></li>
							<li><a href="">Parques</a></li>
							<li><a href="">Otros</a></li>
						</ul></li>
					<li><!--<a href="">-->
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