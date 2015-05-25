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


function mensajeUsuario($nick2,$descripcion,$titulo){
	global $mysqli;
	$err = 0;
	$fecha=strftime("%Y-%m-%d-%H-%M:%S", time());
	$vacio = NULL;
	$leido = 0;
	$nick1 = 'paco';
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
	$pst = $mysqli->prepare("SELECT NickEmisor, Titulo, Fecha FROM mensajes WHERE NickReceptor = ?");
	$pst->bind_param("s",$args[0]);
	$pst->execute();
	$mensajes = null;
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$mensajes[] = $row;
	}
	$pst->close();
	foreach($mensajes as $mensaje){
					echo $mensaje["NickEmisor"];
					echo $mensaje["Titulo"];
					echo $mensaje["Fecha"];
	}
	

}

function mensajesEnviados($nick){
	global $mysqli;
	$args = array($nick);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("SELECT NickReceptor, Titulo, Fecha FROM mensajes WHERE NickEmisor = ?");
	$pst->bind_param("s",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	$mensajes = null;
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$mensajes[] = $row;
	}
	$pst->close();
	foreach($mensajes as $mensaje){
					echo $mensaje["NickReceptor"];
					echo $mensaje["Titulo"];
					echo $mensaje["Fecha"];
	}
}
?>
