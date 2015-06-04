<?php
/*Este script sirve para inicializar constantes usadas por la aplicación y la conexión de la base de datos. */
define('BD_HOST', 'localhost');
define('BD_NAME', 'finddle');
define('BD_USER', 'root');
define('BD_PASS', '');
define('PAG_SIZE',3);
define('PIMIENTA', '0AsDfMoViE0');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$mysqli = new mysqli(BD_HOST, BD_USER, BD_PASS, BD_NAME);
$mysqli->set_charset("utf8");
if ( mysqli_connect_errno() ) {
	echo "Error de conexión a la BD: ".mysqli_connect_error();
	exit();
}
/*Esta función recibe por referencia un array de argumentos y les aplica una serie de funciones en orden(escapa caracteres especiales, elimina caracteres especiales html, espacios, etiquetas especiales php y html, y elimina slashes). Es llamada por las funciones de **tablaX**BD.php para sanear los argumentos a insertar/consultar/updatear.*/
function sanitizeArgs(&$args) {
	global $mysqli;
	for($i=0; $i < count($args); $i++){
		//Escapar y eliminar posibles inyecciones de html
		$args[$i] = mysqli_real_escape_string($mysqli, $args[$i]);
		$args[$i] = htmlspecialchars_decode(trim(strip_tags(stripslashes($args[$i]))));
	}
}

/*Esta función es llamada por cleanup.php para cerrar el objeto $mysqli*/
function cierraConexion() {
  global $mysqli;
  if ( isset($mysqli) && ! $mysqli->connect_errno ) {
    $mysqli->close();
  }
}
?>