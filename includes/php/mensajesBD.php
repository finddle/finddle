<?php
require_once(__DIR__."/config.php");

function mensajeContacto($correo, $texto){
	global $mysqli;
	$err = 0;
	$fecha=strftime("%Y-%m-%d-%H-%M:%S", time());
	$tipo = 'admin';
	$titulo = 'Contacto';
	$vacio = NULL;
	$leido = 0;
	$user = 'UsuarioAnonimo';
	$query="INSERT INTO mensajes VALUES ('$vacio', '$user', '$tipo', '$correo', '$titulo', '$texto','$fecha', '$leido');";
	$resultado=$mysqli->query($query) or $err = 1;
	return $err;
}


function mensajeUsuario($nick1,$nick2,$descripcion,$titulo){
	global $mysqli;
	$err = 0;
	$fecha=strftime("%Y-%m-%d-%H-%M:%S", time());
	$vacio = NULL;
	$leido = 0;
	require_once(__DIR__."/usuariosBD.php");
	if(buscarNick($nick1)){
	$query="INSERT INTO mensajes VALUES ('$vacio', '$nick1', '$nick2', '$vacio', '$titulo', '$descripcion','$fecha', '$leido')";
	$resultado=$mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1)) or $err = 1;
	}
	else $err = 1;
	
	return $err;
}

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
