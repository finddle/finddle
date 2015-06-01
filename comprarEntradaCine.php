<!DOCTYPE html>
<html>
<head>
  <title>Finddle</title>
  <meta charset="utf-8" />
  <!-- Latest compiled CSS -->
  <link rel="stylesheet" type="text/css" href="includes/css/bootstrap.css">
  <!-- Optional theme -->
  <link rel="stylesheet" type="text/css" href="includes/css/bootstrap-theme.min.css">
  <!-- Personal CSS -->
  <link rel="stylesheet" type="text/css" href="includes/css/mycss.css">
  <link rel="stylesheet" type="text/css" href="includes/css/entradasCine.css">
  <link rel="stylesheet" type="text/css" href="includes/css/formularios.css" />
  <!--Favicon-->
  <link rel="shortcut icon" href="includes/img/favicon.png" />
</head>
<body>
<?php 
    require(__DIR__.'/includes/php/header.php');  
    require(__DIR__.'/includes/php/comprasBD.php');
    require(__DIR__.'/includes/php/eventosBD.php');
    require(__DIR__.'/includes/php/asisteBD.php');
?>
  <div class="main">
    <div class="container">
      <div class="sidebar-left container-fixed col-xs-4 col-sm-4  col-md-2">
        <!-- Barra lateral izquierda -->
      </div>
      <div class="container-fixed col-xs-8 col-sm-8 col-md-10">
        <h1><img src="includes/img/cinemal.png"/> Elige tus asientos  <img src="includes/img/cinema.png"/></h1>
        
         <?php 
         	$evento = getInfoEvento($_GET['evento']);
          $_SESSION['compra']['precioEntrada'] = $evento['Precio'];
          $_SESSION['compra']['evento'] = $evento['ID'];
         	$butacas =  getButacasOcupadas($evento['ID']);
          $_SESSION['compra']['capacidad'] = $evento['PlazasDisponibles'];
          $_SESSION['compra']['nAsistentes'] =  count($butacas);
            $n = 1;
         		echo '<div id ="cuadroButacas">';
            for($i = 1; $i<=10; $i++){
              echo '<p>';
              for($j = 1; $j<=15; $j++){
                if(isset($butacas[$n])){
                  echo '<button class="butacaOcupada" disabled="NO" id="button_'.$n.'"><img id="img_'.$n.'" src="includes/img/seat-full.png"/></button>';  
                }else{
                  echo '<button class="butacaLibre" id="button_'.$n.'" on="0"><img id="img_'.$n.'" src="includes/img/seat-empty.png"/></button>';
                }
                $n++;
              }
              echo '</p>';
           	}
          echo '</div>';
          echo '<p class="spacer"id="precio" value="'.$evento['Precio'].'">Precio/entrada: '.$evento['Precio'].'€</p>';
          echo '<p class="spacer">Butacas seleccionadas: <ul id="listaSelected"></ul></p>';
         ?>
         <a href="#" class="myButton"id="procesaCompra">Confirmar</a>
      </div>
      <div class="clearfix visible-xs-block visible-sm-block"></div>
      <div class="sidebar-right container-fixed col-xs-4 col-sm-4 ">
      </div>
    </div>
  </div>
  <?php require(__DIR__.'/includes/php/footer.php');?>
  <script src="includes/js/jquery.min.js"></script>
  <script src="includes/js/bootstrap.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    var butacasSeleccionadas = [];
    var precio = $('#precio').attr("value");


    $('.butacaLibre').click(function(){
      var id = $(this).attr("id").substring("button_".length);
      var on = $(this).attr("on");
      if(on == 0){
        $(this).attr("on", "1");
        $('#listaSelected').append("<li id="+id+">"+id+"</li>");
        butacasSeleccionadas.push(id);
        $("#img_"+id).attr("src","includes/img/seat-selected.png");
      }else{
        $(this).attr("on", "0");
        $("#"+id).remove();
         butacasSeleccionadas.splice(butacasSeleccionadas.indexOf(id), 1);
        $("#img_"+id).attr("src","includes/img/seat-empty.png");
      }
      if(butacasSeleccionadas.length>0)
        $("#precio").html("Precio total: "+butacasSeleccionadas.length*precio+"€");
      else
        $("#precio").html("Precio/entrada: "+precio+"€");

    });

    $('#procesaCompra').click(function(){
    if(butacasSeleccionadas.length>0){
      $.post("includes/php/procesaCompra.php", 
      {
        Butacas : butacasSeleccionadas,
        NumEntradas : butacasSeleccionadas.length,
      },
      function(data) {
        if(data == true){
          /* http + // + hostname + /finddle/ + page*/
          var url = location.protocol + '//' + location.host +
          "/finddle/perfilUsuario.php";
          window.location = url;

        }else{
          alert("Ha habido un error con el procesamiento de su compra, intentalo de nuevo o contacta con un administrador.");
        }
      });  
    }else{
      alert("Es necesario seleccionar al menos una butaca");
    }
    
    });

  });

  </script>
</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>