<?php
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/comprasBD.php');
require_once(__DIR__.'/asisteBD.php');

/*Recibe los datos de compra , determina si están definidos y hay suficientes entradas libres. En caso de ser un evento tipo cine, en $butacas recibirá un array con las butacas a comprar; y si es fiesta tan solo el número de entradas.*/
function procesaCompra($compra,$usuario,$butacas,$nEntradas){
	$result= [];
	if(isset($compra)&&isset($usuario)&&isset($nEntradas)){
		if($compra['capacidad']>=$compra['nAsistentes']+$nEntradas){
			asisteEvento($usuario,$compra['evento']);
			if(isset($butacas)){
				foreach($butacas as $butaca){
					insertaCompraCine($usuario,$compra['evento'],$nEntradas,$butaca,$compra['precioEntrada']);
				}
				unset($_SESSION['compra']);
				echo true;	
			}
			else{
				insertaCompraFiesta($usuario,$compra['evento'],$nEntradas,$compra['precioTotal']);
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