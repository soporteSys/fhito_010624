<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//~ if (isset($_GET['orga'])){
		//~ $orgax = $_GET['orga'];
		//~ $iduzx = $_SESSION["iduk"];
		//~ if (empty($orgax)) {
			header("location: assets/panel/configa");
		//~ } else {
			//~ if ($_SESSION['empe'] == "") header("location:../../../");			
			//~ $empe = $_SESSION['empe'];
		//~ }
	//~ }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Fhito :: Panel Administrativo</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/font/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/w3.css">
<script type = "text/javascript" src = "assets/js/jquery-3.6.0.min.js"></script>
<style>
table {
	display: block;
	margin-left: auto;
	margin-right: auto;
	width: 50%;
}
</style>
</head>
<body class="fondo w3-text-black">
<br>
<div class="w3-content dive w3-white w3-padding w3-round-xlarge" style="max-width:700px">
	<!-- <br> -->
	<div class="w3-row">
		<div class="w3-col s2">&nbsp;
			<!-- <img class="w3-image" src="assets/figs/logoa.png" style="width:50px;"> -->
		</div>
		<div class="w3-col s8">
			<h2 class="w3-center">ELIMINAR CUENTAS DE USUARIO</h2>
		</div>
		<!-- <div class="w3-col s10">
			<div class="w3-row">
				<div class="w3-col s2">
					<img class="w3-image" src="assets/figs/logoa.png" style="width:50px;">
				</div>
				<div class="w3-col s10">
					<h2 class="w3-center">ELIMINAR CUENTAS DE USUARIO</h2>
				</div>
			</div>
		</div> -->
		<div class="w3-col s2">
			<div class="w3-right">
				<a href="./" class=""><i class="fa fa-arrow-circle-left fa-3x w3-text-red"></i></a>
			</div>
		</div>
	</div>
	<hr class="new4">
<!-- </div> -->
<br>

<!-- <div class="w3-content dive" style="max-width:900px"> -->
	<table class="w3-table" style="max-width:250px">
		<tr>
			<td><input class="w3-input" type="text" placeholder="RUC"></td>
		</tr>
		<tr>
			<td><input class="w3-input" type="text" placeholder="USUARIO"></td>
		</tr>
		<tr>
			<td><input class="w3-input" type="text" placeholder="CLAVE"></td>
		</tr>
		<tr>
			<td class="w3-center">
				<button class="w3-button w3-black w3-round" style="width:100%">Eliminar</button>
			</td>
		</tr>
	</table>
</div>

</body>
</html>
