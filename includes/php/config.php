<?php
$mysqli = new mysqli("localhost", "root", "", "finddle");
if ( mysqli_connect_errno() ) {
	echo "Error de conexión a la BD: ".mysqli_connect_error();
	exit();
}
function sanitizeArgs(&$args) {
	global $mysqli;
	for($i=0; $i < count($args); $i++){
		//Escapar y eliminar posibles inyecciones de html
		$args[$i] = mysqli_real_escape_string($mysqli, $args[$i]);
		$args[$i] = htmlspecialchars_decode(trim(strip_tags(stripslashes($args[$i]))));
	}
}
?>