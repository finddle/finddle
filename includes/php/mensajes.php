<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/mensajesBD.php';
require_once __DIR__.'/usuariosBD.php';
require_once __DIR__.'/amigosBD.php';

function procesarFormContacto($params){
	$correo = $params['correo'];
	$mensaje = $params['mensaje'];
	if(mensajeContacto($correo, $mensaje)) $result = "Ha habido problemas al enviar su mensaje. Inténtelo de nuevo";
	else $result = "El mensaje se ha enviado con éxito";
	
	return $result;
}

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

function conseguirMensajesEnviados(){

	$result = mensajesEnviados($_SESSION['username']);
	return $result;
}

function conseguirMensajesBandeja(){

	$result = bandejaEntrada($_SESSION['username']);
	return $result;
}

function abrirMensaje($id){

	$result = consultarMensaje($id);
	return $result;
}

function modificarMensajeLeido($id){

	modificarLeido($id);
}

function responderFormMensaje($params){
	$mensaje = $params['mensaje'];
	$titulo = $params['titulo'];
	$receptor = $params['emisor'];
	mensajeUsuario($_SESSION['username'],$receptor,$mensaje,$titulo);
	header("Location: /finddle/mensajesBandeja.php");
}

?>