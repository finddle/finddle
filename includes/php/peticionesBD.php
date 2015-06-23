<?php
	require_once(__DIR__."/config.php");
	
	/*Inserta en la tabla de peticionesamistad una nueva fila con los valores de $user1 y $user2*/
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
	
	/*Elimina la peticion de amistad pendiente de la base de datos*/
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
	
	/*Elimina la peticion de amistad de la tabla peticionesamistad 
	e inserta la nueva relacion de amistad a la tabla de amigos*/
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
	
	/*Comprueba en la tabla de peticionesamistad si está pendiente esa peticion. Devuelve 0 si no existe en la tabla.
	Si un usuario tiene pendiente de aceptación una petición de amistad, no podrá mandarle otra hasta que ésta no sea respondida (aceptada o rechazada)*/
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
	
	/*Dado un usuario, devuelve un array con las peticiones de amistad y mensajes pendientes
	que dicho usuario tiene en la base de datos*/
	function getNotificaciones($user){
		global $mysqli;
		
		$args = array($user);
		sanitizeArgs($args);
		
		$info = null;
		$pst = $mysqli->prepare("SELECT * FROM peticionesamistad WHERE NickUsuario2 = ?")  or trigger_error($mysqli->error);
		
		$pst->bind_param("s", $args[0]);
		$pst->execute();
		$result = $pst->get_result();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$info[] = $row;
		}
		$pst->close();

		$pst = $mysqli->prepare("SELECT NickEmisor,ID FROM mensajes WHERE NickReceptor = ? AND Leido = 0")  or trigger_error($mysqli->error);
		
		$pst->bind_param("s", $args[0]);
		$pst->execute();
		$result = $pst->get_result();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$info[] = $row;
		}
		$pst->close();
		return $info;
	}

?>