<?php
require_once(__DIR__."/config.php");

/*Devuelve 0 si se ha insertado el mensaje de contacto correctamente, o 1 si no lo ha realizado correctamente*/
function mensajeContacto($correo, $texto){
	global $mysqli;
	$err = 0;
	$fecha=strftime("%Y-%m-%d-%H-%M:%S", time());
	$tipo = 'admin';
	$titulo = 'Mensaje de Contacto';
	$vacio = NULL;
	$leido = 0;
	if(isset($_SESSION['username'])){
		$user = $_SESSION['username'];
	}else
		$user = 'UsuarioAnonimo';
	$pst = $mysqli->prepare("INSERT INTO mensajes VALUES ('$vacio', '$user', '$tipo', ?, '$titulo', ?,'$fecha', '$leido');");
	$pst->bind_param("ss",$args[0],$args[1]);
	$pst->execute();
	$pst->close();
	return $err;
}

/*Devuelve 0 si se ha insertado el mensaje a un usuario correctamente, o 1 si no lo ha realizado correctamente*/
function mensajeUsuario($nick1,$nick2,$descripcion,$titulo){
	require_once(__DIR__."/usuariosBD.php");
	global $mysqli;
	$err = 0;
	$fecha=strftime("%Y-%m-%d-%H-%M:%S", time());
	$vacio = NULL;
	$leido = 0;

	$args = array($nick1,$nick2,$descripcion,$titulo);
	sanitizeArgs($args);
	
	if(buscarNick($nick1)){
		$pst = $mysqli->prepare("INSERT INTO mensajes VALUES ('$vacio', ?, ?, '$vacio', ?, ?,'$fecha', '$leido');");
		$pst->bind_param("ssss",$args[0],$args[1],$args[3],$args[2]);
		$pst->execute();
		$pst->close();
	}
	else $err = 1;
	
	return $err;
}

/*Obtiene un array con los mensajes que ha recibido un usuario pasado por parámetro, ordenado por fecha.*/
function bandejaEntrada($nick){
	global $mysqli;
	$args = array($nick);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("SELECT ID, Leido, NickEmisor, Fecha, Titulo FROM mensajes WHERE NickReceptor = ? ORDER BY Fecha DESC");
	$pst->bind_param("s",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	$mensajes = null;
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$mensajes[] = $row;
	}
	$pst->close();
	return $mensajes;
	
}

/*Obtiene un array con los mensajes que ha enviado un determinado usuario pasado por parámetro, ordenado por fecha.*/
function mensajesEnviados($nick){
	global $mysqli;
	$args = array($nick);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("SELECT ID, NickReceptor, Fecha, Titulo FROM mensajes WHERE NickEmisor = ? ORDER BY Fecha DESC");
	$pst->bind_param("s",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	$mensajes = null;
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$mensajes[] = $row;
	}
	$pst->close();
	return $mensajes;
	
}
/* Devuelve un mensaje que se encuentra en la bandeja entrada, con un determinado id pasado por parámetro*/
function consultarMensaje($id){
	global $mysqli;
	$args = array($id);
	sanitizeArgs($args);
	$mensaje = null;
	$pst = $mysqli->prepare("SELECT ID, Fecha, NickEmisor, Titulo, TextoMensaje FROM mensajes WHERE ID = ?");
	$pst->bind_param("i",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$mensaje = $row;
	}
	$pst->close();
	return $mensaje;
}
/* Devuelve un mensaje que se encuentra en la bandeja de mensajes enviados, con un determinado id pasado por parámetro*/
function consultarMensajeEnviado($id){
	global $mysqli;
	$args = array($id);
	sanitizeArgs($args);
	$mensaje = null;
	$pst = $mysqli->prepare("SELECT NickReceptor, Fecha, Titulo, TextoMensaje FROM mensajes WHERE ID = ?");
	$pst->bind_param("i",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$mensaje = $row;
	}
	$pst->close();
	return $mensaje;
	
}

/* Modifica el campo Leido en la tabla mensajes de la base de datos*/
function modificarLeido($id){
	global $mysqli;
	$leido = 1;
	$args = array($leido);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("UPDATE mensajes SET Leido = ? WHERE ID = $id");
	$pst->bind_param("i",$args[0]);
	$pst->execute();
	$pst->close();
}

/*Esta funcion carga los mensajes de una conversacion entre dos usuarios, excepto el 
mensaje que ya esta viendo el usuario. Se implementa de forma similar al scroll para 
que cada vez que se llame a la funcion via AJAX se haga un LIMIT offset,pag_size para que solo 
salgan los mensajes a partir de una posicion determinada, de 2 en 2(se guarda en la 
sesion el valor para que en las siguientes llamadas no se repitan mensajes).*/
function getConversacion($emisor, $receptor, $mensaje){
	global $mysqli;
	$pag_size = 2;
	$off = 0;
	$info = null;

	if(!isset($_SESSION['offsetm'])){
		$_SESSION['offsetm'] = 0;
	}else{
		$off = $_SESSION['offsetm'];
		$off = $off + 2;
		$_SESSION['offsetm'] = $off; 
	}

	$args = array($emisor, $receptor,$mensaje);
	sanitizeArgs($args);
	
	$pst = $mysqli->prepare("SELECT * FROM mensajes WHERE ((NickEmisor = ? AND NickReceptor = ?)
							OR (NickEmisor = ? AND NickReceptor = ?)) AND ID <> ? ORDER BY Fecha DESC LIMIT ? , ?"
							)  or trigger_error($mysqli->error);
	
	$pst->bind_param("ssssiii", $args[1], $args[0], $args[0], $args[1], $args[2],$off,$pag_size);
	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$info[] = $row;
	}
	$pst->close();

	return $info;
}

?>