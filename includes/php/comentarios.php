<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/comentariosBD.php';


/*Inserta un comentario a la base de datos y te lleva de nuevo a la página del evento.*/
function comprobarComentario($user, $event, $comment){
	commentEvent($user, $event, $comment);
	header("Location: /finddle/evento/".$event);
	
}


?>