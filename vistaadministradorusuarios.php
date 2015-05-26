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
  <!--Favicon-->
  <link rel="shortcut icon" href="includes/img/favicon.png" />
</head>
<body>
  <?php require(__DIR__.'/includes/php/header.php');?>
  <!--Inicio Contenido-->
  <div class="main">
    <div class="container">
      <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
          <li role="presentation"><a href="vistaadministrador.php">Administración Web</a></li>
          <li role="presentation"><a href="vistaadministradoreventos.php">Gestión de eventos</a></li>
          <li role="presentation" class="active"><a href="vistaadministradorusuarios.php">Gestión de usuarios</a></li>
        </ul>
      </div>
      <div class="container-fixed col-xs-8 col-sm-8 col-md-6">
        <!-- Contenido aqui -->
      </div>
      <div class="clearfix visible-xs-block visible-sm-block"></div>
      <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
      </div>
    </div>
  </div>
  <!--Fin Contenido-->
  <?php require(__DIR__.'/includes/php/footer.php');?>
  <script src="includes/js/jquery.min.js"></script>
  <script src="includes/js/bootstrap.js"></script>
</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>