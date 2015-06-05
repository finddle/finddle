<?php
	require_once(__DIR__."/config.php");
	
	function enviarPeticion($user1, $user2){
		global $mysqli;
		
		$args = array($user1, $user2);
		sanitizeArgs($args);	
		
		$pst = $mysqli->prepare("INSERT INTO peticionesamistad VALUES (?,?);");
		
		$pst->bind_param("ss",$args[0], $args[1]);
		$pst->execute();
		$result = $pst->get_result();
		
		$pst->close();
	}
	
	function cancelarPeticion($user1, $user2){
		global $mysqli;
		
		$args = array($user1, $user2);
		sanitizeArgs($args);	
		
		$pst = $mysqli->prepare("DELETE FROM peticionesamistad WHERE NickUsuario1 = ? AND NickUsuario2 = ?;");
		
		$pst->bind_param("ss",$args[0], $args[1]);
		$pst->execute();
		$result = $pst->get_result();
		
		$pst->close();
	}
	
	//elimina la peticion de amistad de la tabla peticionesamistad e inserta la nueva relacion de amistad a la tabla de amigos
	function aceptarPeticion($user1, $user2){
		global $mysqli;
		
		$args = array($user1, $user2);
		sanitizeArgs($args);	
		
		$pst = $mysqli->prepare("INSERT INTO amigos VALUES (?,?);");
		
		$pst->bind_param("ss",$args[0], $args[1]);
		$pst->execute();
		$result = $pst->get_result();
		
		$pst->close();
		
		cancelarPeticion($user1, $user2);
	}
	
	//comprueba en la tabla de peticionesamistad si está pendiente esa peticion. Devuelve 0 si no existe en la tabla.
	function comprobarPeticion($user1, $user2){
		global $mysqli;
		
		$args = array($user1, $user2);
		sanitizeArgs($args);	
		
		$pst = $mysqli->prepare("SELECT NickUsuario1 FROM peticionesamistad WHERE NickUsuario2 = ? AND NickUsuario1 = ?
								UNION 
								SELECT NickUsuario2 FROM peticionesamistad WHERE NickUsuario1 = ? AND NickUsuario2 = ?");
		
		$pst->bind_param("ssss", $args[0], $args[1], $args[0], $args[1]);
		$pst->execute();
		$result = $pst->get_result();
		$pst->close();
		return $result->num_rows;
	}
	

?>