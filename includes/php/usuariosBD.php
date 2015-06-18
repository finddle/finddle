<?php
require_once(__DIR__."/config.php");

/**/
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

/**/
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

/**/
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

/**/
function modificarDatosUser ($nick, $contrasena, $correo, $nombre, $apellidos, $edad){
	global $mysqli;
	$err = 0;
	$query="UPDATE usuario SET contrasena = '$contrasena' AND correo = '$correo' AND nombre = '$nombre' AND apellidos = '$apellidos' AND edad = '$edad' WHERE nick = '$nick'";
	$resultado=$mysqli->query($query) or $err = 1;
	
	return $err;
}

/**/
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


?>