<?php 
require_once(__DIR__.'/eventosBD.php');
$id = $_POST['id'];
desactivarEvento($id);
echo true;
?>