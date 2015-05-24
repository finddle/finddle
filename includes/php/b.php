<?php
require_once(__DIR__."\mensajesBD.php");
	// variable global para controlar el error al fallar el registro
	
  /* Comprueba si se ha invocado el script PHP como resultado del envío de un formulario
   */

    // Sí, procesamos el formulario
    
    // Obtenemos el usuario del formulario
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null ;
	$correo = isset($_POST['correo']) ? $_POST['correo'] : null ;
    $texto = isset($_POST['mensaje']) ? $_POST['mensaje'] : null ;
	mensajeContacto($nombre, $correo, $texto);

?>