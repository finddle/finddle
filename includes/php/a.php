<?php
require_once(__DIR__."\usuariosBD.php");
	// variable global para controlar el error al fallar el registro
	
  /* Comprueba si se ha invocado el script PHP como resultado del envío de un formulario
   */

    // Sí, procesamos el formulario
    
    // Obtenemos el usuario del formulario
    $nick = isset($_POST['nick']) ? $_POST['nick'] : null ;
	$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null ;
	$correo = isset($_POST['email']) ? $_POST['email'] : null ;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null ;
	$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null ;
	$edad = isset($_POST['edad']) ? $_POST['edad'] : null ;
	insertarUsuario($nick, $contrasena, $correo, $nombre, $apellidos, $edad);

?>