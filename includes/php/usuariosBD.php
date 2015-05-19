<?php
require_once(__DIR__."/config.php");

$login= mysqli_real_escape_string($mysqli,"Eljefe");
$query= "SELECT * FROM usuarios WHERE Nick = '$login'";
$resultado=$mysqli->query($query)
or die ($mysqli->error. " en la línea ".(__LINE__-1));
print_r($resultado->fetch_assoc());

?>
