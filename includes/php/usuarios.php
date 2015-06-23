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
function formEditUser($params, $img){
	$nick = $_SESSION['username'];
	$contrasena = $params['contrasena'];
	$correo = $params['correo'];
	$nombre = $params['nombre'];
	$apellidos = $params['apellidos'];
	$edad = $params['edad'];
	
	$archivoimg = $_FILES['avatar'];
	$nombreimg = $img['avatar']['name'];
	$imagen = ("includes/data/users/".$nombreimg);
	
	$validParams = true;
	$result = [];
	
	if(!preg_match("/^[a-zA-z0-9_-]{4,18}$/",$contrasena)){
		$validParams = false;
		$result[] =  "Necesaria password de 4 a 18 caracteres alfanumericos";
	}
	
	$ok = check_file_uploaded_name($nombre) && check_file_uploaded_length($nombre);
	if ( $ok ) {
		$tmp_name = $_FILES['avatar']['tmp_name'];
		if ( !move_uploaded_file($tmp_name, __DIR__.("/../data/users/".$nombreimg))) //DESTINO = __DIR__.("/../data/users/".$nombre)
			$result[] = 'Error al mover el archivo';
    }

	if($archivoimg['error'] > 0)
    	$result[] ="An error ocurred when uploading.";
	if($archivoimg['size'] > 10000000)
    	$result[] ="File uploaded exceeds maximum upload size.";
	
	if ( $validParams ) {
		$hashedpass = password_hash($contrasena.PIMIENTA, PASSWORD_BCRYPT);
		editarUsuario($nick, $hashedpass, $correo, $nombre, $apellidos, $edad, $imagen);
		$result[] ="Su perfil se ha editado correctamente";
	}
	
  return $result;
}

/**
 * Check $_FILES[][name]
 *
 * @param (string) $filename - Uploaded file name.
 * @author Yousef Ismaeil Cliprz
 * @See http://php.net/manual/es/function.move-uploaded-file.php#111412
 */
function check_file_uploaded_name ($filename) {
    return (bool) ((preg_match('/^[0-9A-Z-_\.]+$/i',$filename) === 1) ? true : false );
}

/**
 * Check $_FILES[][name] length.
 *
 * @param (string) $filename - Uploaded file name.
 * @author Yousef Ismaeil Cliprz.
 * @See http://php.net/manual/es/function.move-uploaded-file.php#111412
 */
function check_file_uploaded_length ($filename) {
   return (bool) ((mb_strlen($filename,'UTF-8') < 250) ? true : false);
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
      $_SESSION['username'] = $usuario['Nick'];
      $_SESSION['rol'] = $usuario['Tipo'];
      $foto = $usuario['Imagen'];
      if($foto == NULL){
      	$foto = "includes/img/usuario.png";
      }
      $_SESSION['picture'] = $foto;
      
      $ok=true;
      if($usuario['Tipo']=="admin"){
      	header("Location: ".ROOT_DIR."/administrar");	
      }else if($usuario['Tipo']=="promotor"){
      	header("Location: ".ROOT_DIR."/promotor");
      }else{
      	header("Location: ".ROOT_DIR."/usuarios/perfil");
      }
      
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