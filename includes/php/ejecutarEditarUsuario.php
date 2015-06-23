<?php 
require_once(__DIR__.'/usuariosBD.php');
$user = $_POST['user'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$correo = $_POST['correo'];
editarUsuarioAdmin($user, $nombre, $apellidos, $edad, $correo);
echo true;
?>