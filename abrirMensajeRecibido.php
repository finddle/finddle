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
		require(__DIR__.'/includes/php/mensajes.php');
		if(isset($_POST['formRespuesta'])) {
		print_r($_POST);
		$respuesta = responderFormMensaje($_POST);
		}
	?>
	
	<?php
		
	?>
	<body>
		<?php 
			require(__DIR__.'/includes/php/header.php');  
		?>
	 <div class="main">
     <div class="container">
	  <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
          <li role="presentation"><a href="nuevoMensaje.php">Nuevo Mensaje</a></li>
          <li role="presentation"><a href="mensajesBandeja.php">Bandeja de entrada</a></li>
          <li role="presentation"><a href="mensajesEnviados.php">Mensajes enviados</a></li>
        </ul>
      </div>
	  <div class ="container-fixed col-xs-8 col-sm-8 col-md-6">
	 
	  <?php
		$mensaje = $_GET['mensaje'];
		modificarMensajeLeido($mensaje);
		$result = abrirMensaje($mensaje);
	  echo '<div id="comentario">', 'De: ',$result['NickEmisor'];
	  echo '<div class="span-mensaje"></div>';
	  echo 'Titulo: ', $result['Titulo'];
	  echo '<div class="span-sub-tittle"></div>';
	  echo $result['TextoMensaje'];
	  echo '</div>';
	  
	  ?>
	  <form  method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		  <div class="span-sub-tittle"></div>
		  <input type="text" name="titulo" placeholder='Titulo' required>
		  <div class ="span-mensaje"></div>
		  <textarea name="mensaje" cols="74" rows="4" autofocus placeholder='Respuesta' required></textarea>
		  <input type="hidden" name="formRespuesta"/>
		  <?php echo '<input type="hidden" name="emisor" value="'.$result['NickEmisor'].'"/> '?>
		  <input type="submit"/> 
	  </form>
		
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