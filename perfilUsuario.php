<?php require_once(__DIR__.'/includes/php/config.php');?>
<!DOCTYPE html>
<html>
	<head>
	  <title>Finddle</title>
	  <meta charset="utf-8" />
		<!-- Latest compiled CSS -->
		<link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/bootstrap.css">
		<!-- Optional theme -->
		<link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/bootstrap-theme.min.css">
		<!-- Personal CSS -->
		<link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/mycss.css">
		<!--Favicon-->
		<link rel="shortcut icon" href="<?= ROOT_DIR?>/includes/img/favicon.png" />
		<link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/perfilUsuario.css">
		<script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
		<script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
	</head>
	<body>
		<?php 
			require(__DIR__.'/includes/php/header.php');
			require_once(__DIR__."/includes/php/asisteBD.php"); 
			require_once(__DIR__."/includes/php/comprasBD.php");
		?>
	  <!--Inicio Contenido-->
	  <div class="main">
		<div class="container">
		  <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">	
			<!--INFO USUARIO-->
			<div id="barra-lateral-izq">
				<?php 
					if(isset($_SESSION['username'])){
						require_once(__DIR__."/includes/php/usuariosBD.php");
						$info = getInfoUser($_SESSION['username']);
						
						if(isset($info["Avatar"]))
							echo "<div id='fotoPerfil'><a href='editPerfil.php' id='avatar'><img class='imgPerfil' src=",$info["Avatar"]," /></a></div>";
						else
							echo "<div id='fotoPerfil'><a href='editPerfil.php' id='avatar'><img class='imgPerfil' src='includes/img/usuario.png'/></a></div>";
						echo "<div class='span-sub-tittle'></div>";	
						echo "<h2>", $info["Nick"], "</h2><div class='span-sub-tittle'></div>";
						echo "<p>", $info["Nombre"], "</p>";
						echo "<p>", $info["Apellidos"], "</p>";
						echo "<p>", $info["Edad"], "</p>";
						echo '<a href="'.ROOT_DIR.'/mensajesBandeja.php" class="btn btn-default">Mensajes</a>';
					}
				?>
			</div>
		  </div>
		  <!-- EVENTOS A LOS QUE ASISTE -->
		  <div class="container-fixed col-xs-8 col-sm-8 col-md-6">
			<div id="contenido">
			<div class="transEventos">
				<?php
					if(isset($_SESSION['username'])){
						$eventos = getEventosUser($_SESSION['username']);
						if(isset($eventos)){
							foreach($eventos as $evento){
								echo "<h3>", $evento["Nombre"], "</h3>";
								echo '<p><a href ="'.ROOT_DIR.'/evento/'.$evento['IDEvento'].'"><img class="imgEventos" src ="'.$evento['Imagen'].'"/></a></p>';
								echo "<p>Nº Asistentes: ".countAsistentes($evento['IDEvento'],$evento['Tipo'])."</p><div class='span-sub-tittle'></div>";
							}
						}else
							echo "<p> Este usuario no asiste a ning?n evento. </p>";
					}
					else
						echo "<p>Debes ser un usuario logeado.</p>";
				?>
			</div>
			</div>
		  </div>
		  <!-- AMIGOS -->
		  <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
			  <div id="barra-lateral-dcha">
					<?php 
						if(isset($_SESSION['username'])){
							echo '<h2> Amigos </h2>';
							echo '<div class="span-sub-tittle"></div>';
							echo '<div class="trans">';
					
							require_once(__DIR__."/includes/php/amigosBD.php");
							$amigos = getAmigos($_SESSION['username']);
							
							if(isset($amigos)){
								foreach($amigos as $amigo){
									echo '<p><a href ="'.ROOT_DIR.'/usuario/'.$amigo['NickUsuario1'].'">'.$amigo['NickUsuario1']. '</a></p>';
								}
							}else
								echo "<p> Este usuario no tiene amigos :( </p>";
						}
					?>
					</div>
			</div>
		  </div>
		</div>
	  </div>
	  <?php require(__DIR__.'/includes/php/footer.php');?>
	</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>