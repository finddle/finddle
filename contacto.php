<?php require_once(__DIR__.'/includes/php/config.php');?>
<!DOCTYPE html>
	<head>
		<title>Finddle</title>
		<meta charset="UTF-8">
		  <!-- Latest compiled CSS -->
		  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/bootstrap.css">
		  <!-- Optional theme -->
		  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/bootstrap-theme.min.css">
		  <!-- Personal CSS -->
		  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/mycss.css">
		  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/formularios.css">
		  <!--Favicon-->
		  <link rel="shortcut icon" href="<?= ROOT_DIR?>/includes/img/favicon.png" />
		  <script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
			<script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
	</head>
	<?php 
		require(__DIR__.'/includes/php/mensajes.php');
		if(isset($_POST['menContacto'])) {
			$result = procesarFormContacto($_POST);
		}
	?>
	<body>
		<?php require(__DIR__.'/includes/php/header.php');?>
		<span>
		<div class="container"><div class="span-content"></div>
		  <section>			
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
							<form name "form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" \>
					
								<h1>Formulario de contacto</h1>
								
								<?php
									if(isset($result)){
										echo '<ul>';
										if($result = "El mensaje se ha enviado con éxito"){
                                            echo '<li class = "resultOk">'.$result.'</li>';
                                        }
										else{
										echo '<li class = "resultError">'.$result.'</li>';
										}
										echo '</ul>';
									}
								?>
								<p>
									<label> Correo </label>
									<input type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="El correo ha de tener el siguiente formato: myemail@myemail.com" name="correo" placeholder="Correo" required//>
								</p>
								
								<p>
									<label> Mensaje </label>
								<div id = "Textarea"><textarea rows="4" cols="52" input id="mensaje" name="mensaje" required="required" type="text"/></textarea></div>
								</p>
								<input type="hidden" name="menContacto"/>
								<p class="login button">
									<input type="submit" value="Enviar" /> 
								</p>
								
							</form>	
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php require(__DIR__.'/includes/php/footer.php');?>
	</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>