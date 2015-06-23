<?php require_once(__DIR__.'/includes/php/config.php');?>
<!DOCTYPE html>
<html>
  <head>
    <title>Finddle</title>
    <meta charset="UTF-8">
    <!-- Latest compiled CSS -->
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/bootstrap.css">
    <!-- Optional theme -->
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/bootstrap-theme.min.css">
    <!-- Personal CSS -->
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/mycss.css">
    <!--Favicon-->
    <link rel="shortcut icon" href="<?= ROOT_DIR?>/includes/img/favicon.png" />
    <script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
    <script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
</head>
<body>
  <?php require(__DIR__.'/includes/php/header.php');?>
  <!--Inicio Contenido-->
  <div class="main">
    <div class="container">
      <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
          <li role="presentation"class="active"><a href="<?= ROOT_DIR?>/promotor">Ver eventos propios</a></li>
          <li role="presentation"><a href="<?= ROOT_DIR?>/evento/crear">Añadir eventos</a></li>
        </ul>
      </div>
      <div class="container-fixed col-xs-8 col-sm-8 col-md-6">
		  <div id="contenido">
			  <div class="transEventos">
				<?php
            if(isset($_SESSION['username']) && $_SESSION['rol']=="promotor"){
						  require_once(__DIR__."/includes/php/eventosBD.php");
							$eventos = getEventosPromotor($_SESSION['username']);
							if(isset($eventos)){
								foreach($eventos as $evento){
									echo "<h2>", $evento["Nombre"], "</h2>";
									echo '<p><a href ="'.ROOT_DIR.'/evento/'.$evento['ID'].'"><img class="imgEventos" src ="'.$evento['Imagen'].'"/></a></p>';
								
								}
							}else
								echo "<p> Este promotor no tiene ningún evento. </p>";
             }else
                  echo "<h1>No tienes permiso para acceder a esta pagina</h1>";
						?>
			  </div>
		  </div>
	  </div>
      <div class="clearfix visible-xs-block visible-sm-block"></div>
      <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
      </div>
    </div>
  </div>
  <!--Fin Contenido-->
  <?php require(__DIR__.'/includes/php/footer.php');?>
</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>