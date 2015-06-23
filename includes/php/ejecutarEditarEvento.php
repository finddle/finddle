<?php 
require_once(__DIR__.'/eventosBD.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$promotor = $_POST['promotor'];
editarEventoAdmin($id, $nombre, $descripcion, $precio, $promotor);
echo true;
?>