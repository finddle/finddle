<!DOCTYPE html>
<html>

    <head>
        <title>Finddle</title>
        <meta charset="utf-8" />
        <link id="estilo" rel="stylesheet" type="text/css" href="style.css">
		<link rel="shortcut icon" href="includes/img/favicon1.png" />
    </head>

    <body>
       <div id = "vu-contenedor">

        <div id = "pu-cabecera">
         
        <div class = "centrado">
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
				<a href="vistapromotor.html" class="submit btn primary-btn">Administrar eventos</a>
				<a href="configurarcuenta.html" class="submit btn primary-btn">Configurar cuenta</a>
				<a href="bandejadeentrada.html" class="submit btn primary-btn">Mensajes</a>
				
        </div>

        <div id="vu-contenido">
             <div id = "vu-contenido-izq">
				</br>
				 <a href="nuevoEvento.html" class="btn-login">Crear evento</a>
			</div>
			<div id = "vu-contenido-der">
				 <input type="text" placeholder="Nombre del evento" required />
				 <a href="vistapromotor.html" class="btn-login">Buscar</a>
			 </div>
			 
			 <div id="eventos-usuario">
				</br></br></br>
				<h1> Mis eventos </h1>
				<h3>Fever presenta: PXXR GVNG</h3>
				<a href="infoEvento.html">
					<img src="includes/img/pg.jpg"/>
				</a> </br></br>
				<a href="editarEvento.html" class="btn-login">Editar evento</a> </br></br>
				
				<h3>Martin Garrix en FABRIK</h3>
				<a href="infoEvento.html">
					<img src="includes/img/garrix.jpg"/>
				</a></br></br>
				<a href="editarEvento.html" class="btn-login">Editar evento</a> </br></br>
				
				<h3>Disaster Fest</h3>
				<a href="infoEvento.html">
					<img src="includes/img/disaster.jpg"/>
				</a></br></br>
				<a href="editarEvento.html" class="btn-login">Editar evento</a> </br></br>
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
                    <a href="" class="twitter-share-button">Vincular</a></div>
        </div>
		</div>
    </body>

</html>