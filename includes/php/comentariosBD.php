<?php
require_once(__DIR__."/config.php");

function getComentarios($var){
global $mysqli;
$query= "SELECT nickUsuario, Texto FROM Comentarios WHERE IDEvento='$var';";
$resultado=$mysqli->query($query)
	or die ($mysqli->error. " en la línea ".(__LINE__-1));

	while ($registro = $resultado->fetch_assoc()) {
		echo '<div id="comentario">';
				
				echo '<div id="nick">',$registro["nickUsuario"],"   ", "</div>";
				
			
				echo '<div id="texto">',$registro["Texto"], "</div>";
				
		echo "</div>";
		
	}
	
$resultado->free();
}

function commentEvent($user, $event, $comment){

global $mysqli;
$query= "INSERT into Comentarios (NULL, '$user', '$event', '$comment');";
$resultado=$mysqli->query($query)
	or die ($mysqli->error. " en la línea ".(__LINE__-1));
$resultado->free();

}

function eliminarComentario($comment){

global $mysqli;
$query= "DELETE from Comentarios WHERE '$comment"=ID;
$resultado=$mysqli->query($query)
	or die ($mysqli->error. " en la línea ".(__LINE__-1));
$resultado->free();


}



?>