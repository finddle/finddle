<?php
/*Este php se usa para procesar una llamada AJAX desde formularioRegistro.php 
que comprueba si un nombre de usuario esá disponible con el evento change de jQuery*/
require_once __DIR__.'/config.php';
require_once __DIR__.'/usuariosBD.php';

$nick = $_GET['user'];
echo buscarNick($nick);
?>