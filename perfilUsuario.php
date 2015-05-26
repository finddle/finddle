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

	  <!--Inicio Contenido-->
	  <div class="main">
		<div class="container">
		  <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
			
			<!--INFO USUARIO-->
			<div id="barra-lateral-izq">
				<?php 
					require_once(__DIR__."/includes/php/usuariosBD.php");
					$info = getInfoUser($_SESSION['username']);
					
					if(isset($info["Avatar"]))
						echo "<img src=",$info["Avatar"]," /></br>";
					else
						echo "<a href='editPerfil.php' id='avatar'><img src='includes/img/usuario.png'/></a></br>";		
					echo "<h3>", $info["Nick"], "</h3></br>";
					echo "<p>", $info["Nombre"], "</p>";
					echo "<p>", $info["Apellidos"], "</p>";
					echo "<p>", $info["Edad"], "</p>";
				?>
			</div>
		  </div>
		  
		  <!-- EVENTOS A LOS QUE ASISTE -->
		  <div class="container-fixed col-xs-8 col-sm-8 col-md-6">
			<div id="contenido">
				<?php 
					require_once(__DIR__."/includes/php/asisteBD.php");
					$eventos = getEventosUser($_SESSION['username']);
					foreach($eventos as $evento){
						echo "<h3>", $evento["Nombre"], "</h3>";
						echo '<p><a href ="infoEvento.php?evento='.$evento['IDEvento'].'"><img src ="'.$evento['Imagen'].'"/></a></p>';
						echo "<p>Nº Asistentes: ".countAsistentes($evento['IDEvento'])."</p><br>";
					}
				?>
			</div>
		  </div>
		 
		  
		  <!-- AMIGOS -->
		  <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
			  <div id="barra-lateral-dcha">
					<h2> Amigos </h2>
					<?php 
						require_once(__DIR__."/includes/php/amigosBD.php");
						$amigos = getAmigos($_SESSION['username']);
						foreach($amigos as $amigo){
							echo '<p><a href ="perfilAmigo.php?amigo='.$amigo['NickUsuario1'].'">'.$amigo['NickUsuario1']. '</a></p>';
						}
					?>
				</div>
		  </div>
		  
		</div>
	  </div>
	  
	  <!--Fin Contenido-->
	  <?php 
		require(__DIR__.'/includes/php/footer.php');
	  ?>
	  
		<script src="includes/js/jquery.min.js"></script>
  		<script src="includes/js/bootstrap.js"></script>
	</body>
</html>

<?php 
	require(__DIR__.'/includes/php/cleanup.php');
?>