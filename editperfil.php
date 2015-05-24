<!DOCTYPE html>
<html>

    <head>
        <title>Finddle</title>
        <meta charset="utf-8" />
        <link id="estilo" rel="stylesheet" type="text/css" href="includes/css/style.css">
		<link rel="stylesheet" href="includes/css/formularios.css" type="text/css">
		<link rel="shortcut icon" href="includes/img/favicon1.png" />
		<script type="text/javascript" src="includes/js/jquery-1.9.1.min.js"></script>
    </head>

    <body>
       <div id="vu-contenedor">

            <div id="vu-cabecera">
				<div id = "centrado">
					<a href="index.html"id="logo"><img src="includes/img/l2.png"></a>
					<nav class="buttons">
						<a href="proximosEventos.html">Conciertos</a>
						<a href="cartelera.html">Cine</a>
						<a href="proximosEventos.html">Fiestas</a>
						<a href="index.html">Salir</a>
					</nav>
				</div>
			</div>
			
			
            <div id = "vu-barra-izquierda">
                     <a href="perfilUsuario.php" class="submit btn primary-btn">Perfil</a>
                     <a href="mensajes.php" class="submit btn primary-btn">Mensajes</a>
                     <a href="proximosEventos.php" class="submit btn primary-btn">Proximos eventos</a>
            </div>

			
            <div id="vu-contenido">
				<section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method = "POST" action="includes\php\update.php" enctype="multipart/form-data"> 
                                <h1>Editar perfil</h1> 
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
								<p> 
                                    <label> Contraseña </label>
                                    <input id="contrasena" name="contrasena" required="required" type="password" placeholder="password" /> 
                                </p>
								<p> 
                                    <label> E-mail </label>
                                    <input id="correo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="El correo ha de tener el siguiente formato: myemail@myemail.com" name="correo" required="required" type="text" placeholder="e-mail" /> 
                                </p>
								<p> 
                                    <label> Avatar </label>
                                    <input id="avatar"  name="avatar" placeholder="avatar" type="file"/> 
                                </p>
                                <p class="login button"> 
									<a href="perfilUsuarioBD.php">
										<input type="submit" value="Finalizar" /> 
									</a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
		</div>
		
		
        <div id ="vu-barra-derecha"> 
            <div id="vu-imp-contactos">
                    <img src="includes/img/gmail-logo.jpg"> GMAIL<br>
                    Encuentra a personas que conoces.<br>
                    <a href="#" class="vu-imp-contactos-gmail">Importar contactos de gmail</a>
            </div>  
            <div id="vu-twitter"><img src="includes/img/twitter-logo.jpg"> TWITTER<br>
                    Vincula tu cuenta.<br>
                    <a href="" class="twitter-share-button">Vincular</a>
			</div>
        </div>
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