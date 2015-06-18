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
        <!-- Barra lateral izquierda -->
      </div>
      <div class="container-fixed col-xs-8 col-sm-8 col-md-6">
        <div id="alCenter">
        <p><img src = "<?= ROOT_DIR?>/includes/img/logofinddle.png"</p>
        <h3> Sobre nosotros </h3>
        </div>
        <div id="abCenter">
        <p>¡Los mejores planes con quien tu quieras!</p>
        <p>En Finddle podrás encontrar fácilmente los mejores eventos(películas, fiestas, conciertos,...) que tendrán lugar,
         ver los asistentes a dichos eventos y comentar en ellos para conocer gente que también asista o quedar 
         para ir con tus amigos.</p>
        <p>También disponemos de un sistema para comprar entrada para tí y tus amigos(aunque no tengan cuenta 
          en Finddle). Se podrá seguir a los usuarios, ver los eventos a los que asisten y mantener conversaciones 
          de mensajes privadas con ellos.</p>
        <p>Además, ofrecemos a promotores de eventos la opción de registrarse en nuestra página y que puedan publicar 
          eventos y administrarlos(deberán contactar con un administrador para que reciban este rol).</p>
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