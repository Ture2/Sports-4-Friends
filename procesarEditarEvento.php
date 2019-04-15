
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
	$erroresFormulario[] = "tiene que tener una longitud de al menos 5 caracteres.";
}

$municipio = isset($_POST['municipio']) ? $_POST['municipio'] : null;

if ( empty($municipio) || mb_strlen($municipio) < 5 ) {
	$erroresFormulario[] = "El municipio tiene que tener una longitud de al menos 5 caracteres.";
}

$localizacion = isset($_POST['localizacion']) ? $_POST['localizacion'] : null;

if ( empty($localizacion) || mb_strlen($localizacion) < 5 ) {
	$erroresFormulario[] = "La localizacion tiene que tener una longitud de al menos 5 caracteres.";
}

$fecha_evento = isset($_POST['fecha_evento']) ? $_POST['fecha_evento'] : null;

if ( empty($fecha_evento) || mb_strlen($fecha_evento) < 2 ) {
	$erroresFormulario[] = "La fecha tiene que tener una longitud de al menos 5 caracteres.";
}

$hora_evento = isset($_POST['hora_evento']) ? $_POST['hora_evento'] : null;

if ( empty($hora_evento) || mb_strlen($hora_evento) < 2 ) {
	$erroresFormulario[] = "La hora tiene que tener una longitud de al menos 5 caracteres.";
}

$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;

if ( empty($descripcion) || mb_strlen($descripcion) < 5 ) {
	$erroresFormulario[] = "La descripcion tiene que tener una longitud de al menos 5 caracteres.";
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

//DEPURACION:

var_dump($_FILES);
var_dump($_POST['nombre_evento']);
var_dump($_POST['deporte']);
var_dump($_POST['ciudad']);
var_dump($_POST['municipio']);
var_dump($_POST['localizacion']);
var_dump($fecha_creacion);
var_dump($_POST['fecha_evento']);
var_dump($_POST['hora_evento']);
var_dump($_POST['descripcion']);
var_dump($_FILES['imagen']['name']);
var_dump($ruta_foto);



if (count($erroresFormulario) === 0) 
{
	$evento = Eventos::buscaEvento($nombre_evento);
	if($evento)
	{
		$evento->set_deporte($deporte);
	    $evento->set_ciudad($ciudad);
	    $evento->set_municipio($municipio);
	    $evento->set_localizacion($localizacion);
	    $evento->set_fecha_creacion($fecha_creacion);
	    $evento->set_fecha_evento($fecha_evento);
	    $evento->set_descripcion($descripcion);
	    $evento->set_ruta_foto($ruta_foto);
	}
	
    
	$evento = Eventos::guardarEvento($evento);

    if ($evento) 	
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

	<div id="logo">
		<img class="logo" src="images/logo.png">
	</div>   
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
	
	<div id="registro">
		<form action="procesarEditarEvento.php" method="POST" enctype="multipart/form-data">
				<fieldset id="campo">
						<legend id="log">EDITAR EVENTOS</legend>

							<p id="reg"><label id="reg">Nombre evento:</label> 
								<select name="nombre_evento" id="evento" required>
									<?php $eventos = Eventos::listarEventos();
										foreach ($eventos as  $valor) { 
						  					echo '<option  value="'.$valor->nombre_evento().'" >'.$valor->nombre_evento().'</option>';
						  			}?></select></p>

							<p id="log">Deporte:
								<select name="deporte" id="dep" required>
									<?php $deportes = Deporte::getAll();
										foreach ($deportes as $valor) { 
						  					echo '<option value="'.$valor->nombreDeporte().'" >'.$valor->nombreDeporte().'</option>';
						  			}?></select></p>

							<p id="reg"><label id="reg">ciudad:</label> <input type="text" name="ciudad" value=""></p>
							<p id="reg"><label id="reg">municipio:</label> <input type="text" name="municipio" value=""></p>
							<p id="reg"><label id="reg">localizacion:</label> <input type="text" name="localizacion" value=""></p>
							<p id="reg"><label id="reg">Fecha evento:</label> <input type="text" name="fecha_evento" value=""></p>
							<p id="reg"><label id="reg">Hora evento:</label> <input type="text" name="hora_evento" value=""></p>
							<p id="reg"><label id="reg">descripcion:</label> <input type="text" name="descripcion" value=""></p>
							<p id="log">Imagen del Equipo: <input type="file" name="imagen"></p>
							<button id= "index" type="submit" name="registro">Validar</button>
				</fieldset>
		</form>
	</div>

	<?php 
		include("includes/comun/pie.php"); 
	?>


</body>
</html>