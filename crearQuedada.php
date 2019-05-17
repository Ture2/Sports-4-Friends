<?php 
require_once __DIR__.'/includes/config.php';
//require_once __DIR__.'/includes/Usuario.php';
require_once __DIR__.'/includes/Deporte.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>Crear quedada</title>
</head>
<body>

	<?php

		require("includes/comun/cabecera.php");
	?>

	<div id="contenido">
		<div id="datos">
			<fieldset id="quedada">
				<legend id="log">QUEDADA</legend>
				<form action="procesarCrearQuedada.php" enctype="multipart/form-data" method="post">
				<p id="log">Nombre de la quedada: <input type="text" name="name" required></p>
				<p id="log">Ciudad o provincia: <select name="ciudad" size="1">
            <option value='selecciona'>Selecciona</option>
            <option value='A Coruna' >A Coru&ntildea</option>
            <option value='Alava'>Alava</option>
            <option value='Albacete' >Albacete</option>
            <option value='Alicante'>Alicante</option>
            <option value='Almeria' >Almeria</option>
            <option value='Asturias' >Asturias</option>
            <option value='Avila' >Avila</option>
            <option value='Badajoz' >Badajoz</option>
            <option value='Gerona' >Gerona</option>
            <option value='Girona' >Girona</option>
            <option value='Las Palmas' >Las Palmas</option>
            <option value='Granada' >Granada</option>
            <option value='Guadalajara' >Guadalajara</option>
            <option value='Guipuzcoa' >Guipuzcoa</option>
            <option value='Huelva' >Huelva</option>
            <option value='Huesca' >Huesca</option>
            <option value='Jaen' >Jaen</option>
            <option value='La Rioja' >La Rioja</option>
            <option value='Leon' >Leon</option>
            <option value='Lleida' >Lleida</option>
            <option value='Lugo' >Lugo</option>
            <option value='Madrid' >Madrid</option>
            <option value='Malaga' >M&aacutelaga</option>
            <option value='Valladolid' >Valladolid</option>
            <option value='Vizcaya' >Vizcaya</option>
            <option value='Zamora' >Zamora</option>
            <option value='Zaragoza'>Zaragoza</option>
          </select></p>
				<p id="log">Localizaci&oacuten: <input type="text" name="localizacion" value=""></p>
				<p id="log">Fecha quedada:  <input type="date" name="fecha_quedada" value="2019-08-08"min="2018-03-25"
                                  max="2020-05-25" step="1"></p>
				<p id="log">Hora quedada: <input type="time" name="hora_quedada" value="11:45:00" max="22:30:00" min="10:00:00" step="1"></p>
				<p id="log">Imagen : <input type="file" name="imagen"></p>
				<p id="log">Descripci&oacuten (max 50): <textarea type="text" name="desc" maxlength="50"></textarea></p>
				<p id="log">Aforo :<input type="number" name="aforo" min="2" max="10" step="1"  required="required"></p>
				<button id="index" type="submit" name="crear">CREAR</button>
				<button onclick="history.back()" id="index" type="submit" name="volver">VOLVER</button>
				</form>
			</fieldset>
	</div>

	<?php
		require("includes/comun/pie.php");
	?>	

</body>
</html>