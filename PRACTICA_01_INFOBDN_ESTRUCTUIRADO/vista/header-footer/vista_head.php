<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
	<link rel="stylesheet" href="css/styles.css" type="text/css">
	<script src="https://kit.fontawesome.com/60fe4c0254.js" crossorigin="anonymous"></script>
</head>

<body>
	<header>
		<?php
			$contingut = "<div class='head' style='margin-top: 35px;'>";
			if (isset($_SESSION['usu_admin'])) {
				$contingut .= "<h1 style='color: red; margin-left: 150px'> Pàgina d'Administració infoBDN </h1>";
				$contingut .= '<button class="buttons"><a href="index.php?entrada=sortir"><i class="fas fa-sign-out-alt"><p class="boton_salir">TANCAR SESSIO</p></i></a></button>';
			}
			else if (isset($_SESSION['dni'])){
				$contingut .= "<h1 style='color: red; margin-left: 200px'> Pàgina d'usuari infoBDN </h1>";
				$contingut .= '<button><a href="index.php?entrada=sortir"><i class="fas fa-sign-out-alt"><p class="boton_salir">TANCAR SESSIO</p></i></a></button>';
			}
			else if (isset($_SESSION['dni_professor'])) {
				$contingut .= "<h1 style='color: red; margin-left: 200px'> Pàgina d'usuari infoBDN </h1>";
				$contingut .= '<button><a href="index.php?entrada=sortir"><i class="fas fa-sign-out-alt"><p class="boton_salir">TANCAR SESSIO</p></i></a></button>';
			}
			else{
				$contingut = "";
			}
			$contingut .= "</div>";
			print_r($contingut);
		?>
	</header>