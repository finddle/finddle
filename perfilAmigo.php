<!DOCTYPE html>

<html>

	<head>
		<title>Finddle</title>
		<meta charset="utf-8" />
		<!-- Latest compiled CSS -->
		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
		<!-- Optional theme -->
		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-theme.min.css">
		<!-- Personal CSS -->
		<link rel="stylesheet" type="text/css" href="includes/css/mycss.css">
		<link rel="stylesheet" type="text/css" href="includes/css/perfilUsuario.css">
		<!--Favicon-->
		<link rel="shortcut icon" href="includes/img/favicon.png" />
	</head>
	
	<body>
		<?php 
			require(__DIR__.'/includes/php/header.php');
		?>		
		
		<!--CONTENIDO-->
		<div class="main">
			<div class="container">
				<div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
					<div id="barra-lateral-izq">
						<?php
							require_once(__DIR__."/includes/php/usuariosBD.php");
							require_once(__DIR__."/includes/php/amigosBD.php");
							$amigo = $_GET['amigo'];
							$info = getInfoUser($amigo);				
							echo '<h2>'.$info["Nick"].'</h2>';
							if(isset($info["Avatar"]))
								echo "<img src=",$info["Avatar"]," /></br>";
							else
								echo "<img src='includes/img/usuario.png'/></br>";	
							require_once(__DIR__."/includes/php/peticionesBD.php");
							if(esAmigo($info["Nick"], $_SESSION['username']) == 0 or esAmigo($_SESSION['username'], $info["Nick"]) == 0){ //si no son amigos
								//el boton deberia hacer el action de enviarPeticion de amigosBD.php
								//Volveria a cargarse la misma pagina con el boton desactivado (o que al darle mostrase que está en proceso la peticion)
								echo "<p class=".'login'." ".'button'."> 
										<input type=".'submit'." value=".'Seguir'."> 
									  </p>";	
							}else{ //ya son amigos
								//abriria el php de mensajes
								echo "<p class=".'login'." ".'button'."> 
										<input type=".'submit'." value=".'Enviar'." ".'mensaje'."> 
									  </p>"; 	
							}
						?>
					</div>
				</div>
				
				<div class="container-fixed col-xs-8 col-sm-8 col-md-6">
					<div id="contenido">
						<?php 
							require_once(__DIR__."/includes/php/asisteBD.php");
							$eventos = getEventosUser($info["Nick"]);
							echo "<h2> Eventos a los que asiste ".$info["Nick"]."</h2>";
							if(isset($eventos)){
								foreach($eventos as $evento){
									echo "<h3>", $evento["Nombre"], "</h3>";
									echo '<p><a href ="infoEvento.php?evento='.$evento['IDEvento'].'"><img src ="'.$evento['Imagen'].'"/></a></p>';
									echo "<p>Nº Asistentes: ".countAsistentes($evento['IDEvento'])."</p><br>";
								}
							}else
								echo "<p> Este usuario no asiste a ningún evento. </p>";
						?>
					</div>
				</div>
			
		
		<!--SUS AMIGOS-->
				<div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
					<div id="barra-lateral-dcha">
						<?php 
							echo '<h2> Amigos </h2>';
							require_once(__DIR__."/includes/php/amigosBD.php");
							$amigos = getAmigos($info["Nick"]);
							if(isset($amigos)){
								foreach($amigos as $amigo){
									echo '<p><a href ="perfilAmigo.php?amigo='.$amigo['NickUsuario1'].'">'.$amigo['NickUsuario1']. '</a></p>';
								}
							}else
								echo "<p> Este usuario no tiene amigos :( </p>";
						?>
					</div>
				</div>
			</div>
		</div>
		
	<!--Fin Contenido-->
	  <?php 
		require(__DIR__.'/includes/php/footer.php');
	  ?>
	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	</body>

</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>