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
  <?php require(__DIR__.'/includes/php/header.php');?>

  <!--Inicio Contenido-->
  <div class="main">
    <div class="container">
      <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <?php 
				require_once(__DIR__."/includes/php/usuariosBD.php");
				$info = getInfoUser($_SESSION['username']);
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
      <div class="container-fixed col-xs-8 col-sm-8 col-md-6">
        <?php 
				require_once(__DIR__."/includes/php/asisteBD.php");
				$eventos = getEventosUser($_SESSION['username']);
				foreach($eventos as $evento){
					echo "<h3>", $evento["Nombre"], "</h3>";
					echo "<img src=",$evento["Imagen"]," /></br>";
					echo "<p>Nº Asistentes: ".countAsistentes($evento['IDEvento'])."</p><br>";
				}
			?>
      </div>
      <div class="clearfix visible-xs-block visible-sm-block">
      	<h2> Amigos </h2>
			<?php 
				require_once(__DIR__."/includes/php/amigosBD.php");
				$amigos = getAmigos($_SESSION['username']);
				foreach($amigos as $amigo){
					echo $amigo['NickUsuario1'], "<br>";
				}
			?>
      </div>
      <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
      </div>
    </div>
  </div>
  <!--Fin Contenido-->
  <?php require(__DIR__.'/includes/php/footer.php');?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>