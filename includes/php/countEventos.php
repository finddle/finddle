<?php
/*Este script se usa para procesar una petición AJAX que cuenta los 
eventos de un tipo determinado y se manda en las vistas con scroll 
infinito para tener una condición que impida continuar haciendo scroll 
cuando ya se ha llegado al máximo de eventos*/
require_once(__DIR__."/eventosBD.php");
$tipo = $_GET['tipo'];
echo countEventos($tipo);
?>