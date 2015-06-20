<?php
require_once(__DIR__."/config.php");

/*Añade un evento nuevo a la base de datos, si lo añade un promotr se llama a esta funcion con activo=0*/
function addPeticionEvento($nombre, $descripcion, $fecha, $precio, $imagen, $plazasDisponibles, $tipo, $promotor,$activo){
	global $mysqli;

	$args = array($nombre, $descripcion, $fecha, $precio, $imagen, $plazasDisponibles, $tipo, $promotor,$activo);
	sanitizeArgs($args);
	
	$pst = $mysqli->prepare("INSERT INTO eventos VALUES('', ?, ?, ?, ?, ?, ?, ?, ?, ?);");
	$pst->bind_param("sssisiisi",$args[0],$args[1],$args[2],$args[3],$args[4],$args[5],$args[6],$args[7],$args[8]);
	$pst->execute();
	$pst->close();

}

/*Cuenta el numero de eventos que hay de un tipo determinado por el parametro. 
Función empleada para la paginación de tipo scroll infinito.*/
function countEventos($tipo){
	global $mysqli;

	$args = array($tipo);
	sanitizeArgs($args);

	$pst = $mysqli->prepare("SELECT COUNT(*) AS nEventos FROM eventos WHERE Tipo = ? ;");
	$pst->bind_param("i",$args[0]);

	$pst->execute();
	$result = $pst->get_result();
	$row = $result->fetch_array(MYSQLI_ASSOC);

	$pst->close();
	return $row['nEventos'];
}

/*Devuelve los eventos de un tipo concreto (fiestas o cine) ordenados por fecha. Se limita el 
numero de resultados para implementar la paginacion de tipo scroll infinito(3 eventos por peticion)*/
function getEventos($tipo){
	global $mysqli;
	$off = 0;
	$pag_size = PAG_SIZE;
	$eventos = null;

	if (session_status() == PHP_SESSION_NONE) {
   		session_start();
	}
	
	if(!isset($_SESSION['offset'])){
		$_SESSION['offset'] = 0;
	}else{
		$off = $_SESSION['offset'];
		$off = $off + 3;
		$_SESSION['offset'] = $off; 
	}	
	
	$args = array($tipo);
	sanitizeArgs($args);

	$pst = $mysqli->prepare("SELECT * FROM eventos WHERE Tipo = ? ORDER BY Fecha DESC LIMIT ? , ?;");
	$pst->bind_param("iii",$args[0],$off,$pag_size);

	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$eventos[] = $row;
	}
	
	$pst->close();
	return $eventos;
}

/*Obtiene la información de un evento determinado por el parámetro*/
function getInfoEvento($idEvento){
	global $mysqli;

	$args = array($idEvento);
	sanitizeArgs($args);

	$evento = null;
	$pst = $mysqli->prepare("SELECT * FROM eventos WHERE ID = ?;");
	$pst->bind_param("i",$args[0]);

	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$evento = $row;
	}
	
	$pst->close();
	return $evento;
}



/* Actualiza un evento con un determinado ID con la información recibida en la función. En funcion de si 
la llama un admin o un promotor se llama con unos parametros u otros, un admin puede cambiar activo*/
function updateEvento($id, $nombre,$descripcion,$fecha,$precio,$imagen,$plazas,$promotor,$activo){

	global $mysqli;

	$args = array($nombre,$descripcion,$fecha,$precio,$imagen,$plazas,$activo,$id);
	sanitizeArgs($args);

	$pst = $mysqli->prepare("UPDATE eventos set Nombre = ?,Descripcion = ?,Fecha = ?, Precio = ?, Imagen = ?, PlazasDisponibles = ?, Activo = ? WHERE ID = ?;");
	$pst->bind_param("sssisiii",$args[0],$args[1],$args[2],$args[3],$args[4],$args[5],$args[6],$args[7]);
	$pst->execute();
	$pst->close();

}

function procesarBusqueda($search){
	global $mysqli;
	
	$userActual = null;
	if(isset($_SESSION['username']))
		$userActual = $_SESSION['username'];

	$args = array("%".$search."%");
	sanitizeArgs($args);
	
	$info = null;
	$pst = $mysqli->prepare("SELECT ID, Nombre FROM eventos WHERE Nombre LIKE ?")  or trigger_error($mysqli->error);
	$pst->bind_param("s", $args[0]);
	
	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$info[] = $row;
	}
	$pst->close();

	$pst = $mysqli->prepare("SELECT Nick FROM usuarios WHERE Nick <> ? AND Nick LIKE ?")  or trigger_error($mysqli->error);
	$pst->bind_param("ss", $userActual, $args[0]);
	
	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$info[] = $row;
	}
	$pst->close();
	return $info;
}

?>