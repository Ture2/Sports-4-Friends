
<?php
/*
----------------------------------------
METADATA:                               |
    imp_f (implementado y funcionando)  |
    ^  (falta por hacer)                |
----------------------------------------
COMPROBACIONES:
   -errores en un array $erroresFormulario; 			imp
   -datos del post  nickUsuario/evento/deporte			imp
   -comprobar que los datos no son nulos 				imp

*/

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Usuario.php';
require_once __DIR__.'/includes/Equipo.php';
require_once __DIR__.'/includes/Deporte.php';
require_once __DIR__.'/includes/Evento.php';

if (! isset($_POST['login']) ) {
    header('Location: login.php');
    exit();
}

$erroresFormulario = array();


//RECUPERAR DEL FORMULARIO UN DATO DE <DATALIST> 

$nombreEvento = isset($_POST['evento']) ? $_POST['evento'] : null;
if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
	$erroresFormulario[] = "El nombre del evento tiene que tener una longitud de al menos 5 caracteres.";
}

$nombreEquipo = isset($_POST['equipo']) ? $_POST['equipo'] : null;
if ( empty($correo) || mb_strlen($correo) < 2 ) {
    $erroresFormulario[] = "El correo tiene que tener una longitud de al menos 5 caracteres.";
}

//----------------------------------------------------------------------------------------------------------------

$nickUsuario = isset($_POST['nickUsuario']) ? $_POST['nickUsuario'] : null;

if ( empty($nombreUsuario) || mb_strlen($nombreUsuario) < 5 ) {
	$erroresFormulario[] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
}

if (count($erroresFormulario) === 0) {

	//CONSTRUCTORA $usuario = Usuario::crea($nombreUsuario, $nombre, $correo, $password, 'USER');

    /*
    	0) busco si existe el evento, si existe creo un objeto de mi evento
    		|_>!error
		
		1) busco si el equipo existe, si existe creo un objeto de mi equipo
			|_>!error

    	2) busco si existe un usuario con ese nick y me quedo con su id_usuario,
    		-con el id_usuario busco si existe un jugador con ese id_usuario donde sea admin
    		en el equipo que introdujo el usuario.
    		|_>!error
    */


    /*
    if (! $usuario ) {
        $erroresFormulario[] = "El usuario ya existe";
    } else {
        $_SESSION['login'] = true;
        $_SESSION['nombre'] = $nombreUsuario;
        header('Location: index.php');
        exit();
        
    }
    */
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
		require("../includes/comun/cabecera.php");
		require("menu.php");
	?>

	<div id="logo">
		<img class="logo" src="images/logo.png">
	</div>

	<?php
		if (count($erroresFormulario) > 0) {
			echo '<ul class="errores">';
		}
		foreach($erroresFormulario as $error) {
			echo "<li>$error</li>";
		}
		if (count($erroresFormulario) > 0) {
			echo '</ul>';
		}
	?>		

	<div id="registro">
		<form action="procesarRegistroEvento.php" method="POST">
				<fieldset id="campo">
				<legend id="log">Registra tu Equipo en el evento</legend>
					Evento:<input list="lEventos" name="evento">
						<datalist id="lEventos">
								<option>Url</option>
								<option>PRU1E</option>
								<option>PRUE2</option>
								<option>PRUE3</option>
								<option>PRUE4</option>
								<option>PRUE5</option>
							</datalist>			
						</input>
					Equipos:<input list="lEquipos" name="equipo">
						<datalist id="lEquipos">
								<option>Url</option>
								<option>PRU1E</option>
								<option>PRUE2</option>
								<option>PRUE3</option>
								<option>PRUE4</option>
								<option>PRUE5</option>
						</datalist>	
							</input>	

			 NickUser:<input type="text" name="nickUsuario" value="">
			<button id= "index" type="submit" name="registro">Validar</button>
		</fieldset>
	</form>
	</div>

	<?php 
		include("includes/comun/pie.php"); 
	?>
</body>
</html>