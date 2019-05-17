
window.onload = () => {
	document.getElementById("botonCerrarFormulario").style.display = "none";
	document.getElementById("crearEquipoForm").style.display = "none";
}

function openForm(){
  	document.getElementById("crearEquipoForm").style.display = "flex";
  	document.getElementById("contenido").style.filter = "blur(4px)";
  	document.getElementById("crearEquipoForm").style.zIndex=100;
	document.getElementById("fieldset#perfil").marginTop="-100em";

  	document.getElementById("botonCrearEquipo").style.display = "none";
  	document.getElementById("botonCerrarFormulario").style.display = "inline";
}

function closeForm() {
  document.getElementById("crearEquipoForm").style.display = "none";
  document.getElementById("botonCrearEquipo").style.display = "inline";
  document.getElementById("botonCerrarFormulario").style.display = "none";
}
