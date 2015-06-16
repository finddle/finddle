<?php
require_once(__DIR__."/config.php");

/**/
function getAmigos($user){
	global $mysqli;
	
	$args = array($user);
	sanitizeArgs($args);
	
	$amigos = null;
	//preparamos la consulta con un PreparedStatement
	$pst = $mysqli->prepare("SELECT NickUsuario1 FROM amigos WHERE NickUsuario2 = ?
							UNION 
							SELECT NickUsuario2 FROM amigos WHERE NickUsuario1 = ?");
	//creamos la cadena de argumentos indicando con s los string e i para integer, de cada argumento del array
	$pst->bind_param("ss",$args[0],$args[0]);

	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$amigos[] = $row;
	}
	//cerramos la conexion y devolvemos el resultado en un fecth_array
	$pst->close();
	return $amigos;			
}

/*Devuelve false(0) si no son amigos y true(1) si son amigos*/
function esAmigo($user1, $user2){
	global $mysqli;
	
	$args = array($user1, $user2);
	sanitizeArgs($args);
	
	$pst = $mysqli->prepare("SELECT NickUsuario1 FROM amigos WHERE NickUsuario2 = ? AND NickUsuario1 = ?
							UNION 
							SELECT NickUsuario2 FROM amigos WHERE NickUsuario1 = ? AND NickUsuario2 = ?");
	$pst->bind_param("ssss",$args[0],$args[1],$args[0],$args[1]);
	$pst->execute();
	$result = $pst->get_result();
	$pst->close();
	return $result->num_rows;
}
?>