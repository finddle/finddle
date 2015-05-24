<?php
require_once(__DIR__."\mensajesBD.php");
	// variable global para controlar el error al fallar el registro
	
  /* Comprueba si se ha invocado el script PHP como resultado del envío de un formulario
   */

    // Sí, procesamos el formulario
    
    // Obtenemos el usuario del formulario
	$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null ;
    $destinatario = isset($_POST['destinatario']) ? $_POST['destinatario'] : null ;
    $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : null ;
	
	mensajeUsuario($destinatario, $mensaje, $titulo);
?>