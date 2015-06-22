<?php
/*Este php se usa para procesar la llamada AJAX que se hace periodicamente
 en el header.php, es decir en todas las paginas, para comprobar si un usuario 
 tiene notificaciones pendientes(peticiones de amistad o mensajes privados)*/
require_once(__DIR__.'/peticionesBD.php');
$user = $_GET['user'];
$notificaciones = getNotificaciones($user);
echo json_encode($notificaciones);
?>