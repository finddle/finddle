<?php
require_once __DIR__.'/comentariosBD.php';

$id = $_POST['ID'];
eliminarComentario($id);
echo true;

?>