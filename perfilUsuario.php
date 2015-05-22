<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<title> Finddle </title>
		<link rel="stylesheet" href="includes/css/perfilUsuario.css" type="text/css">
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
		
		<h1> Perfil del usuario </h1>
		</div>
		
		<div id="contenido">
			<?php 
				require_once(__DIR__."/includes/php/asisteBD.php");
				getEventosUser("paco");
			?>
		</div>
		
		<div id="barra-lateral-izq">
			<?php 
				require_once(__DIR__."/includes/php/usuariosBD.php");
				getInfoUser("paco");
			?>
		</div>
		
		<div id="barra-lateral-dcha">
			<h2> Amigos </h2>
			<?php 
				require_once(__DIR__."/includes/php/amigosBD.php");
				getAmigos("paco");
			?>
		</div>
		
	</body>

</html>