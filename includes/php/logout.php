<?php
/*Este script se encarga de hacer el logout de un usuario
(destruye la sesión y redirige a index.php*/
require_once(__DIR__.'/config.php');
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
	}
	if(isset($_SESSION['username'])) {
		session_destroy();
	}
	header("Location: /finddle/index.php");
?>