<?php

require_once(__DIR__.'/peticionesBD.php');
$user = $_GET['user'];
$notificaciones = getNotificaciones($user);
echo json_encode($notificaciones);
?>