<?php
require_once __DIR__.'/config.php';
require_once __DIR__.'/usuarios.php';

$usuario = $_GET['user'];
$result = buscarUser($user);
if($result == 1) echo true;
else echo false;
?>