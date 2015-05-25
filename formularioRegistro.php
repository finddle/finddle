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
		  <link rel="stylesheet" type="text/css" href="includes/css/formularios.css">
		  <!--Favicon-->
		  <link rel="shortcut icon" href="includes/img/favicon.png" />
			<script type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>
    </head>

	<body>
		  <div class="container">
		  <section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method = "POST" action="includes\php\a.php"> 
                                <h1>Formulario de Registro</h1> 
                                <p> 
                                    <label> Nick </label>
                                    <input name="nick" required="required" type="text" placeholder="username"/>
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
                                    <input id="apellidos" pattern="[a-zA-Z]+" title = "No introduzca elementos númericos" name="apellidos" required="apellidos" type="text" placeholder="surnames" /> 
                                </p>
								 <p> 
                                    <label> Edad </label>
                                    <input id="edad" pattern="[0-9]+" title = "Introduzca un número" name="edad" required="required" type="text" placeholder="age" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Finalizar" /> 
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
		
		<script>
			$("#nick").change(function(){
			<?php 
			require_once(__DIR__."/usuariosBD.php");
			?>
			var url="buscarNick()nick=" + $("#nick").val();
			$.get(url,usuarioExiste);
			});							
		</script>
    </body>

</html>