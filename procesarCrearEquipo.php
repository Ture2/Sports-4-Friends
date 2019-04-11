<?php
	
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Equipo.php';
require_once __DIR__.'/includes/Deporte.php';
require_once __DIR__.'/includes/Jugador.php';
require_once __DIR__.'/includes/Usuario.php';

	$nombre_img = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	$tamano = $_FILES['imagen']['size'];
    $nombreEquipo=$_POST['name'];
    $deporte=$_POST['deporte'];
    $desc=$_POST['desc'];
    //$nickUsuario=$_SESSION[''];
    $nickUsuario=$_SESSION['nombre'];
    
    $dep=Deporte::buscaDeporte($deporte);
    
    $res=$dep->id();
    
    
	if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 200000)) 
	{
   		//indicamos los formatos que permitimos subir a nuestro servidor
   		if (($_FILES["imagen"]["type"] == "image/gif")
   			|| ($_FILES["imagen"]["type"] == "image/jpeg")
   			|| ($_FILES["imagen"]["type"] == "image/jpg")
   			|| ($_FILES["imagen"]["type"] == "image/png"))
   		{
      // Ruta donde se guardarán las imágenes que subamos
   		    //C:\xampp\htdocs\Sports-4-Friends\imgbd
      $directorio = $_SERVER['DOCUMENT_ROOT'].'/Sports-4-Friends/images/logo_equipos/';
     
      
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre_img);     
     
    
   		
   		
   	} 
    else 
    {
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }
} 
else 
{
   //si existe la variable pero se pasa del tamaño permitido
   if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
}
    

$usu= Usuario::buscaUsuario($nickUsuario);

  
    //link para mostrar imagen
  //http://www.formacionwebonline.com/guia-para-subir-y-visualizar-imagenes-con-php-y-mysql/
 
    


 
    $fecha=date("Y-m-d");
    $hora=date("H:i:s");
    
    $ret=Equipo::crea($res,$nombreEquipo,$nombre_img,$desc);
    
    
    $id_equipo=$ret->get_id();
    $jugador=Jugador::crea($id_equipo,$usu->id(),"1",$fecha,$hora);
    
 Jugador::guardaJugador($jugador);
 
 

 
  
  header('Location: index.php');
  

?>