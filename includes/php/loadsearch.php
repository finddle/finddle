<?php
/*Este script se encarga de procesar la petición ajax que se hace para realizar 
una busqueda. Se obtienen los usuarios/eventos de la BD y se vian mediante JSON 
como respuesta*/
require_once(__DIR__.'/eventosBD.php');
$search = $_GET['search'];
$busqueda = procesarBusqueda($search);
echo json_encode($busqueda);
?>