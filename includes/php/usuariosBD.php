<?php
	require_once(__DIR__."/config.php");

	function comprobarFormulario(){
	$nick = isset($_POST['nick']) ? $_POST['nick'] : null ;
	$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null ;
	$correo = isset($_POST['email']) ? $_POST['email'] : null ;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null ;
	$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null ;
	$edad = isset($_POST['edad']) ? $_POST['edad'] : null ;
	insertarUsuario($nick, $contrasena, $correo, $nombre, $apellidos, $edad);
	}

	function editarUsuario($nick, $contrasena, $correo, $nombre, $apellidos, $edad, $avatar){
		global $mysqli;
		$args = array($contrasena, $correo, $nombre, $apellidos, $edad, $avatar);
		sanitizeArgs($args);	
		
		$pst = $mysqli->prepare("UPDATE usuarios SET Contrasena = ? AND Correo = ? AND Nombre = ? AND Apellidos = ? AND Edad = ? AND Avatar = ? 
								WHERE Nick = $nick");
		
		$pst->bind_param("ssssis", $args[0], $args[1], $args[2], $args[3], $args[4], $args[5]);
		$pst->execute();
		$result = $pst->get_result();
		
		$pst->close();
	}
	
	function insertarUsuario($nick, $contrasena, $correo, $nombre, $apellidos, $edad){
		global $mysqli;
		$err = 0;
		$vacio = NULL;
		$tipo = 'usuario';
		$query="INSERT INTO usuarios VALUES ($nick, $contrasena, $correo, $nombre, $apellidos, $edad, '$vacio', '$tipo');";
		$resultado=$mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
		return $err;
	}

	function getInfoUser($nick){
		global $mysqli;
		
		$args = array($nick);
		sanitizeArgs($args);
		$info = null;
		//preparamos la consulta con un PreparedStatement
		$pst = $mysqli->prepare("SELECT * FROM usuarios WHERE Nick = ?");
		//creamos la cadena de argumentos indicando con s los string e i para integer, de cada argumento del array
		$pst->bind_param("s",$args[0]);

		$pst->execute();
		$result = $pst->get_result();
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			$info = $row;
		}
		//cerramos la conexion y devolvemos el resultado en un fecth_array
		$pst->close();		
		return $info;	
	}

	function buscarUser($nick){
		global $mysqli;
		$arr = null;
		$query="SELECT * FROM usuarios WHERE nick = '$nick'";
			$resultado=$mysqli->query($query);
			$numregistros=$resultado->num_rows;	
			if($numregistros == 1){
				while($fila = $resultado->fetch_row()){
					$nickU = $fila[0];	$arr[] = $nickU;
					$contrasenaU = $fila[1];	$arr[] = $contrasenaU;
					$correoU = $fila[2];	$arr[] = $correoU;
					$nombreU = $fila[3];	$arr[] = $nombreU;
					$apellidosU = $fila[4];	$arr[] = $apellidosU;
					$edadU = $fila[5];	$arr[] = $edadU;
				}
				}
		return $arr;
	}

	function modificarDatosUser ($nick, $contrasena, $correo, $nombre, $apellidos, $edad){
		global $mysqli;
		$err = 0;
		$query="UPDATE usuario SET contrasena = '$contrasena' AND correo = '$correo' AND nombre = '$nombre' AND apellidos = '$apellidos' AND edad = '$edad' WHERE nick = '$nick'";
		$resultado=$mysqli->query($query) or $err = 1;
		
		return $err;
	}

	function insertarUsuarioX(){
		global $mysqli;
		$err = 0;
		$query="INSERT INTO usuarios (Nick, Contrasena, Correo, Nombre, Apellidos, Edad, Avatar, Tipo) VALUES ('a', 'quetal', 'serg@gmail.com', 'serhio', 'gonz', '15', null, 'usuario')";
		//$resultado=$mysqli->query($query) or die('Correo electrónico ya en uso, inténtelo con otro');
		$resultado= $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
		return $err;
	}
	
	function buscarNick($nick){
	global $mysqli;
	$query="SELECT * FROM usuarios WHERE Nick = '$nick'";
	$resultado= $mysqli->query($query) ;
	$numregistros=$resultado->num_rows;
	if($numregistros == 1) return true;
	else return false;
	}

?>
