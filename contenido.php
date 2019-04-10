<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<div id="contenido">
		<div class="slideshow-container">

	  	<div class="mySlides fade">
		    <div class="numbertext">1 / 3</div>
		    <img class="logo" src="images/logo.png">
		    <div class="text">FOTO 1</div>
	  	</div>

	  	<div class="mySlides fade">
		    <div class="numbertext">2 / 3</div>
		    <img class="logo" src="images/evento1.png">
		    <div class="text">FOTO 2</div>
	  	</div>

	  	<div class="mySlides fade">
		    <div class="numbertext">3 / 3</div>
		    <img class="logo" src="images/evento2.jpg">
		    <div class="text">FOTO 3</div>
	  	</div>

		  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		  <a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>

		<br>
		
		<div id="dot">
		  	<span class="dot" onclick="currentSlide(1)"></span> 
		  	<span class="dot" onclick="currentSlide(2)"></span> 
		  	<span class="dot" onclick="currentSlide(3)"></span> 
		</div>

	</div>
</body>
<script src="javascript/slide.js"></script>
</html>