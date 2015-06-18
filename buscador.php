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
  <script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
  <script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
</head>
<?php 	
	require(__DIR__.'/includes/php/usuariosBD.php'); 
	require(__DIR__.'/includes/php/eventosBD.php');
	if(isset($_POST['formBuscador'])) {
	$users = usersCadena($_POST);
	$eventos = eventosCadena($_POST);
	}
	
?>
<body>
<?php 
    require(__DIR__.'/includes/php/header.php');  
?>
  <!--Inicio Contenido-->
  <div class="main">
    <div class="container">
      <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <!-- Barra lateral izquierda -->
      </div>
      <div class="container-fixed col-xs-8 col-sm-8 col-md-6">
     
		<form  method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		<input type=text id="cuadro" name="cuadro" value="" size="50" />
		<input type="hidden" name="formBuscador"/>
        <p class="login button"> 
        <input type="submit" value="Finalizar" /> 
		</form>	
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