<?php
require_once(__DIR__."/config.php");

/*Devuelve 0 si el usuario no se encuentra en la base de datos, o 1 si éste se encuentra registrado*/
function insertarUsuario($nick, $contrasena, $correo, $nombre, $apellidos, $edad){
	global $mysqli;
	$tipo = 'usuario';
	$args = array($nick, $contrasena, $correo, $nombre, $apellidos, $edad, $tipo);
	sanitizeArgs($args);
	//preparamos la consulta con un PreparedStatement
	$pst = $mysqli->prepare("INSERT INTO usuarios VALUES (?,?,?,?,?,?,NULL,?);");
	//creamos la cadena de argumentos indicando con s los string e i para integer, de cada argumento del array
	$pst->bind_param("sssssis",$args[0], $args[1], $args[2], $args[3], $args[4], $args[5], $args[6]);
	$pst->execute();
	$result = $pst->get_result();
	
	$pst->close();
}

/*Modifica los datos de un usuario registrado en la base de datos*/
function editarUsuario($nick, $contrasena, $correo, $nombre, $apellidos, $edad, $avatar){
	global $mysqli;
	$args = array($contrasena, $correo, $nombre, $apellidos, $edad, $avatar);
	sanitizeArgs($args);	
	
	$pst = $mysqli->prepare("UPDATE usuarios SET Contrasena = ? AND Correo = ? AND Nombre = ? AND Apellidos = ? AND Edad = ? AND Avatar = ? 
							WHERE Nick = $nick");
	
	$pst->bind_param("ssssis", $args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
	$pst->execute();
	$result = $pst->get_result();
	
	$pst->close();
}

/*Obtiene un array con los datos del usuario que se le pasa por parámetro*/
function getInfoUser($nick){
	global $mysqli;
	
	$args = array($nick);
	sanitizeArgs($args);
	$info = null;
	
	$pst = $mysqli->prepare("SELECT * FROM usuarios WHERE Nick = ?");
	$pst->bind_param("s",$args[0]);
	$pst->execute();

	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$info = $row;
	}
	$pst->close();
	return $info;
}

/*Devuelve 0 si el usuario no se encuentra en la base de datos, o 1 si éste se encuentra registrado*/
function buscarNick($nick){
	global $mysqli;
	$err = 0;
	$args = array($nick);
	sanitizeArgs($args);
	$info = null;
	//preparamos la consulta con un PreparedStatement
	$pst = $mysqli->prepare("SELECT Nick FROM usuarios WHERE Nick = ?");
	//creamos la cadena de argumentos indicando con s los string e i para integer, de cada argumento del array
	$pst->bind_param("s",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	$numregistros=$result->num_rows;
	$pst->close();
	return $numregistros;
}

/**/
function usersCadena($cadena){
	$c = $cadena['cuadro'];
	global $mysqli;
	$cad = '%'.$c.'%';
	$args = array($cad);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("SELECT * FROM usuarios WHERE Nick LIKE ?");
	$pst->bind_param("s",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	$users[] = null;
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$users[] = $row;
	}
	$pst->close();
	return $users;

/*Elimina un usuario de la tabla usuarios*/ 
function borrarUsuario($nick){
	
}

?>