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
		<link rel="stylesheet" type="text/css" href="includes/css/formularios.css" />
	
	</head>
	
	<?php 
		require(__DIR__.'/includes/php/mensajes.php');
		if(isset($_POST['menUser'])) {
			$result = procesarFormUser($_POST);
		}
	?>
	<body>

		<?php 
			require(__DIR__.'/includes/php/header.php');  
		?>
		
		<div class="container">
		  <section>			
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
							<form name "form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" \>
					
								<h1>Enviar mensaje</h1>
								<p>
									<label> Titulo </label>
									<input type="text" name="titulo" placeholder="Titulo" required//>
								</p>
								<p>
									<label> Destinatario </label>
									<input type="text" name="destinatario" placeholder="Destinatario" required/>
								</p>
								<p>
									<label> Mensaje </label>
									<input type="text" name="mensaje" placeholder="Mensaje" required/>
								</p>
								<input type="hidden" name="menUser"/>
								<p class="login button">
									<input type="submit" value="Enviar" /> 
								</p>
								
							</form>	
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php 
			require(__DIR__.'/includes/php/footer.php');
		?>
		<script src="includes/js/jquery.min.js"></script>
  		<script src="includes/js/bootstrap.js"></script>
	</body>

	</html>