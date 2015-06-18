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
		
    </head>
	<body>
		<?php 
			
			require(__DIR__.'/includes/php/usuariosBD.php'); 
			require(__DIR__.'/includes/php/eventosBD.php');
			if(isset($_POST['formBuscador'])) {
			$users = usersCadena($_POST);
			$eventos = eventosCadena($_POST);
			}
			
		?>
		<form  method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		<input type=text id="cuadro" name="cuadro" value="" size="50" />
		<input type="hidden" name="formBuscador"/>
        <p class="login button"> 
        <input type="submit" value="Finalizar" /> 
		</form>
		
		
	</body>

</html>