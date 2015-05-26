<?php
require("eventosBD.php");
$tipo = $_GET['tipo'];
echo countEventos($tipo);
?>