<?php
/*include('assets/frame/connx.php');
$aes = new ChCrytpo();
echo $aes->encrypt("systemas27", "123456789012345678901234567890as").'<br>';
echo $aes->decrypt("ZmJe3i/f+wZQs/Tg4v0uCQUsZBNdMUvMEQYcpQZKbQjVacs8DPBCiflmUQw8N4k2", "e6cf35670d6f916233951aa2a127d33f");
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>Fhito :: Bienvenidos</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/w3.css">
<style>
.mySlides {display:none}

img {
	display: block;
	margin-left: auto;
	margin-right: auto;
	width: 50%;
}
</style>
</head>
<body class="fondo w3-text-white">
<br>
<div class="w3-content dive w3-white w3-padding w3-round-xlarge" style="max-width:800px;">
	<br>
	<div class="w3-row">
		<div class="w3-col s2">
			<img class="w3-image" src="assets/figs/logoa.png" style="width:60px;">
		</div>
		<div class="w3-col s8">
			<h2>FHITO</h2>
			<hr class="new4">
		</div>
		<!-- <div class="w3-col s10">
			<div class="w3-row">
				<div class="w3-col s1">
					<img class="w3-image" src="assets/figs/logoa.png" style="width:100%">
				</div>
				<div class="w3-col s11">
					<h2>FHITO</h2>
					<hr class="new4">
				</div>
			</div>
		</div> -->
		<div class="w3-col s2">
			<div class="w3-dropdown-click w3-right">
				<button class="w3-button w3-black w3-xlarge" onclick="myFunction()">&#9776;</button>
				<div id="Demo" class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
					<a href="politica" class="w3-bar-item w3-button" onclick="myFunction()">Politicas</a>
					<a href="elcuenta" class="w3-bar-item w3-button" onclick="myFunction()">Eliminar Cuentas</a>
					<a href="panel" class="w3-bar-item w3-button" onclick="myFunction()">Panel</a>
				</div>
			</div>
		</div>
	</div>
<!-- </div>
<div class="w3-content dive" style="max-width:900px"> -->
	<img class="mySlides w3-image" src="assets/figs/fig71.png" style="width:100%;max-width:200px">
	<img class="mySlides w3-image" src="assets/figs/fig72.png" style="width:100%;max-width:200px">
	<img class="mySlides w3-image" src="assets/figs/fig73.png" style="width:100%;max-width:200px">
	<img class="mySlides w3-image" src="assets/figs/fig74.png" style="width:100%;max-width:200px">
	<img class="mySlides w3-image" src="assets/figs/fig75.png" style="width:100%;max-width:200px">

	<div class="w3-center">
		<div class="w3-section">
			<button class="w3-button w3-light-grey w3-round-xlarge" onclick="plusDivs(-1)">❮ Prev</button>
			<button class="w3-button w3-light-grey w3-round-xlarge" onclick="plusDivs(1)">Sigt ❯</button>
		</div>
		<button class="w3-button demo" onclick="currentDiv(1)">1</button> 
		<button class="w3-button demo" onclick="currentDiv(2)">2</button> 
		<button class="w3-button demo" onclick="currentDiv(3)">3</button> 
		<button class="w3-button demo" onclick="currentDiv(4)">4</button> 
		<button class="w3-button demo" onclick="currentDiv(5)">5</button> 
	</div>
	<br>
</div>
<br>

<div class="w3-content dive" style="max-width:900px">
<h4 class="w3-center w3-medium">Herramientas para el transporte</h4>
<h4 class="w3-center w3-medium">Reemplaza el lápiz y papel por una Tablet o Teléfono</h4>
</div>
<br>


<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
	showDivs(slideIndex += n);
}

function currentDiv(n) {
	showDivs(slideIndex = n);
}

function showDivs(n) {
	var i;
	var x = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("demo");
	if (n > x.length) {slideIndex = 1}    
	if (n < 1) {slideIndex = x.length}
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";  
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" w3-black", "");
	}
	x[slideIndex-1].style.display = "block";  
	dots[slideIndex-1].className += " w3-black";
}

function myFunction() {
var x = document.getElementById("Demo");
if (x.className.indexOf("w3-show") == -1) {
	x.className += " w3-show";
} else { 
	x.className = x.className.replace(" w3-show", "");
}
}
</script>
</body>
</html>
