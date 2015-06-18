<!DOCTYPE html>
<html>

    <head>
        <title>Finddle</title>
        <meta charset="utf-8" />
		<link rel="shortcut icon" href="includes/img/favicon1.png" />
		 <!-- Latest compiled CSS -->
		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
		<!-- Optional theme -->
		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-theme.min.css">
		<!-- Personal CSS -->
		<link rel="stylesheet" type="text/css" href="includes/css/mycss.css">
		
    </head>
	
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
		$result = abrirMensajeEnviado($mensaje);
	  echo '<div id="comentario">', 'Para: ',$result['NickReceptor'];
	  echo '<div class="span-mensaje"></div>';
	  echo 'Titulo: ', $result['Titulo'];
	  echo '<div class="span-sub-tittle"></div>';
	  echo $result['TextoMensaje'];
	  echo '</div>';
	  
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