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
	
	<?php 
		require(__DIR__.'/includes/php/usuarios.php');
		if(isset($_POST['formLogin'])) {
			$result = formLogin($_POST);
		}
	?>
	
	<body>
	
		<?php 
			require(__DIR__.'/includes/php/header.php');  
			require(__DIR__.'/includes/php/eventosBD.php');
			require(__DIR__.'/includes/php/asisteBD.php');
		?>

	  <!--Inicio Contenido-->
	  <div class="main">
		<div class="container">
		  
		  <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
			<!-- Barra lateral izquierda -->
		  </div>
		  
		  
		  <div class="container-fixed col-xs-8 col-sm-8 col-md-6">
			 <?php 
				$evento = $_GET['evento'];
				$info = getInfoEvento($evento);
				$nAsistentes = countAsistentes($info['ID']);
				echo '<div class="eventosElem">';
				echo '<h2>'.$info['Nombre'].'</h2>';
				echo '<p>Fecha: '.$info['Fecha'].'</p>';
				echo '<p>Descripcion: '.$info['Descripcion'].'</p>';
				echo '<p>Plazas: '.$info['PlazasDisponibles'].'</p>';
				echo '<p>Asistentes: '.$nAsistentes.'</p>';
				echo '<p><img src ="'.$info['Imagen'].'"/></p>';
				if(isset($_SESSION['username'])){
					if($nAsistentes < $info['PlazasDisponibles']){
						if($info['Tipo']==0){
							echo '<p><a href="comprarEntradaFiesta.php?evento='.$info['ID'].'">Comprar Entrada</a></p>';	
						}else {
							echo '<p><a href="comprarEntradaCine.php?evento='.$info['ID'].'">Comprar Entrada</a></p>';
						}
						
					}else{
						echo '<p>Lo sentimos, las entradas se han agotado.</p>';
					}
				}else{
					echo '<p>!Inicia sesion para comprar tu entrada a este evento!</p>';
				}
				echo '</div>';
			 ?>
		  </div>

		  
		  <div class="clearfix visible-xs-block visible-sm-block"></div>
		  <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3"></div>
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

<?php require(__DIR__.'/includes/php/cleanup.php');?>