<?php
require('eventosBD.php');
$tipo = $_GET['tipo'];
$eventos = getEventos($tipo);
echo json_encode($eventos);
?>