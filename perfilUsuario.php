<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<title> Finddle </title>
		<link rel="stylesheet" href="includes/css/style.css" type="text/css">
		<link rel="shortcut icon" href="includes/img/favicon1.png" />
	</head>
	
	<body>
		<div id="pu-cabecera">
        <div id = "centrado">
		<a href="index.html"id="logo"><img src="includes/img/l2.png"></a>
		<nav class="buttons">
			<a href="proximosEventos.html">Conciertos</a>
			<a href="cartelera.html">Cine</a>
			<a href="proximosEventos.html">Fiestas</a>
			<a href="index.html">Salir</a>
		</nav>
		</div>
		<h1> Perfil del usuario </h1>
		
		<?php 
			require_once(__DIR__."/includes/php/asisteBD.php");
			getEventosUser("paco");
		?>
	</body>

	</html>