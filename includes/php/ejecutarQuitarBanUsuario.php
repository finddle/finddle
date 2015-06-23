<?php 
require_once(__DIR__.'/usuariosBD.php');
$user = $_POST['user'];
$rol = $_POST['rol'];
quitarBanUsuario($user,$rol);
echo true;
?>