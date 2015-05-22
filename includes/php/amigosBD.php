<!--HACER QUE EL USUARIO DEL LOGIN SEA EL QUE SE HA CONECTADO-->


<?php
		require_once(__DIR__."/config.php");
		
		function getAmigos($user){
			global $mysqli;
			$login= mysqli_real_escape_string($mysqli,$user);
			$query= "SELECT NickUsuario1 FROM amigos WHERE NickUsuario2 = '$login'
					UNION 
					SELECT NickUsuario2 FROM amigos WHERE NickUsuario1 = '$login'";
			$resultado=$mysqli->query($query)
				or die ($mysqli->error. " en la línea ".(__LINE__-1));
			
			while ($registro = $resultado->fetch_assoc()) {
				echo "<tr>";
				foreach ($registro as $campo)
					echo "<td>",$campo, "</td></br>";
				echo "</tr>";
				echo "<br>";
			}
			
			//liberar memoria
			$resultado->free();
		}
		
	?>