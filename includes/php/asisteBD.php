<?php
require_once(__DIR__."/config.php");

/**/
function asisteEvento($user,$evento){
	global $mysqli;

	$args = array($user, $evento);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("INSERT INTO asiste VALUES (?,?);");
	$pst->bind_param("si",$args[0], $args[1]);
	$pst->execute();
	$result = $pst->get_result();
	
	$pst->close();
}

/**/
function getEventosUser($user){
	global $mysqli;
	$args = array($user);
	sanitizeArgs($args);
	$eventos = null;

	$pst = $mysqli->prepare("SELECT IDEvento, Nombre, Imagen FROM asiste,eventos WHERE NickUsuario = ? AND ID = IDEvento");
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


?>