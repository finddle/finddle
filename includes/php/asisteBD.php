<?php
require_once(__DIR__."/config.php");

/*Inserta en la tabla "asiste" una nueva fila con el nick del usuario y el ID del evento pasado por parámetro*/
function asisteEvento($user,$evento){
	global $mysqli;

	$args = array($user, $evento);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("INSERT INTO asiste VALUES (?,?);");
	$pst->bind_param("si",$args[0], $args[1]);
	$pst->execute();
	
	$pst->close();
}

/*Obtiene todos los eventos a los que asiste el usuario que se le pasa por parámetro*/
function getEventosUser($user){
	global $mysqli;
	$args = array($user);
	sanitizeArgs($args);
	$eventos = null;

	$pst = $mysqli->prepare("SELECT IDEvento, Tipo, Nombre, Imagen FROM asiste,eventos WHERE NickUsuario = ? AND ID = IDEvento");
	//creamos la cadena de argumentos indicando con s los string e i para integer, de cada argumento del array
	$pst->bind_param("s",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$eventos[] = $row;
	}
	//cerramos la conexion y devolvemos el resultado en un fecth_array
	$pst->close();
	return $eventos;	
}


/*Obtiene los usuarios que asisten al evento que le pasamos por parámetro*/
function getUsersEvento($idEvento){
	global $mysqli;
	$args = array($idEvento);
	sanitizeArgs($args);
	$asistentes = null;

	$pst = $mysqli->prepare("SELECT Nick, Avatar FROM asiste,usuarios WHERE IDEvento = ? AND NickUsuario = Nick");
	
	$pst->bind_param("i",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$asistentes[] = $row;
	}
	
	$pst->close();
	return $asistentes;
}

?>