<?php
require_once(__DIR__."/config.php");

/*
bind_param recibe un primer parametro que tendra s por cada string(date es string) e i por cada integer
*/
function addPeticionEvento($nombre, $descripcion, $fecha, $precio, $imagen, $plazasDisponibles, $tipo, $promotor,$activo){

	global $mysqli;

	$args = array($nombre, $descripcion, $fecha, $precio, $imagen, $plazasDisponibles, $tipo, $promotor,$activo);
	sanitizeArgs($args);
	
	$pst = $mysqli->prepare("INSERT INTO eventos VALUES('', ?, ?, ?, ?, ?, ?, ?, ?, ?);");
	$pst->bind_param("sssisiisi",$args[0],$args[1],$args[2],$args[3],$args[4],$args[5],$args[6],$args[7],$args[8]);
	$pst->execute();
	$pst->close();

}

function getInfoEvento($idEvento){
	global $mysqli;

	$args = array($idEvento);
	sanitizeArgs($args);

	$arr = null;
	$pst = $mysqli->prepare("SELECT * FROM eventos WHERE ID = ?;");
	$pst->bind_param("i",$args[0]);

	$pst->execute();
	while($row = $pst->get_result()){
		$arr = $row->fetch_array(MYSQLI_ASSOC);
	}
	print_r($arr);
	
	$pst->close();
	return $arr;
}

/*En funcion de si la llama un admin o un promotor se llama con unos parametros u otros, un admin puede cambiar activo*/
function updateEvento($id, $nombre,$descripcion,$fecha,$precio,$imagen,$plazas,$promotor,$activo){

	global $mysqli;

	$args = array($nombre,$descripcion,$fecha,$precio,$imagen,$plazas,$activo,$id);
	sanitizeArgs($args);

	$pst = $mysqli->prepare("UPDATE eventos set Nombre = ?,Descripcion = ?,Fecha = ?, Precio = ?, Imagen = ?, PlazasDisponibles = ?, Activo = ? WHERE ID = ?;");
	$pst->bind_param("sssisiii",$args[0],$args[1],$args[2],$args[3],$args[4],$args[5],$args[6],$args[7]);
	$pst->execute();
	$pst->close();

}

?>