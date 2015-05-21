<?php
require_once(__DIR__."/config.php");

function addPeticionEvento($nombre, $descripcion, $fecha, $precio, $imagen, $plazasDisponibles, $tipo, $promotor){

global $mysqli;
mysqli_real_escape_string($mysqli, $nombre);
mysqli_real_escape_string($mysqli, $descripcion);
mysqli_real_escape_string($mysqli, $fecha);
mysqli_real_escape_string($mysqli, $precio);
mysqli_real_escape_string($mysqli, $imagen);
mysqli_real_escape_string($mysqli, $plazasDisponibles);
mysqli_real_escape_string($mysqli, $tipo);
mysqli_real_escape_string($mysqli, $promotor);

$query= "INSERT into eventos (NULL, '$nombre', '$descripcion', '$fecha', '$precio', '$imagen', '$plazasDisponibles', '$tipo', '$promotor', 0);";
$resultado=$mysqli->query($query)
	or die ($mysqli->error. " en la línea ".(__LINE__-1));
$resultado->free();

}



?>