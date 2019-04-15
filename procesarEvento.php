
<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Eventos.php';
require_once __DIR__.'/includes/Deporte.php';


if (!isset($_SESSION['esAdmin'])) {
    header('Location: login.php');
    exit();
}

$erroresFormulario = array();
 
$fecha_creacion=date("Y-m-d");

$ruta=$_FILES['imagen']['name'];

$nombre_evento = isset($_POST['nombre_evento']) ? $_POST['nombre_evento'] : null;
if ( empty($nombre_evento) || mb_strlen($nombre_evento) < 2 ) {
	$erroresFormulario[] = "El nombre del evento tiene que tener una longitud de al menos 5 caracteres.";
}

$deporte= isset($_POST['deporte']) ? $_POST['deporte'] : null;
if ( empty($deporte) || mb_strlen($deporte) < 2 ) {
    $erroresFormulario[] = "El deporte tiene que tener una longitud de al menos 4 caracteres.";
}

$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : null;

if ( empty($ciudad) || mb_strlen($ciudad) < 5 ) {
	$erroresFormulario[] = "La ciudad tiene que tener una longitud de al menos 5 caracteres.";
}

$municipio = isset($_POST['municipio']) ? $_POST['municipio'] : null;

if ( empty($municipio) || mb_strlen($municipio) < 5 ) {
	$erroresFormulario[] = "El municipio tiene que tener una longitud de al menos 5 caracteres.";
}

$localizacion = isset($_POST['localizacion']) ? $_POST['localizacion'] : null;

if ( empty($localizacion) || mb_strlen($localizacion) < 5 ) {
	$erroresFormulario[] = "La localización tiene que tener una longitud de al menos 5 caracteres.";
}

$fecha_evento = isset($_POST['fecha_evento']) ? $_POST['fecha_evento'] : null;

if ( empty($fecha_evento) || mb_strlen($fecha_evento) < 2 ) {
	$erroresFormulario[] = "La fecha tiene que rellenarse.";
}

$hora_evento = isset($_POST['hora_evento']) ? $_POST['hora_evento'] : null;

if ( empty($hora_evento) || mb_strlen($hora_evento) < 2 ) {
	$erroresFormulario[] = "La hora tiene que rellenarse.";
}

$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;

if ( empty($descripcion) || mb_strlen($descripcion) < 5 ) {
	$erroresFormulario[] = "La descripción tiene que tener una longitud de al menos 5 caracteres.";
}

  
if (($ruta == !NULL) && ($_FILES['imagen']['size'] <= 200000)) 
{
   	//formatos permitidos
   	if (($_FILES["imagen"]["type"] == "image/gif")
   		|| ($_FILES["imagen"]["type"] == "image/jpeg")
   		|| ($_FILES["imagen"]["type"] == "image/jpg")
   		|| ($_FILES["imagen"]["type"] == "image/png"))
   	{

   			/*
   			C:\xampp\htdocs\Sports-4-Friends\imgbd
   			cambiar luego al servidor remoto /dev/html/....
  		 	*/
   		$directorio = $_SERVER['DOCUMENT_ROOT'].'/Sports-4-Friends/images/eventos/';
     
      
     	 // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
    	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$ruta))
    	{
    		$ruta_foto = "images/eventos/".$ruta;     	
    	}
    	else
    	{
    		$erroresFormulario[] = "No se ha podido guardar la imagen";
    	}
   	} 
    else 
    {
       //si no cumple con el formato
       $erroresFormulario[] =  "No se puede subir una imagen con ese formato ";
    }
}
else 
{
   	//si existe la variable pero se pasa del tamaño permitido
 	if($ruta == !NULL)
 	{
   			$erroresFormulario[] =  "foto no valida"; 
   	}
}

if (count($erroresFormulario) === 0) 
{
		$existeEvento = Eventos::crearEvento($nombre_evento, $deporte, $ciudad, $municipio, $localizacion, $fecha_creacion, $fecha_evento, $hora_evento, $descripcion,$ruta_foto);
    
    if (!$existeEvento) 
    {
        $erroresFormulario[] = "El evento ya existe";
    } 
    else 
    {       
            header('Location: adminEventos.php');
            exit();
    }
} 

?>

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
	<div id="error">
		<fieldset id="errorLogin">
			<legend id="error">ERROR</legend>
		<?php
			if ($_SESSION["esAdmin"] == true) {
			
				foreach($erroresFormulario as $error) {
					echo "<li>$error</li>";
				}
				if (count($erroresFormulario) > 0) {
					echo '</ul>';
				}
			}
		?>
		</fieldset>
	</div>

	<div id="datos">
		<form action="procesarEvento.php" method="POST" enctype="multipart/form-data">
				<fieldset id="perfil">
						<legend id="log">REGISTRO DEL EVENTO</legend>
							<p id="perfil">Nombre Evento: <input type="text" name="nombre_evento" value=""></p>
							<p id="perfil">Deporte:
								<select name="deporte" id="dep" required>
									<?php $deportes = Deporte::getAll();
										foreach ($deportes as $valor) { 
						  					echo '<option value="'.$valor->nombreDeporte().'" >'.$valor->nombreDeporte().'</option>';
						  			}?></select></p>
							<p id="perfil">Ciudad: <input type="text" name="ciudad" value=""></p>
							<p id="perfil">Municipio: <input type="text" name="municipio" value=""></p>
							<p id="perfil">Localización: <input type="text" name="localizacion" value=""></p>
							<p id="perfil">Fecha Evento: <input type="text" name="fecha_evento" value=""></p>
							<p id="perfil">Hora Evento: <input type="text" name="hora_evento" value=""></p>
							<p id="perfil">Descripción: <input type="text" name="descripcion" value=""></p>
							<p id="perfil">Imagen del Equipo: <input type="file" name="imagen"></p>
							<button id= "index" type="submit" name="registro">Validar</button>
							<button formnovalidate formaction="adminEventos.php" id="index" type="submit" name="volver">Volver</button>
				</fieldset>
		</form>
	</div>
	</div>

	<?php 
		include("includes/comun/pie.php"); 
	?>

</body>
</html>