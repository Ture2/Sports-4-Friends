
<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Invitado.php';
require_once __DIR__.'/includes/Quedada.php';
require_once __DIR__.'/includes/Usuario.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

$erroresFormulario = array();
 

$ruta=$_FILES['imagen']['name'];

$usuario=$_SESSION['nombre'];

$creador=Usuario::buscaUsuario($usuario);

    if(empty($creador)){
        $erroresFormulario="el usuario no existe";
    }else {
        $id_creador=$creador->id();
    }


$nombre_quedada = isset($_POST['name']) ? $_POST['name'] : null;
if ( empty($nombre_quedada) || mb_strlen($nombre_quedada) < 2 ) {
	$erroresFormulario[] = "El nombre del evento tiene que tener una longitud de al menos 5 caracteres.";
}


$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : null;

if ( empty($ciudad) || mb_strlen($ciudad) < 3 ) {
	$erroresFormulario[] = "La ciudad tiene que tener una longitud de al menos 5 caracteres.";
}



$localizacion = isset($_POST['localizacion']) ? $_POST['localizacion'] : null;

if ( empty($localizacion) || mb_strlen($localizacion) < 2 ) {
	$erroresFormulario[] = "La localización tiene que tener una longitud de al menos 5 caracteres.";
}

$fecha_quedada = isset($_POST['fecha_quedada']) ? $_POST['fecha_quedada'] : null;

if ( empty($fecha_quedada) || mb_strlen($fecha_quedada) < 2 ) {
	$erroresFormulario[] = "La fecha tiene que rellenarse.";
}

$hora_quedada = isset($_POST['hora_quedada']) ? $_POST['hora_quedada'] : null;

if ( empty($hora_quedada) || mb_strlen($hora_quedada) < 2 ) {
	$erroresFormulario[] = "La hora tiene que rellenarse.";
}

$descripcion = isset($_POST['desc']) ? $_POST['desc'] : null;

if ( empty($descripcion) || mb_strlen($descripcion) < 3 ) {
	$erroresFormulario[] = "La descripción tiene que tener una longitud de al menos 5 caracteres.";
}

$aforo = isset($_POST['aforo']) ? $_POST['aforo'] : null;




if (($ruta == !NULL) && ($_FILES['imagen']['size'] <= 800000)) 
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
   		$directorio = $_SERVER['DOCUMENT_ROOT'].'/Sports-4-Friends/images/quedadas/';
     
      
     	 // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
    	if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$ruta))
    	{
    		$ruta_foto = "images/quedadas/".$ruta;     	
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
		$existeQuedada = Quedada::buscaQuedada($nombre_quedada);
    
    if ($existeQuedada) 
    {
        $erroresFormulario[] = "La quedada ya existe";
    } 
    else 
    {       
        
        
        $quedada=Quedada::crearQuedada($nombre_quedada, $id_creador,$ciudad,  $localizacion, $fecha_quedada, $hora_quedada, $descripcion,$ruta_foto,$aforo);
        $id=$quedada->id_quedada();
        $invitado=Invitado::creaInvitado($id, $creador->id());
        $apuntar=$invitado::apuntarQuedada($invitado);
        
        
        
            header('Location: quedadas.php');
            exit();
    }
} 

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css" />
	<meta charset="utf-8">
	<title>procrearQuedada</title>
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
	
			
				foreach($erroresFormulario as $error) {
					echo "<li>$error</li>";
				}
				if (count($erroresFormulario) > 0) {
					echo '</ul>';
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