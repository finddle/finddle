<?php 
require_once(__DIR__.'/eventosBD.php');
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$precio = $_POST['precio'];
$promotor = $_POST['promotor'];
editarEventoAdmin($id, $nombre, $descripcion, $fecha, $precio, $promotor);
echo true;
?>