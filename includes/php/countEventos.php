<?php
require_once(__DIR__."/eventosBD.php");
$tipo = $_GET['tipo'];
echo countEventos($tipo);
?>