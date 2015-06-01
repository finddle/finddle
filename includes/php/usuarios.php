<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/usuariosBD.php';

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
    insertarUsuario($nick, $contrasena, $correo, $nombre, $apellidos, $edad);
	}
  return $result;
}

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
		editarUsuario($nick, $contrasena, $correo, $nombre, $apellidos, $edad, $avatar);
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

function login($nombreUsuario, $password) {
 
  $ok = false;
  $usuario = getInfoUser($nombreUsuario);
  // Si existe el usuario
  if ( $usuario ) {
    $ok = $usuario['Contrasena'] === $password && $usuario['Tipo'] != "banned";
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