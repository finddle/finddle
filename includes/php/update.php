<?php
require_once(__DIR__."\usuariosBD.php");
	// variable global para controlar el error al fallar el registro
	
  /* Comprueba si se ha invocado el script PHP como resultado del envío de un formulario
   */

    // Sí, procesamos el formulario
    
    // Obtenemos el usuario del formulario
	$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null ;
	$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null ;
	$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null ;
	$correo = isset($_POST['correo']) ? $_POST['correo'] : null ;
	$edad = isset($_POST['edad']) ? $_POST['edad'] : null ;
	editarUsuario('paco', $contrasena, $correo, $nombre, $apellidos, $edad);

?>