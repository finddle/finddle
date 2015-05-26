<?php
print_r("Saliendo de eventos");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['offset']))
unset($_SESSION['offset']);
?>