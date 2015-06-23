<?php 
require_once(__DIR__.'/usuariosBD.php');
$user = $_POST['user'];
banearUsuario($user);
echo true;
?>