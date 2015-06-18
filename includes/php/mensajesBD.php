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
	$pst = $mysqli->prepare("SELECT NickEmisor, Titulo, TextoMensaje FROM mensajes WHERE ID = ?");
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
	lobal $mysqli;
	$args = array($id);
	sanitizeArgs($args);
	$mensaje = null;
	$pst = $mysqli->prepare("SELECT NickReceptor, Titulo, TextoMensaje FROM mensajes WHERE ID = ?");
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

?>
