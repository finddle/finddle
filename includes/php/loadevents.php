<?php
/*Este script se encarga de procesar la petición ajax que se hace para implementar 
el scroll infinito. Se obtienen los eventos a cargar de un tipo determinado y se 
envian mediante JSON como respuesta*/
require_once(__DIR__.'/eventosBD.php');
$tipo = $_GET['tipo'];
$eventos = getEventos($tipo);
echo json_encode($eventos);
?>