<!DOCTYPE html>
<html>

    <head>
        <title>Finddle</title>
        <meta charset="utf-8" />
        <link id="estilo" rel="stylesheet" type="text/css" href="includes/css/style.css">
		<link rel="shortcut icon" href="includes/img/favicon1.png" />
    </head>

    <body>
		<div id = "centrado">
             <a href="index.html" id="logo"><img src="includes/img/l2.png"></a> 
		</div>
        
        <div id="login-caja">

            <div id="login-caja-texto">

                	<h2>Inicia sesión en Finddle</h2>

                <form action="">

                    <input type="text" name="nombre" placeholder="Correo o usuario">
                    <br>
                    <br>
                    <input type="password" name="clave" placeholder="Contraseña"><br><br>
					<input type="checkbox" value="1" name="remember_me" checked="checked">Recordar mis datos
                </form>
            </div>
            <div id="login-botones">
                 <a href="vistaadministrador.html" class="btn-login">Administrador</a>
                 <a href="vistausuario.html" class="btn-login">Usuario</a>
                 <a href="vistapromotor.html" class="btn-login">Promotor</a>
            </div>

            <div id="login-opciones">
             
                	<a href="olvidoContrasena.html">¿Olvidaste tu contraseña?</a>
					<span class="separator">·</span>
					<a href="formularioregistro.html">¿Aún no estas registrado?</a>

            </div>
        </div>
		
		<nav class="buttons">
			<a href="condicionesLegales.html">Condiciones Legales</a>
			<a href="atencionCliente.html">Atención al cliente</a>
			<a href="contacto.html">Contactanos</a>
		</nav>
		
    </body>
</html>