<?php require_once(__DIR__.'/includes/php/config.php');?>
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
		<link rel="stylesheet" type="text/css" href="includes/css/formularios.css">
		<script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
    	<script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
	</head>
		<?php 
		require(__DIR__.'/includes/php/mensajes.php');
		if(isset($_POST['formMensaje'])) {
			$result = procesarFormUser($_POST,$_SESSION['username']);
		}
	?>
	<body>
	<?php 
    require(__DIR__.'/includes/php/header.php');  
	?>
	
	<div class="main">
    <div class="container">
      <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
          <li role="presentation" class="active"><a href="nuevoMensaje.php">Nuevo Mensaje</a></li>
          <li role="presentation"><a href="mensajesBandeja.php">Bandeja de entrada</a></li>
          <li role="presentation"><a href="mensajesEnviados.php">Mensajes enviados</a></li>
        </ul>
      </div>
	  <div class="container-fixed col-xs-4 col-sm-4 col-md-9 ">
		 
		  <section>	
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
					<?php
						if(isset($_SESSION['username'])){
					?>
                        <div id="login" class="animate form">
                            <form  method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
								<?php 
                                    if(isset($result)){
                                        echo '<ul>';
										if($result == "El mensaje se ha enviado con éxito."){
                                            echo '<li class = "resultOk">'.$result.'</li>';
                                        }
										else{
											echo '<li class = "resultError">'.$result.'</li>';
										}
										echo '</ul>';
                                    }
                                ?>								
                                <p> 
								<?php
									if(isset($_GET['usuario'])){
										$usuario = $_GET['usuario'];
										echo '<label> Destinatario </label>';
										echo '<input id="destinatario" name="destinatario" value ="'.$usuario.'" required="required" type="text" placeholder="addressee"/>';
									}
									else{
										echo '<label> Destinatario </label>';
										echo '<input id="destinatario" name="destinatario" required="required" type="text" placeholder="addressee"/>';
									}
								?> 
                                </p>
                                <p> 
                                    <label> Titulo </label>
                                    <input id="titulo" name="titulo" required="required" type="text" placeholder="tittle" /> 
                                </p>
									 <label> Mensaje </label>
								<div id = "Textarea">
								<textarea rows="4" cols="52" input id="mensaje" name="mensaje" required="required" type="text"/></textarea></div>
								<input type="hidden" name="formMensaje"/>
                                <p class="login button"> 
                                    <input type="submit" value="Enviar" /> 
								</p>
                            </form>
                        </div>
					<?php
							}else
								echo "<p>No eres un usuario logeado</p>";
						?>
            </section>
			</div>
		</div>
		</div>
		</div>
	   <?php require(__DIR__.'/includes/php/footer.php');?>
  
</body>
</html>
<?php require_once(__DIR__.'/includes/php/cleanup.php');?>