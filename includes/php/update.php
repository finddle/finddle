<?php
	require_once(__DIR__."\usuariosBD.php");
    
	$target = "includes/data/"; 
	$target = $target . basename( $_FILES['avatar']['name']); 
	
    // Obtenemos el usuario del formulario
	$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null ;
	$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null ;
	$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null ;
	$correo = isset($_POST['correo']) ? $_POST['correo'] : null ;
	$edad = isset($_POST['edad']) ? $_POST['edad'] : null ;
	$avatar = isset($_FILES['avatar']['name']) ? $_FILES['avatar']['name'] : null ;
	editarUsuario('paco', $contrasena, $correo, $nombre, $apellidos, $edad, $avatar);
	
	//Writes the photo to the server
	if(move_uploaded_file($_FILES['avatar']['tmp_name'], $target))  {   
	//Tells you if its all ok
		echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido añadido con éxito.";  
	}  
	else {   //Gives and error if its not
		echo "Hubo un problema subiendo el archivo.";  
	} 

?>