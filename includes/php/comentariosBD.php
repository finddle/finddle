<?php
require_once(__DIR__."/config.php");

function getComentarios($var){
	global $mysqli;

	$args = array($var);
	sanitizeArgs($args);

	$pst = $mysqli->prepare("SELECT * FROM comentarios WHERE IDEvento = ? ORDER BY Fecha DESC;");
	$pst->bind_param("i", $args[0]);

		$pst->execute();
	$result = $pst->get_result();
	$comentario = null;

	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$comentario[] = $row;
	}
	$pst->close();
	return $comentario;

	/*
		while ($registro = $resultado->fetch_assoc()) {
			echo '<div id="comentario">';
					
					echo '<div id="nick">',$registro["nickUsuario"],"   ", "</div>";
					
				
					echo '<div id="texto">',$registro["Texto"], "</div>";
					
			echo "</div>";
			
		}
	*/

}

function commentEvent($user, $event, $comment){
// funcion now();
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