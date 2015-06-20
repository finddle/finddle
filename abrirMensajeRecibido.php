<?php require_once(__DIR__.'/includes/php/config.php');?>
<!DOCTYPE html>
<html>
    <head>
        <title>Finddle</title>
        <meta charset="utf-8" />
		<!-- Latest compiled CSS -->
		  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/bootstrap.css">
		  <!-- Optional theme -->
		  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/bootstrap-theme.min.css">
		  <!-- Personal CSS -->
		  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/mycss.css">
		  <!--Favicon-->
		  <link rel="shortcut icon" href="<?= ROOT_DIR?>/includes/img/favicon.png" />
			<script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
			<script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
    </head>
	
	<?php 
		require(__DIR__.'/includes/php/mensajes.php');
		if(isset($_POST['formRespuesta'])) {
		print_r($_POST);
		$respuesta = responderFormMensaje($_POST);
		}
	?>
	
	<?php
		
	?>
	<body>
		<?php 
			require(__DIR__.'/includes/php/header.php');  
		?>
	 <div class="main">
     <div class="container">
	  <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
          <li role="presentation"><a href="nuevoMensaje.php">Nuevo Mensaje</a></li>
          <li role="presentation"><a href="mensajesBandeja.php">Bandeja de entrada</a></li>
          <li role="presentation"><a href="mensajesEnviados.php">Mensajes enviados</a></li>
        </ul>
      </div>
	  <div id="contenidoPrincipal" class ="container-fixed col-xs-8 col-sm-8 col-md-6">
	  <p id="loadButton"><a id="loadMore" class="glyphicon glyphicon-refresh" aria-label="Cargar anteriores"></a></p>
	  <div id="loadgif"></div><div id="loadMessages"></div>
	  <?php
		$mensaje = $_GET['mensaje'];
		modificarMensajeLeido($mensaje);
		$result = abrirMensaje($mensaje);
		if(isset($_SESSION['offsetm'])){
            unset($_SESSION['offsetm']);
      	}
	  echo '<div id="comentario">'. '<p class="mHeader"><strong>De:</strong> '.$result['NickEmisor'];
	  echo ' <strong>Titulo: </strong>'.$result['Titulo'].'<strong> Fecha: </strong>'.$result['Fecha'].'</p> ';
	  echo '<p><strong>Contenido: </strong></p><p>'.$result['TextoMensaje'].'</p></div>';	  
	  ?>
	  <form class="mForm" method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		  <input type="text" name="titulo" placeholder='Titulo' required>
		  <textarea name="mensaje" cols="70" rows="4" autofocus placeholder='Respuesta' required></textarea>
		  <input type="hidden" name="formRespuesta"/>
		  <?php echo '<input type="hidden" id="idEmisor" name="emisor" value="'.$result['NickEmisor'].'" msg="'.$result['ID'].'"/> '?>
		  <input type="submit"/> 
	  </form>
<script type="text/javascript">
$(document).ready(function(){

	var root_app = $('#root_app').attr("href");
	var emisor = $('#idEmisor').attr("value");
	var idMensaje = parseInt($('#idEmisor').attr("msg"));
	var user = $('#isLogged').attr("user");

	$('#loadMore').click(function(){
		$('#loadgif').html('<img src="'+root_app+'/includes/img/ajax-loader.gif"/>');
		
		$.get(root_app+"/includes/php/loadmessages.php?emisor="+emisor+"&mensaje="+idMensaje, function(data){
		    if (data != "null") {
		        var result = JSON.parse(data);
		        var htmlMensajes = "";
		        for(var i=0; i<result.length; i++){
		        	if(result[i]['NickEmisor']==user){
		        		var titulo = result[i]['Titulo'];
		        		if(titulo==null){
		        			titulo = "";
		        		}
		        		htmlMensajes += '<div id="comentario" class="misMensajes">'+ '<p class="mHeader"><strong>Yo</strong> ,'
				          +'<strong> Titulo: </strong>'+titulo+'<strong> Fecha: </strong>'+result[i]['Fecha']
				          +'</p><p><strong>Contenido: </strong></p><p>'+result[i]['TextoMensaje']+'</p></div>';
		        	}else{
		        		htmlMensajes += '<div id="comentario">'+ '<p class="mHeader"><strong>De:</strong> '+result[i]['NickEmisor']
				          +'<strong> Titulo: </strong>'+titulo+'<strong> Fecha: </strong>'+result[i]['Fecha']
				          +'</p><p><strong>Contenido: </strong></p><p>'+result[i]['TextoMensaje']+'</p></div>';
		        	}
		          
		        }
		        $("#loadMessages").prepend(htmlMensajes);
		    }else{
		    	$('#loadButton').html('<p> No hay mas mensajes de este usuario. </p>');
		    }
			$('#loadgif').empty();
		});
		
	});

});
</script>
	<?php 
			require(__DIR__.'/includes/php/footer.php');
		?>
		</div>
	  <div class="clearfix visible-xs-block visible-sm-block"></div>
      <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
      </div>
		 </div>
	  </div>
	</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>