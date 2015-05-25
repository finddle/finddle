<!DOCTYPE html>
	<head>
		<title>Finddle</title>
		  <meta charset="utf-8" />
		  <!-- Latest compiled CSS -->
		  <link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
		  <!-- Optional theme -->
		  <link rel="stylesheet" type="text/css" href="includes/css/bootstrap-theme.min.css">
		  <!-- Personal CSS -->
		  <link rel="stylesheet" type="text/css" href="includes/css/mycss.css">
		  <link rel="stylesheet" type="text/css" href="includes/css/formularios.css">
		  <!--Favicon-->
		  <link rel="shortcut icon" href="includes/img/favicon.png" />
	</head>
	
	<body>
	
		<?php 
			require(__DIR__.'/includes/php/header.php');
		?>
		
		<span>
		<div class="container"><span>
		  <section><span>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
							<form name "form" method="POST" action="includes\php\b.php" \>
					
								<h1>Formulario de contacto</h1> 
                                <p> 
                                    <label> Nick </label>
                                    <input type="text" name="nombre" placeholder="Nombre" required/>
                                </p>
								
								<p>
									<label> Correo </label>
									<input type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="El correo ha de tener el siguiente formato: myemail@myemail.com" name="correo" placeholder="Correo" required//>
								</p>
								
								<p>
									<label> Mensaje </label>
									<input type="text" name="mensaje" placeholder="Mensaje" required/>
								</p>
								
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

	</body>
</html>