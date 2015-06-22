<?php require_once(__DIR__.'/includes/php/config.php');?>
<!DOCTYPE html>
<html>
	<head>
		  <title>Finddle</title>
        <meta charset="utf-8" />
		<link rel="shortcut icon" href="includes/img/favicon1.png" />
		 <!-- Latest compiled CSS -->
		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
		<!-- Optional theme -->
		<link rel="stylesheet" type="text/css" href="includes/css/bootstrap-theme.min.css">
		<!-- Personal CSS -->
		<link rel="stylesheet" type="text/css" href="includes/css/mycss.css">
		<link rel="stylesheet" type="text/css" href="includes/css/tablas.css">
		<script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
    	<script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
	</head>
	
	<body>
		<?php require(__DIR__.'/includes/php/header.php');?>
		<div class="main">
		<div class="container">
		  <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
			<ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
			
			<?php
				if(isset($_SESSION['username'])){
			?>
		
				  <li role="presentation"><a href="nuevoMensaje.php">Nuevo Mensaje</a></li>
				  <li role="presentation"><a href="mensajesBandeja.php">Bandeja de entrada</a></li>
				  <li role="presentation" class="active"><a href="mensajesEnviados.php">Mensajes enviados</a></li>
				</ul>
			  </div>
			  <div id="contenidoPrincipal" class="container-fixed col-xs-8 col-sm-8 col-md-8">
			<table>
				<thead>
				<tr><th colspan="3">Mensajes enviados</th></tr>
				<tr>
				  <th>Nick</th>
				  <th colspan="2">Fecha</th>
				</tr>
				</thead>
			
			<?php
				require(__DIR__.'/includes/php/mensajes.php');
				$result = conseguirMensajesEnviados();
				echo'<tbody>';
				if(count($result) > 0){
				   foreach($result as $res){
					echo '<tr>
					  <td>'.$res['NickReceptor'].'</td>
					  <td>'.$res['Fecha'].'</td>
					  <td>
						<a href= abrirMensajeEnviado.php?mensaje='.$res["ID"].' class="btn btn-default">Ver mensaje</a>
					  </td>
					</tr>';
					}
				}
				echo'</tbody>';
			}else
				echo "<p>No eres un usuario logeado.</p>";
		?>
		</table>
		</div>
		<div class="clearfix visible-xs-block visible-sm-block"></div>
		<div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3"></div>
		</div>
	</div>	
	
	<?php require(__DIR__.'/includes/php/footer.php');?>
</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>