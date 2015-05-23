<?php
	require_once(__DIR__."/config.php");


	function editarUsuario($nick, $contrasena, $correo, $nombre, $apellidos, $edad){
		global $mysqli;
		$err = 0;
		$query = "UPDATE usuarios SET Contrasena='$contrasena', Correo='$correo', Nombre='$nombre', Apellidos='$apellidos', Edad='$edad' WHERE '$nick'='paco';";
		$resultado = $mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
		return $err; 
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
			$info[] = $row;
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

?>
