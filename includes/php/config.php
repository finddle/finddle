<?php
define('BD_HOST', 'localhost');
define('BD_NAME', 'finddle');
define('BD_USER', 'root');
define('BD_PASS', '');

define('ROOT_DIR',$_SERVER['SERVER_NAME'].'/finddle');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
$mysqli->set_charset("utf8");
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

function cierraConexion() {
  // Sólo hacer uso de global para cerrar la conexion !!
  global $mysqli;
  if ( isset($mysqli) && ! $mysqli->connect_errno ) {
    $mysqli->close();
  }
}
?>