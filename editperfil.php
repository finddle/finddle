<!DOCTYPE html>
<html>

    <head>
        <title>Finddle</title>
        <meta charset="utf-8" />
        <link id="estilo" rel="stylesheet" type="text/css" href="includes/css/style.css">
		<link rel="shortcut icon" href="includes/img/favicon1.png" />
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
			
			<div id = "">
			 <h3> Actualiza la información de perfil</h3>
				<div id = "nombresFormulario">
					Nombre:</br></br>
					Apellido:</br></br>
					Contraseña:</br></br>
					E-mail:</br></br>
					Edad:</br></br>
				</div>
				
				<div id = "#cuadrosFomularioPerfil">
                <form name="form" action="includes/php/update.php" method="post">
						</br>
                        <input text="submit" name="nombre" placeholder="Nombre"/><br><br>
                        <input text="submit" name="apellidos" placeholder="Apellidos"/><br><br>
						<input text="submit" name="contrasena" placeholder="contrasena" /><br><br>
                        <input text="submit" name="correo" placeholder="Correo" /><br><br>
                        <input text="submit" name="edad" placeholder="edad" /><br><br></br>
						<input type="submit" value "Actualizar"/>;
				</form>
                </div>
                      
                    
                

            </div>
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
    </body>

</html>