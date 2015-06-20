<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/usuariosBD.php';

/*Valida los datos del formulario de registro. Si los datos son correctos, llama a la funcion que inserta un usuario 
en la base de datos (insertaUsuario($params)) en usuariosBD.php*/
function comprobarFormulario($params){
	$nick = $params['nick'];
	$contrasena = $params['contrasena'];
	$correo = $params['correo'];
	$nombre = $params['nombre'];
	$apellidos = $params['apellidos'];
	$edad = $params['edad'];
	$validParams = true;
	$result = [];
	if (!preg_match('/^[a-zA-Z0-9_-]{3,16}$/',$nick)) {
		$validParams = false;
		$result[] = "Requerido nombre de usuario de 3 a 16 caracteres alfanumericos."; 
	}
	if(!preg_match("/^[a-zA-z0-9_-]{4,18}$/",$contrasena)){
		$validParams = false;
		$result[] =  "Necesaria password de 4 a 18 caracteres alfanumericos";
	}
	if ( $validParams ) {
		$hashedpass = password_hash($contrasena.PIMIENTA, PASSWORD_BCRYPT);
    	insertarUsuario($nick, $hashedpass, $correo, $nombre, $apellidos, $edad);
		login($nick, $contrasena);
	}
  return $result;
}

/*Valida los datos introducidos en el formulario de Editar Perfil de un usuario y, si son correctos, 
llama a la funcion que actualiza el usuario en la base de datos*/
function formEditUser($params){
	/*$target = "includes/data/"; 
	$target = $target . basename( $_FILES['avatar']['name']); 
	$avatar = isset($_FILES['avatar']['name']) ? $_FILES['avatar']['name'] : null ;*/
	$nick = $_SESSION['username'];
	$contrasena = $params['contrasena'];
	$correo = $params['correo'];
	$nombre = $params['nombre'];
	$apellidos = $params['apellidos'];
	$edad = $params['edad'];
	$avatar = $params['avatar'];
	$validParams = true;
	$result = [];
	if(!preg_match("/^[a-zA-z0-9_-]{4,18}$/",$contrasena)){
		$validParams = false;
		$result[] =  "Necesaria password de 4 a 18 caracteres alfanumericos";
	}
	if ( $validParams ) {
		$hashedpass = password_hash($contrasena.PIMIENTA, PASSWORD_BCRYPT);
		editarUsuario($nick, $hashedpass, $correo, $nombre, $apellidos, $edad, $avatar);
	}
	/*
	//Writes the photo to the server
	if(move_uploaded_file($_FILES['avatar']['tmp_name'], $target))  {   
	//Tells you if its all ok
		echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido añadido con éxito.";  
	}  
	else {   //Gives and error if its not
		echo "Hubo un problema subiendo el archivo.";  
	} */
  return $result;
}

/* Valida los datos del formulario de Login usando expresiones regulares y llama 
a la función que comprueba los datos con la base de datos y realiza el login (login()), 
en caso de que no se cumplan retorna un array con los errores que se han generado para mostrarse en la vista login.php*/	
function formLogin($params) {
  $name = $params['username'];
  $pass = $params['password'];
  
  $validParams = true;
  $result = [];

  if (!preg_match('/^[a-zA-Z0-9_-]{3,16}$/',$name)) {
    $validParams = false;
    $result[] = "Requerido nombre de usuario de 3 a 16 caracteres alfanumericos."; 
  }
  if(!preg_match("/^[a-zA-z0-9_-]{4,18}$/",$pass)){
    $validParams = false;
    $result[] =  "Necesaria password de 4 a 18 caracteres alfanumericos";
  }
  if ( $validParams ) {
    $result = login($name, $pass);
  }

  return $result;
}

 /*Comprueba si el usuario que intenta hacer login existe en la BD y 
 si el hash de la contraseña más la pimienta coincide con el almacenado en 
 la base de datos, en tal caso se guardan las variables necesarias en la sesión y se redirige al usuario al index*/
function login($nombreUsuario, $password) {
 
  $ok = false;
  $usuario = getInfoUser($nombreUsuario);
  // Si existe el usuario
  if ( $usuario ) {
    $ok = password_verify($password.PIMIENTA, $usuario['Contrasena']) && $usuario['Tipo'] != "banned";
    if ($ok) {
      $_SESSION['username'] = $nombreUsuario;
      $_SESSION['rol'] = $usuario['Tipo'];
      $foto = $usuario['Imagen'];
      if($foto == NULL){
      	$foto = "includes/img/usuario.png";
      }
      $_SESSION['picture'] = $foto;
      
      $ok=true;
      header("Location: ".__DOC__."../../perfilUsuario.php");
    } else {
      $ok = [];
      $ok[] = "Usuario o password no validos";
    }
  } else {
    $ok = [];
    $ok[] = "Usuario o password no validos";
  }
  return $ok;
  
}

?>