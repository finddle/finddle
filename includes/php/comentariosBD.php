<?php
require_once(__DIR__."/config.php");

/**/
function getComentarios($evento){
	global $mysqli;

	$args = array($evento);
	sanitizeArgs($args);

	$pst = $mysqli->prepare("SELECT * FROM comentarios WHERE IDEvento = ? ORDER BY Fecha DESC;");
	$pst->bind_param("i", $args[0]);

		$pst->execute();
	$result = $pst->get_result();
	$comentarios = null;

	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$comentarios[] = $row;
	}
	$pst->close();
	return $comentarios;
}

/**/
function commentEvent($user, $event, $comment){
	global $mysqli;
	$args = array($user,$event,$comment);
	sanitizeArgs($args);
	$fecha=strftime("%Y-%m-%d-%H-%M:%S", time());

	$pst = $mysqli->prepare("INSERT into comentarios VALUES ('', ?, ?, ?, ?);");
	$pst->bind_param("siss",$args[0],$args[1],$args[2],$fecha);
	$pst->execute();
	print_r($args);
	print_r($fecha);
	$pst->close();
	

}

/**/
function eliminarComentario($comment){

	global $mysqli;
	$args = array($comment);
	sanitizeArgs($args);

	$pst = $mysqli->prepare("DELETE from comentarios WHERE ?=ID;");
	$pst->bind_param("i",$args[0]);
	$pst->execute();
	$pst->close();

}


?>