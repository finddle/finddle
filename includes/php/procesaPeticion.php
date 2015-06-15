<?php
require_once(__DIR__.'/peticionesBD.php');
$user1 = $_POST["userSource"];
$user2 = $_POST["userTarget"];
$accion = $_POST["accion"];

if(isset($user1)&&isset($user2)&&isset($accion)){
	if($accion == "aceptar"){
		aceptarPeticion($user1,$user2);
	}elseif ($accion == "rechazar") {
		cancelarPeticion($user1,$user2);
	}
}else{
	echo "Ha habido un error aceptando o rechazando la peticion";
}

?>