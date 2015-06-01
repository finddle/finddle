<?php
require_once(__DIR__."/config.php");

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

function insertaCompraCine($usuario,$evento,$nEntradas,$butaca,$precioEntrada){
	global $mysqli;
	$args = array($usuario,$evento,$nEntradas,$butaca,$precioEntrada);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("INSERT INTO compras VALUES (NULL,?,?,?,?,?);");
	$pst->bind_param("siiid",$args[0], $args[1], $args[2], $args[3], $args[4]);
	$pst->execute();
	$result = $pst->get_result();
	$pst->close();
}

function insertaCompraFiesta($usuario,$evento,$nEntradas,$precioEntrada){
	global $mysqli;
	$args = array($usuario,$evento,$nEntradas,$precioEntrada);
	sanitizeArgs($args);
	$pst = $mysqli->prepare("INSERT INTO compras VALUES (NULL,?,?,?,NULL,?);");
	$pst->bind_param("siid",$args[0], $args[1], $args[2], $args[3]);
	$pst->execute();
	$result = $pst->get_result();
	$pst->close();
}

?>