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
      $_SESSION['foto'] = $usuario['Imagen'];
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