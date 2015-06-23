<?php require_once(__DIR__.'/includes/php/config.php');?>
<!DOCTYPE html>
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
  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/formularios.css">
  <!--Favicon-->
  <link rel="shortcut icon" href="<?= ROOT_DIR?>/includes/img/favicon.png" />
  <script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
  <script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
</head>
<?php 
    require(__DIR__.'/includes/php/usuarios.php');
    if(isset($_POST['formRegistro'])) {
        $result = comprobarFormulario($_POST);
    }
?>
<body>
<?php 
    require(__DIR__.'/includes/php/header.php');  
?>
  <!--Inicio Contenido-->
  <div class="main">
    <div class="container">
      <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <!-- Barra lateral izquierda -->
      </div>
      <div class="container-fixed col-xs-8 col-sm-8 col-md-6">
		<section>				
		<div id="container_demo" >
		    <a class="hiddenanchor" id="toregister"></a>
		    <a class="hiddenanchor" id="tologin"></a>
		    <div id="wrapper">
		        <div id="login" class="animate form">
		            <form  method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		                <h1>Formulario de Registro</h1>
						<?php 
		                    if(isset($result)){
		                        echo '<ul>';
		                        foreach($result as $error){
								if($error == "Usuario registrado con éxito"){
									echo '<li class = "resultOk">'.$error.'</li>';
								} else {
		                            echo '<li class = "resultError">'.$error.'</li>';
		                        }
								}
		                        echo '</ul>';
		                    }
		                ?>								
		                <p> 
		                    <label> Nick </label><img id="imgErrN" src="includes/img/no.png"/>
		                    <input id="nick" name="nick" required="required" type="text" placeholder="username"/>
		                </p>
		                <p> 
		                    <label> Contraseña </label>
		                    <input id="contrasena" name="contrasena" required="required" type="password" placeholder="password" /> 
		                </p>
						 <p> 
		                    <label> E-mail </label>
		                    <input id="correo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="El correo ha de tener el siguiente formato: myemail@myemail.com" name="correo" required="required" type="text" placeholder="e-mail" /> 
		                </p>
						 <p> 
		                    <label> Nombre </label>
		                    <input id="nombre" pattern="[a-zA-Z ]+" title = "No introduzca elementos númericos" name="nombre" required="required" type="text" placeholder="name" /> 
		                </p>
						 <p> 
		                    <label> Apellidos </label>
		                    <input id="apellidos" pattern="[a-zA-Z ]+" title = "No introduzca elementos númericos" name="apellidos" required="apellidos" type="text" placeholder="surnames" /> 
		                </p>
						 <p> 
		                    <label> Edad </label>
		                    <input id="edad" pattern="[0-9]+" title = "Introduzca un número" name="edad" required="required" type="text" placeholder="age" /> 
		                </p>
						<input type="hidden" name="formRegistro"/>
		                <p class="login button"> 
		                    <input type="submit" value="Finalizar" /> 
						</p>
		            </form>
		        </div>	
		    </div>
		</div>  
		</section>  
      </div>
      <div class="clearfix visible-xs-block visible-sm-block"></div>
      <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
      </div>
    </div>
  </div>
<script type="text/javascript">
$(function(){
	var root = $('#root_app').attr("href");
	$("#nick").change(function(){
	    var url=root + "/includes/php/comprobarUsuario.php?user=" + $("#nick").val();
	    $.get(url,usuarioExiste);
	});
	function usuarioExiste(data,status){
	    if(data==0){
	        $('#imgErrN').attr("src","includes/img/ok.png");
	    }else{
	        $('#imgErrN').attr("src","includes/img/no.png");
	    }
	}
});
</script>
  <!--Fin Contenido-->
  <?php require(__DIR__.'/includes/php/footer.php');?>
</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>