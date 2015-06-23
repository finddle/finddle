<?php require_once(__DIR__.'/includes/php/config.php');?>
<!DOCTYPE html>
<html>
	<head>
		  <title>Finddle</title>
		  <meta charset="UTF-8">
		 <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/bootstrap.css">
		  <!-- Optional theme -->
		  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/bootstrap-theme.min.css">
		  <!-- Personal CSS -->
		  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/mycss.css">
		  <!--Favicon-->
		<link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/tablas.css">
		<!--Favicon-->
		<link rel="shortcut icon" href="<?= ROOT_DIR?>/includes/img/icon.png" />
		<script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
    	<script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
	</head>
	<body>
	<?php 
    require(__DIR__.'/includes/php/header.php');  
	?>
	<div class="main">
    <div class="container">
      <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
		<?php
			if(isset($_SESSION['username'])){
		?>
          <li role="presentation"><a href="<?= ROOT_DIR?>/mensajes/nuevo">Nuevo Mensaje</a></li>
          <li role="presentation"><a href="<?= ROOT_DIR?>/mensajes/recibidos">Bandeja de entrada</a></li>
          <li role="presentation"><a href="<?= ROOT_DIR?>/mensajes/enviados">Mensajes enviados</a></li>
        </ul>
			  </div>
			  <div id="contenidoPrincipal" class="container-fixed col-xs-8 col-sm-8 col-md-8">
				<table>
		  <thead>
			<tr><th colspan="4">Bandeja de entrada</th></tr>
			<tr>
			  <th> </th>
			  <th>Nick</th>
			  <th colspan="2">Fecha</th>
			</tr>
		  </thead>
				<?php
				require(__DIR__.'/includes/php/mensajes.php');
				$result = conseguirMensajesBandeja();
				echo'<tbody>';
				if(count($result) > 0){
				   foreach($result as $res){
					 if($res['Leido'] == 0){
					  $ruta = ROOT_DIR.'/includes/img/noleido.png';
					  }
					  else{
						$ruta = ROOT_DIR.'/includes/img/leido.png';
					  } 
					echo '<tr>
					 <td><img src='.$ruta.'></td>
					 <td>'.$res['NickEmisor'].'</td>
					  <td>'.$res['Fecha'].'</td>
					  <td><a href="'.ROOT_DIR."/mensaje/recibido/".$res['ID'].'" class="btn btn-default">Ver mensaje</a></td>
					</tr>';
					}
				}
				echo'</tbody>';
			}
			else echo"<h4>No eres un usuario logeado.</h4>";
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