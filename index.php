<?php require_once(__DIR__.'/includes/php/config.php');?>
<!DOCTYPE HTML>
<html>
	<head>
		 <meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/index.css">
    <script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
    <script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
	</head>
	<body>
    <?php require_once(__DIR__.'/includes/php/header.php');?>
  <div id="slides">
    <ul class="slides-container">
      <li><img src="includes/img/cine-slide.jpg" width="1680" height="1050"> 
          <div class="caption-wrapper">
              <div class="caption">
                <div class="span-tittle"></div>
                <h6>Cine</h6>
                <div class="span-sub-tittle"></div>
                <p>Encuentra los últimos estrenos de la cartelera</p>

              </div>
        </div>
        </li>
      <li><img src="includes/img/login.jpg" width="1680" height="1050"> 
          <div class="caption-wrapper">
              <div class="caption">
                <div class="span-tittle"></div>
                <h6>Conciertos</h6>
                <div class="span-sub-tittle"></div>
                <p>Revoluciona la forma de hacer tus planes</p>
              </div>
        </div>
        </li>
        <li><img src="includes/img/madrid-eventos.jpg" width="1680" height="1050"> 
          <div class="caption-wrapper">
              <div class="caption">
                <div class="span-tittle"></div>
                <h6>Eventos</h6>
                <div class="span-sub-tittle"></div>
                <p>Sé el primero en apuntarte a los eventos más exclusivos de tu ciudad</p>
              </div>
        </div>
        </li>
    </ul>
    <nav class="slides-navigation">
      <a href="#" class="next">Next</a>
      <a href="#" class="prev">Previous</a>
    </nav>
  </div>
  <script src="http://s.cdpn.io/17920/jquery.easing.1.3.js"></script>
  <script src="http://s.cdpn.io/17920/jquery.animate-enhanced.min.js"></script>  
  <script src="http://s.cdpn.io/17920/hammer.min.js"></script>   
  <script src="http://s.cdpn.io/17920/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
  <script src ="<?= ROOT_DIR?>/includes/js/index.js"></script>
	</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>