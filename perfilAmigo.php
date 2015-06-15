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
							$amigo = $_GET['amigo'];
							$info = getInfoUser($amigo);				
							echo '<h2>'.$info["Nick"].'</h2>';
							if(isset($info["Avatar"]))
								echo "<img src='".ROOT_DIR."/".$info["Avatar"]."'/></br>";
							else
								echo "<img src='".ROOT_DIR."/includes/img/usuario.png'/></br>";	
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
								//abriria el php de mensajes
							}else{ ?>
								<p class="login button"> 
									<input type="submit" value="Enviar mensaje"> 
								</p> 
							<?php
							}
						?>
					</div>
				</div>
				<div class="container-fixed col-xs-8 col-sm-8 col-md-6">
					<div id="contenido">
						<?php 
		
							$eventos = getEventosUser($info["Nick"]);
							echo "<h2> Eventos a los que asiste ".$info["Nick"]."</h2>";
							if(isset($eventos)){
								foreach($eventos as $evento){
									echo "<h3>", $evento["Nombre"], "</h3>";
									echo '<p><a href ="'.ROOT_DIR.'/evento/'.$evento['IDEvento'].'"><img src ="'.ROOT_DIR.'/'.$evento['Imagen'].'"/></a></p>';
									echo "<p>Nº Asistentes: ".countAsistentes($evento['IDEvento'],$evento['Tipo'])."</p><br>";
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
							$amigos = getAmigos($info["Nick"]);
							if(isset($amigos)){
								foreach($amigos as $amigo){
									if($_SESSION['username'] == $amigo['NickUsuario1'])
										echo '<p><a href="'.ROOT_DIR.'/perfilUsuario.php">'.$amigo['NickUsuario1'].'</a></p>';
									else
										echo '<p><a href ="'.ROOT_DIR.'/usuario/'.$amigo['NickUsuario1'].'">'.$amigo['NickUsuario1']. '</a></p>';
								}
							}else
								echo "<p> Este usuario no tiene amigos :( </p>";
						?>
					</div>
				</div>
			</div>
		</div>	
	<!--Fin Contenido-->
	  <?php require(__DIR__.'/includes/php/footer.php'); ?>
	</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>