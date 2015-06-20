<?php
/*Este script se encarga de procesar la petición ajax que se hace para cargar mas
mensajes de una conversacion con otro usuario. Se obtienen los mensajes de la BD y se 
envian mediante JSON como respuesta*/

require_once(__DIR__.'/mensajesBD.php');
require_once(__DIR__.'/config.php');
$emisor = $_GET['emisor'];
$mensaje = $_GET['mensaje'];
$receptor = $_SESSION['username'];
$mensajes = getConversacion($emisor, $receptor, $mensaje);
echo json_encode($mensajes);
?>