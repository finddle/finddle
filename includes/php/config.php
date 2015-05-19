<?php
$mysqli = new mysqli("localhost", "root", "", "finddle");
if ( mysqli_connect_errno() ) {
	echo "Error de conexión a la BD: ".mysqli_connect_error();
	exit();
}
?>