<?php
		require_once(__DIR__."/config.php");
		
		function getEventosUser($user){
			global $mysqli;
			$login = mysqli_real_escape_string($mysqli,$user);
			$query = "SELECT IDEvento FROM asiste WHERE NickUsuario = '$login'";
			$idEventos=$mysqli->query($query);

			
			while ($registro = $idEventos->fetch_assoc()) {
				echo "<tr>";
				foreach ($registro as $campo){
					//<!-- Obtenemos el nombre y foto de cada evento
					$query1 = "SELECT Nombre, Imagen FROM eventos WHERE ID = '$campo'";
						$resultado=$mysqli->query($query1);
						while($registro2 = $resultado->fetch_assoc()){
							echo $registro2["Nombre"], "</br>";
							echo "<img src=",$registro2["Imagen"]," /></br>";
						}
					//Obtenemos el numero de asistentes a dicho evento
					$query2 = "SELECT * FROM asiste WHERE IDEvento = '$campo'";
						$numAsistentes = $mysqli->query($query2)->num_rows;
						echo "Nº asistentes: ",$numAsistentes, "<br>"; 
				}
				echo "</tr>";
				echo "<br>";
			}
			
			
			//liberar memoria
			$idEventos->free();
		}
?>