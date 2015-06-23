<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/mensajesBD.php';
require_once __DIR__.'/usuariosBD.php';
require_once __DIR__.'/amigosBD.php';

/*Valida los datos del formulario de contacto. Si los datos son correctos, llama a la funcion que inserta un mensaje 
en la base de datos (mensajeContacto($correo, $mensaje) en mensajesBD.php*/
function procesarFormContacto($params){
	$correo = $params['correo'];
	$mensaje = $params['mensaje'];
	if(mensajeContacto($correo, $mensaje)) $result = "Ha habido problemas al enviar su mensaje. Inténtelo de nuevo";
	else $result = "El mensaje se ha enviado con éxito";
	
	return $result;
}

/*Valida los datos del formulario de un nuevo mensaje a un usuario. Si los datos son correctos, el usuario existe y ambos son amigos,
se inserta el mensaje en la base de datos mediante la funcion mensajeUsuario($nick1,$nick2,$descripcion,$titulo) en mensajesBD.php*/
function procesarFormUser($params){
	
	$destinatario = $params['destinatario'];
	if(buscarNick($destinatario) == 1){
		if(esAmigo($_SESSION['username'],$destinatario) == 0){
			$result = "El usuario ".$params['destinatario']." y tu no sois amigos.";
		}
		else{
			$titulo = $params['titulo'];
			$mensaje = $params['mensaje'];
			mensajeUsuario($_SESSION['username'],$destinatario, $mensaje, $titulo);
			$result = "El mensaje se ha enviado con éxito.";
		}
	}
	else {
		$result = "El usuario que ha introducido no existe.";
	}
	
	return $result;
}
/*Consigue los mensajes enviados del usuario que se encuentra logueado mediante la funcion mensajesEnviados($nick) en mensajesBD.php.*/
function conseguirMensajesEnviados(){

	$result = mensajesEnviados($_SESSION['username']);
	return $result;
}

/*Consigue los mensajes recibidos del usuario que se encuentra logueado a traves de la funcion bandejaEntrada($nick) en mensajesBD.php.*/
function conseguirMensajesBandeja(){

	$result = bandejaEntrada($_SESSION['username']);
	return $result;
}
/*Abre un mensaje de la bandeja de entrada al cual tienes que pinchar mediante la funcion consultarMensaje($id) en mensajesBD.php.*/
function abrirMensaje($id){

	$result = consultarMensaje($id);
	return $result;
}
/*Abre un mensaje de los mensajes enviados al cual tienes que pinchar a traves de la funcion consultarMensajeEnviado($id) en mensajesBD.php.*/
function abrirMensajeEnviado($id){

	$result = consultarMensajeEnviado($id);
	return $result;
}
/*Modifica el campo Leido de la tabla de Mensajes mediante la funcion modificarLeido($id) en mensajesBD.php.*/
function modificarMensajeLeido($id){

	modificarLeido($id);
}

/*Valida los datos del formulario de respuesta de un mensaje recibido por parte de un usuario a traves de la funcion mensajeUsuario($nick1,$nick2,$descripcion,$titulo) 
en mensajesBD.php.*/
function responderFormMensaje($params){
	$mensaje = $params['mensaje'];
	$titulo = $params['titulo'];
	$receptor = $params['emisor'];
	mensajeUsuario($_SESSION['username'],$receptor,$mensaje,$titulo);
	header("Location: ".ROOT_DIR."/mensajes/enviados");
}

?>