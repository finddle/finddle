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
		require(__DIR__.'/includes/php/header.php');  
		require(__DIR__.'/includes/php/eventosBD.php');
		require(__DIR__.'/includes/php/comentariosBD.php');
		require(__DIR__.'/includes/php/asisteBD.php');
	
		if(isset($_POST['comentario'])) {
        	$idEvent=$_POST['idEvento'];
			header("Location: /finddle/infoEvento.php?evento=".$idEvent);
        	$usr=$_SESSION['username'];
        	$com=$_POST['comentario'];
        	commentEvent($usr, $idEvent, $com);
		}
	?>
	
	
	<body>

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
							echo '<p><a class="btn btn-primary" href="comprarEntradaFiesta.php?evento='.$info['ID'].'">Comprar Entrada</a></p>';	
						}else {
							echo '<p><a class="btn btn-primary" href="comprarEntradaCine.php?evento='.$info['ID'].'">Comprar Entrada</a></p>';
						}
						
					}else{
						echo '<p>Lo sentimos, las entradas se han agotado.</p>';
					}
					?>
					<textarea name="comentario" cols="74" rows="4" autofocus form="usrform" placeholder='Escribe aquí tu comentario!' required></textarea>
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="usrform">
  						<input type="hidden" name="idEvento" value="<?php echo $evento;?>">
  						<input type="submit"> 
					</form>
					<?php
	
				}else{
					echo '<div class="alert alert-info" role="alert">
					<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
 					Inicia sesion para comprar tu entrada a este evento</div> ';
				}
				
				$coment = getComentarios($evento);
				if(isset($coment)){
					foreach ($coment as $comentario) {
						echo '<div id="comentario">';
						
						echo '<div id="nick">',$comentario["NickUsuario"],"   ", "</div>";
						echo '<div id="texto">',$comentario["Texto"], "</div>";
						
						echo "</div>";
					}
				}
				else
					echo '<p> ¡Sé el primero en dejar un comentario!';
				?>
				</div>				
			</div>
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












