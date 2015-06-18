<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/usuariosBD.php';

$nick = $_GET['user'];
echo buscarNick($nick);
?>