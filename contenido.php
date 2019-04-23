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
		    <div class="numbertext">1 / 4</div>
		    <img class="logoIndex" src="images/intro1.png">
		    <div class="text"></div>
	  	</div>

	  	<div class="mySlides fade">
		    <div class="numbertext">2 / 4</div>
		    <img class="logoIndex" src="images/intro2.png">
		    <div class="text"></div>
	  	</div>

	  	<div class="mySlides fade">
		    <div class="numbertext">3 / 4</div>
		    <img class="logoIndex" src="images/intro3.png">
		    <div class="text"></div>
	  	</div>

	  	<div class="mySlides fade">
		    <div class="numbertext">4 / 4</div>
		    <img class="logoIndex" src="images/intro4.png">
		    <div class="text"></div>
	  	</div>

		  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		  <a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>

		<br>
		
		<div id="dot">
		  	<span class="dot" onclick="currentSlide(1)"></span> 
		  	<span class="dot" onclick="currentSlide(2)"></span> 
		  	<span class="dot" onclick="currentSlide(3)"></span>
		  	<span class="dot" onclick="currentSlide(4)"></span>
		</div>

	</div>
</body>
<script src="javascript/slide.js"></script>
</html>