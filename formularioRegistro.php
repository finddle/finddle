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
		<script src="includes/js/jquery.min.js"></script>
		<script src="includes/js/bootstrap.js"></script>
		
    </head>

	<?php 
		require(__DIR__.'/includes/php/usuarios.php');
		if(isset($_POST['formRegistro'])) {
			$result = comprobarFormulario($_POST);
		}
	?>
	
	<body>
		
        <div class="span-content"></div>
		  <div class="container">
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
                                    <label> Nick </label> <img id="imgErrN" src="includes/img/no.png"/>
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
                                    <input id="nombre" pattern="[a-zA-Z]+" title = "No introduzca elementos númericos" name="nombre" required="required" type="text" placeholder="name" /> 
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
		
		<?php 
			require(__DIR__.'/includes/php/footer.php');
		?>
		
		<script type="text/javascript">
		$(function(){
			$("#nick").change(function(){
						var url="comprobarUsuario.php?user=" + $("#nick").val();
						$.get(url,usuarioExiste);
			});
		function usuarioExiste(data,status){
						if(data){
							$('#imgErrN').attr("src","includes/img/ok.png");
						}else{
							$('#imgErrN').attr("src","includes/img/no.png");
						}
			}
		});
		</script>
 
    </body>

</html>