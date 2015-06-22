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
	<?php 
	require(__DIR__.'/includes/php/peticionesBD.php');
		if(isset($_POST['amigo'])) {
			$result = enviarPeticion($_SESSION['username'],$_POST["amigo"]);
		}
	?>
	<body>
		<?php 
			require(__DIR__.'/includes/php/header.php');
			require_once(__DIR__."/includes/php/asisteBD.php");
			require_once(__DIR__."/includes/php/usuariosBD.php");
			require_once(__DIR__."/includes/php/amigosBD.php");
			require_once(__DIR__."/includes/php/comprasBD.php");		

		?>			
		<!--CONTENIDO-->
		<div class="main">
			<div class="container">
				<div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
					<div id="barra-lateral-izq">
						<?php
							if(isset($_SESSION['username'])){
								$amigo = $_GET['amigo'];
								$info = getInfoUser($amigo);				
								echo '<h2>'.$info["Nick"].'</h2><div class="span-sub-tittle"></div>';
								if(isset($info["Avatar"]))
									echo "<div id='fotoPerfil'><img class='imgPerfil' src='".ROOT_DIR."/".$info["Avatar"]."'/></div>";
								else
									echo "<div id='fotoPerfil'><img class='imgPerfil' src='".ROOT_DIR."/includes/img/usuario.png'/></div>";	
									echo "<div class='span-sub-tittle'></div>";
									//si no son amigos
									if(esAmigo($info["Nick"], $_SESSION['username']) == 0 or esAmigo($_SESSION['username'], $info["Nick"]) == 0){ 
									
										// Si aun no le ha enviado la peticion de amistad
										if(comprobarPeticion($info["Nick"], $_SESSION['username']) == 0 or comprobarPeticion($_SESSION['username'], $info["Nick"]) == 0){ 
											?>
											<form method = "POST" action="/finddle/usuario/<?= $amigo?>" autocomplete="on">
												<input type="hidden" name="amigo" value="<?= $amigo?>"/>
												<p class="login button"> 
													<input type="submit" value="Seguir" /> 
												</p>	
											</form>
										<?php
										}
										else {
											// Si tiene la peticion de amistad pendiente
											?>
											<p class="login button"> 
												<input type="submit" disabled = 'disabled' value="Seguir"> 
											</p>
										<?php
										}
										
									//ya son amigos
								}else{
									echo '<a href="'.ROOT_DIR.'/nuevoMensaje.php?usuario='.$info["Nick"].'" class="btn btn-default">Enviar mensaje</a>';
								
								}
							}
						?>
					</div>
				</div>
				
				<div class="container-fixed col-xs-8 col-sm-8 col-md-6">
					<div id="contenido">
						<?php 
							if(isset($_SESSION['username'])){
								$eventos = getEventosUser($info["Nick"]);
								echo "<h2> Eventos de ".$info["Nick"]."</h2><div class='span-sub-tittle'></div>";
								echo "<div class='transEventos'>";
								if(isset($eventos)){
									foreach($eventos as $evento){
										echo "<h3>", $evento["Nombre"], "</h3>";
										echo '<p><a href ="'.ROOT_DIR.'/evento/'.$evento['IDEvento'].'"><img class="imgEventos" src ="'.ROOT_DIR.'/'.$evento['Imagen'].'"/></a></p>';
										echo "<p>Nº Asistentes: ".countAsistentes($evento['IDEvento'],$evento['Tipo'])."</p><div class='span-sub-tittle'></div>";
									}
								}else
									echo "<p> Este usuario no asiste a ningún evento. </p>";
								echo "</div>";
							}
							else 
								echo "<p>No eres un usuario logeado.</p>";
						?>
					</div>
				</div>	
		<!--SUS AMIGOS-->
				<div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
					<div id="barra-lateral-dcha">
						<?php 
							if(isset($_SESSION['username'])){
								echo '<h2> Amigos </h2>';
								echo '<div class="span-sub-tittle"></div>';
								echo '<div class="trans">';
								$amigos = getAmigos($info["Nick"]);
								if(isset($amigos)){
									foreach($amigos as $amigo){
										if($_SESSION['username'] == $amigo['NickUsuario1'])
											echo '<p><a href="'.ROOT_DIR.'/perfilUsuario.php">'.$amigo['NickUsuario1'].'</a></p>';
										else
											echo '<p><a href ="'.ROOT_DIR.'/usuario/'.$amigo['NickUsuario1'].'">'.$amigo['NickUsuario1']. '</a></p>';
									}
								}else
									echo "<p> Este usuario no tiene amigos</p>";
							}
						?>
					</div>
					</div>
				</div>
			</div>
		</div>	
	<!--Fin Contenido-->
	  <?php require(__DIR__.'/includes/php/footer.php'); ?>
	</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>