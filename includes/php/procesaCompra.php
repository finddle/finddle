<?php
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/compras.php');
$compra = $_SESSION['compra'];
$usuario = $_SESSION['username'];
$butacas = $_POST['Butacas'];
$nEntradas = $_POST['NumEntradas'];
procesaCompra($compra,$usuario,$butacas,$nEntradas);
?>