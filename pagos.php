<!DOCTYPE html>
<html>

    <head>
        <title>Finddle</title>
        <meta charset="utf-8" />
        <link id="estilo" rel="stylesheet" type="text/css" href="includes/css/style.css">
		<link rel="shortcut icon" href="includes/img/favicon1.png" />
    </head>

    <body bgcolor="#4DD0E1">
	
		<div id="pu-cabecera">
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
		
        <div id="formularioPago">

			
                	<h2>Formulario de pago</h2>
			<div id = "">		
			<div id = "nombresFormulario">
			Numero de entradas</br></br>
			Precio total</br></br>
			Forma de pago</br></br>
			Numero de cuenta</br></br>
			</div>

			<div id = "cuadrosFormulario">
                <form action="">
					<select name="numerodeentradas">
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					</select></br></br>
			
				<input type="text" name="preciototal" value="" /></br></br>
			
				<select name="formadepago">
				<option value="Visa" selected>Visa</option>
				<option value="Mastercard">Mastercard</option>
				<option value="Paypal">Paypal</option>
				</select></br></br>
			
			<input type="text" name="numerodecuenta" value="" /></br></br></br>
				
                </form>
			</div>
			</div>

            <div id="login-botones">
				<center>
                 <a href="perfilUsuario.html" class="btn-login">Finalizar</a>
				</center>
            </div>
        </div>
    </body>

</html>