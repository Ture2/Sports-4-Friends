<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<meta charset="utf-8">
	<title>Deportes</title>
</head>
<body>
	<?php
		require("includes/comun/cabecera.php");
	?>
	<main class = "backgroundIndexColor">
		<section id = "text-center">
			<div id = "section">
				<div class ="section-content-2">
					<a href="procesarListarEquipos.php?deporte=FUTBOL" class="unit-link">
					<div class = "copy-wrapper">
						<h2 class = "indexHead-2">F&uacutetbol</h2>
						<figure class="indexImage">
							<img src = "images/deportes/futbol.jpg">	
						</figure>
							<h4 class = "indexText-2"></h4>
					</div>
					</a>
				</div>	
				<div class ="section-content-2">
					<a href="procesarListarEquipos.php?deporte=BALONCESTO" class="unit-link">
					<div class = "copy-wrapper">
						<h2 class = "indexHead-2">Baloncesto</h2>
						<figure class="indexImage">
							<img src = "images/deportes/baloncesto.jpg">	
						</figure>
							<h4 class = "indexText-2"></h4>
					</div>
					</a>
				</div>
			</div>
		</section>
				<section id="text-center">
					<div id="section">
				<div class ="section-content-2">
					<a href="procesarListarEquipos.php?deporte=TENIS" class="unit-link">
					<div class = "copy-wrapper">
						<h2 class = "indexHead-2">Tenis</h2>
						<figure class="indexImage">
							<img src = "images/deportes/tenis.jpg">	
						</figure>
							<h4 class = "indexText-2"></h4>
					</div>
					</a>
				</div>
				<div class ="section-content-2">
					<a href="procesarListarEquipos.php?deporte=BEISBOL" class="unit-link">
					<div class = "copy-wrapper">
						<h2 class = "indexHead-2">Beisbol</h2>
						<figure class="indexImage">
							<img src = "images/deportes/beisbol.jpg">	
						</figure>
							<h4 class = "indexText-2"></h4>
					</div>
					</a>
				</div>
			</div>
		</section>
		<section id="text-center">
			<div id="section">
				<div class ="section-content-2">
					<a href="procesarListarEquipos.php?deporte=BALONMANO" class="unit-link">
					<div class = "copy-wrapper">
						<h2 class = "indexHead-2">Balonmano</h2>
						<figure class="indexImage">
							<img src = "images/deportes/balonmano.jpg">	
						</figure>
							<h4 class = "indexText-2"></h4>
					</div>
					</a>
				</div>
			</div>							
		</section>
	</main>
	<?php
		require("includes/comun/pie.php");
	?>
</body>
</html>