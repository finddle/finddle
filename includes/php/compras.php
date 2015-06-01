<?php
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/comprasBD.php');

function procesaCompra($compra,$usuario,$butacas,$nEntradas){
	$result= [];
	if(isset($compra)&&isset($usuario)&&isset($nEntradas)){
		if($compra['capacidad']>=$compra['nAsistentes']+$nEntradas){
			if(isset($butacas)){
				foreach($butacas as $butaca){
					insertaCompraCine($usuario,$compra['evento'],$nEntradas,$butaca,$compra['precioEntrada']);
				}
				unset($_SESSION['compra']);
				echo true;	
			}
			else{
				insertaCompraFiesta($usuario,$compra['evento'],$nEntradas,NULL,$compra['precioEntrada']*$nEntradas);
				unset($_SESSION['compra']);
				header("Location: /finddle/perfilUsuario.php");
			}
		}else{
			unset($_SESSION['compra']);
			$result[]="No hay suficientes entradas";
			return $result;
		}
		
	}
	
}
?>