<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<title> Finddle </title>
		<link rel="stylesheet" href="includes/css/style.css" type="text/css">
		<link rel="shortcut icon" href="includes/img/favicon1.png" />
	</head>
	
	<body>
		
		<div id="vu-contenedor">
		<div id="vu-cabecera">
		<div id = "centrado">
             <a href="" id="logo"><img src="includes/img/l2.png"></a> 
        </div>
        
             <nav class="buttons">
            <a href="">Conciertos</a>
            <a href="">Cine</a>
            <a href="">Fiestas</a>
            <a href="">Salir</a>
        </nav>
		<h1>Mensajería interna </h1>
		
		<div id = "vu-barra-izquierda">
			<img src="includes/img/usuario.png" align="center">
            <a href="#" class="submit btn primary-btn">Bandeja de entrada</a>
            <a href="#" class="submit btn primary-btn">Enviados</a>
        </div>
		
		<div id="vu-barra-derecha">
			<h2> Amigos </h2></br></br>
			<p>Andrés</p> </br>
			<p>Omar</p> </br>
			<p>Francisco</p> </br>
			<p>Enrique</p> </br>
			<p>Mario</p> </br>
			<p>Víctor</p> </br>
			<p>Javier</p>
		</div>
		
		 <div id="vu-contenido">
				
	<div id="formularioRegistro">
	<div id = "nombresFormulario">
		Destinatario</br></br>
		Mensaje</br></br>
		</div>
		<div id = "cuadrosFormulario">

                <form name "form" method="POST" action="includes\php\c.php">
					<input type="text" name="titulo" placeholder="Titulo" /><br><br>
					<input type="text" name="destinatario" placeholder="Destinatario" /><br><br>
					<input type="text" name="mensaje" placeholder="Mensaje" /><br><br>
					<input type="submit" value "Enviar"/> 
                </form>
				</br>
		</div>
	</form>
	</div>
				
        </div>
		
		</div>
	</body>

	</html>