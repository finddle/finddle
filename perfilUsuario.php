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
				$eventos = getEventosUser("paco");
				foreach($eventos as $evento){
					echo "<h3>", $evento["Nombre"], "</h3>";
					echo "<img src=",$evento["Imagen"]," /></br>";
					echo "<p>Nº Asistentes: ".countAsistentes($evento['IDEvento'])."</p><br>";
				}
			?>
		</div>
		
		<div id="barra-lateral-izq">
			<?php 
				require_once(__DIR__."/includes/php/usuariosBD.php");
				$info = getInfoUser("paco");
				foreach($info as $i){
					if(isset($i["Avatar"]))
						echo "<img src=",$i["Avatar"]," /></br>";
					else
						echo "<a href='editPerfil.php' id='avatar'><img src='includes/img/usuario.png'/></a></br>";		
					echo "<h3>", $i["Nick"], "</h3></br>";
					echo "<p>", $i["Nombre"], "</p>";
					echo "<p>", $i["Apellidos"], "</p>";
					echo "<p>", $i["Edad"], "</p>";
				}
			?>
		</div>
		
		<div id="barra-lateral-dcha">
			<h2> Amigos </h2>
			<?php 
				require_once(__DIR__."/includes/php/amigosBD.php");
				$amigos = getAmigos("paco");
				foreach($amigos as $amigo){
					echo $amigo['NickUsuario1'], "<br>";
				}
			?>
		</div>
		
	</body>

</html>