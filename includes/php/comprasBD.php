<?php
require_once(__DIR__."/config.php");

/*Devuelve un array con las butacas que estan ocupadas como indices, para un evento determinado por parámetro*/
function getButacasOcupadas($idEvento){
	global $mysqli;
	$args = array($idEvento);
	sanitizeArgs($args);
	
	$butacas = null;

	$pst = $mysqli->prepare("SELECT Butacas FROM compras WHERE IDEvento = ?");
	$pst->bind_param("i",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$butacas[$row['Butacas']] = $row['Butacas'];
	}
	
	$pst->close();
	return $butacas;
}

/*Inserta una compra proveniente de un evento de tipo cine*/
function insertaCompraCine($usuario,$evento,$nEntradas,$butaca,$precioEntrada){
	global $mysqli;
	$args = array($usuario,$evento,$nEntradas,$butaca,$precioEntrada);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("INSERT INTO compras VALUES (NULL,?,?,?,?,?);");
	$pst->bind_param("siiid",$args[0], $args[1], $args[2], $args[3], $args[4]);
	$pst->execute();
	$pst->close();
}

/*Inserta una compra proveniente de un evento de tipo fiesta(la butaca se inserta a NULL)*/
function insertaCompraFiesta($usuario,$evento,$nEntradas,$precioEntrada){
	global $mysqli;
	$args = array($usuario,$evento,$nEntradas,$precioEntrada);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("INSERT INTO compras VALUES (NULL,?,?,?,NULL,?);");
	$pst->bind_param("siid",$args[0], $args[1], $args[2], $args[3]);
	$pst->execute();
	$pst->close();
}

/*Cuenta el numero de asistentes de un evento determinado por id. Recibe tambien el tipo 
de evento como parametro debido a que en los eventos de tipo cine se almacena una fila 
por cada butaca, y en los otros tan solo NumEntradas*/
function countAsistentes($idEvento, $tipo){
	global $mysqli;
	$args = array($idEvento);
	sanitizeArgs($args);
	$asistentes = null;

	if($tipo == 0){//fiestas
		$sql = "SELECT SUM(NumEntradas) AS nAsistentes FROM compras WHERE IDEvento = ?";
	}else{//cine
		$sql = "SELECT COUNT(*) AS nAsistentes FROM compras WHERE IDEvento = ?";
	}
	
	$pst = $mysqli->prepare($sql);
	$pst->bind_param("i",$args[0]);
	$pst->execute();
	$result = $pst->get_result();
	while($row = $result->fetch_array(MYSQLI_ASSOC)){
		$asistentes = $row;
	}

	$pst->close();
	return $asistentes["nAsistentes"];
}
?>