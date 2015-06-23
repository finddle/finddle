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
	<body>
		<?php 
			require(__DIR__.'/includes/php/header.php');  
		?>
	 <div class="main">
     <div class="container">
	  <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
          <li role="presentation"><a href="<?= ROOT_DIR?>/mensajes/recibidos">Bandeja de entrada</a></li>
          <li role="presentation"><a href="<?= ROOT_DIR?>/mensajes/enviados">Mensajes enviados</a></li>
        </ul>
      </div>
	  <div id="contenidoPrincipal" class ="container-fixed col-xs-8 col-sm-8 col-md-6">
	 
	  <?php
	  require_once __DIR__.'/includes/php/mensajes.php';
		$mensaje = $_GET['mensaje'];
		$result = abrirMensajeEnviado($mensaje);
	  echo '<div id="comentario">'. '<p class="mHeader"><strong>De:</strong> Yo <strong>Titulo: </strong>'.$result['Titulo'];
	  echo '<strong> Fecha: </strong>'.$result['Fecha'].'</p> ';
	  echo '<p><strong>Contenido: </strong></p><p>'.$result['TextoMensaje'].'</p></div>';
	  
	  ?>
		
		<?php 
			require(__DIR__.'/includes/php/footer.php');
		?>
		</div>
	  <div class="clearfix visible-xs-block visible-sm-block"></div>
      <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
      </div>
		 </div>
	  </div>
	</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>