<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/mensajesBD.php';
require_once __DIR__.'/usuariosBD.php';

/**/
function procesarFormContacto($params){
	$correo = $params['correo'];
	$mensaje = $params['mensaje'];
	if(mensajeContacto($correo, $mensaje)) $result = "Ha habido problemas al enviar su mensaje. Inténtelo de nuevo";
	else $result = "El mensaje se ha enviado con éxito";
	
	return $result;
}

/**/
function procesarFormUser($params){
	
	$destinatario = $params['destinatario'];
	if(buscarNick($destinatario)){
		$titulo = $params['titulo'];
		$mensaje = $params['mensaje'];
		mensajeUsuario($destinatario, $mensaje, $titulo);
		echo "ok";
	}
	else {
		echo "no";
	}
	
	return $result = 0;
}

?>