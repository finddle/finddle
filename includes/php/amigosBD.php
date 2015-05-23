<!--HACER QUE EL USUARIO DEL LOGIN SEA EL QUE SE HA CONECTADO-->


<?php
		require_once(__DIR__."/config.php");
		
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
		
	?>