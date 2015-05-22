<?php
	require_once(__DIR__."/config.php");


	function insertarUsuario($nick, $contrasena, $correo, $nombre, $apellidos, $edad){
		global $mysqli;
		$err = 0;

		$query="INSERT INTO usuarios (Nick, Contrasena, Correo, Nombre, Apellidos, Edad, Avatar, Tipo) VALUES ($nick, $contrasena, $correo, $nombre, $apellidos, $edad, , usuario)";
		$resultado=$mysqli->query($query) or die ($mysqli->error. " en la línea ".(__LINE__-1));
		return $err;
	}

	function getInfoUser($nick){
		global $mysqli;
		$query = "SELECT * FROM usuarios WHERE nick = '$nick'";
		$result = $mysqli->query($query);
			while ($registro = $result->fetch_assoc()) {
					//Obtenemos los datos de cada usuario (avatar, nick, nombre, apellidos y edad)
					if(isset($registro["Avatar"]))
						echo "<img src=",$registro["Avatar"]," /></br>";
					else
						echo "<a href='editPerfil.php' id='avatar'><img src='includes/img/usuario.png'/></a></br>";
							
					echo "<h3>", $registro["Nick"], "</h3></br>";
					echo "<p>", $registro["Nombre"], "</p>";
					echo "<p>", $registro["Apellidos"], "</p>";
					echo "<p>", $registro["Edad"], "</p>";
				}
			$result->free();
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
