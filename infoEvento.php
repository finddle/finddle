<?php
require_once(__DIR__.'/includes/php/config.php');
?>
<!DOCTYPE HTML>
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
	  <link rel="shortcut icon" href="<?= ROOT_DIR?>/includes/img/icon.png" />
	  <script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
      <script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
	</head>
	<?php
		
		require(__DIR__.'/includes/php/comentarios.php');
		
		if(isset($_POST['comentario'])) {
        	$idEvent=$_POST['idEvento'];
        	$usr=$_SESSION['username'];
        	$com=$_POST['comentario'];
        	$result = comprobarComentario($usr, $idEvent, $com);

        }
	?>
	<body>
	<?php
	
	require(__DIR__.'/includes/php/header.php');  
	require(__DIR__.'/includes/php/eventosBD.php');
	require(__DIR__.'/includes/php/comprasBD.php');
	require(__DIR__.'/includes/php/asisteBD.php');
	?>
	  <div class="main">
		<div class="container">
		    <div id="contenidoPrincipal" class="container col-xs-8 col-sm-8 col-md-8">

			 <?php 
				$evento = $_GET['evento'];
				$info = getInfoEvento($evento);
				$nAsistentes = countAsistentes($info['ID'], $info['Tipo']);
				echo '<div class="eventosElem">';
				echo '<h2>'.$info['Nombre'].'</h2>';
				echo '<p>Fecha: '.$info['Fecha'].'</p>';
				echo '<p>Descripcion: '.$info['Descripcion'].'</p>';
				echo '<p>Plazas: '.$info['PlazasDisponibles'].'</p>';
				echo '<p>Asistentes: '.$nAsistentes.'</p>';
				echo '<div class="thumbnail"><img data-holder-rendered="true" src ="'.ROOT_DIR.'/'.$info['Imagen'].'"/></div></div>';
				if(isset($_SESSION['username'])){
					if($nAsistentes < $info['PlazasDisponibles']){
						if($info['Tipo']==0){
							echo '<p><a class="btn btn-primary" href="'.ROOT_DIR.'/fiesta/comprar/'.$info['ID'].'">Comprar Entrada</a></p>';	
						}else {
							echo '<p><a class="btn btn-primary" href="'.ROOT_DIR.'/cine/comprar/'.$info['ID'].'">Comprar Entrada</a></p>';
						}
						$coment = getComentarios($evento);
						if(isset($coment)){
							foreach ($coment as $comentario) {
								echo '<div id="comentario" >';
								if($_SESSION['username'] == $comentario['NickUsuario']){
									echo '<p><a href ="'.ROOT_DIR.'/usuarios/perfil">'.$comentario['NickUsuario']. '</a></p>';
								}else
									echo '<p><a href ="'.ROOT_DIR.'/usuario/'.$comentario['NickUsuario'].'">'.$comentario['NickUsuario']. '</a></p>';
								echo '<p>',$comentario["Texto"], "</p>";

								if ($comentario["NickUsuario"] == $_SESSION['username']) 
									echo '<div id="papelera"> <a href="#" class="comment" id="comment_'.$comentario["ID"].'">Borrar <img src="'.ROOT_DIR.'/includes/img/borrar.png" height="14" width="14"></a></div>';
								echo "</div>";
							}
						}
						else
							echo '<p> ¡Sé el primero en dejar un comentario! </p>';
					}else{
						echo '<p>Lo sentimos, las entradas se han agotado.</p>';
					}
					?>
					</br>
					<textarea name="comentario" cols="74" rows="4" autofocus form="usrform" placeholder='Escribe aqui tu comentario!' required></textarea>
					<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="usrform">
  						<input type="hidden" name="idEvento" value="<?php echo $evento;?>">
  						<input type="submit"> 
					</form>
					<?php
	

                        if(isset($result)){
                           echo '<ul>';
                           foreach($result as $error){
                             echo '<li class = "resultError">'.$error.'</li>';
                           }
                           echo '</ul>';
                        }
                                



				}else{
					echo '<div class="alert alert-info" role="alert">
					<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
 					Inicia sesion para comprar tu entrada,poder comentar y ver los asistentes de este evento</div> ';
				}
				
				
				?>
				</div>	

		  
		  <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-4">
				<?php
				if(isset($_SESSION['username'])){
					$asistentes = getUsersEvento($evento);
					echo "<h3> Tambien asistiran...</h2>";
					if(isset($asistentes)){
						foreach ($asistentes as $asistente) {
							if(isset($asistente["Avatar"])){
								if($_SESSION['username'] != $asistente['Nick'])
									echo '<div id="fotoAsistente"><a href ="'.ROOT_DIR.'/usuario/'.$asistente['Nick'].'"><img class="imgAsistentes" src="'.ROOT_DIR.'/'.$asistente['Avatar'].'"></a></div>';
							
							}else{
								if($_SESSION['username'] != $asistente['Nick'])
									echo '<div id="fotoAsistente"><a href ="'.ROOT_DIR.'/usuario/'.$asistente['Nick'].'"><img class="imgAsistentes" src="'.ROOT_DIR.'/includes/img/usuario.png"/></a></div>';
							}
						}
					}
					else
						echo '<p> ¡Sé el primero en asistir al evento! </p>';
				}
				?>
		  </div>
	  </div	>
	 </div>
		<?php require(__DIR__.'/includes/php/footer.php');?>

		<script type="text/javascript">
		  

		    $('.comment').click(function(){
		      var id = $(this).attr("id").substring("comment_".length);
		      var divcomment = $(this);
		     $.post(root_app+"/includes/php/borrarComentario.php", 
		      {
		        ID : id,
		      },
		      function(data) {
		      	console.log(data);
		        if(data == true){
		          divcomment.parent().parent().remove();
		        }else{
		          alert("Ha habido un error al borrar su comentario.");
		        }
		      }); 

				   

				  });

		  </script>
	</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>