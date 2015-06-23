<?php require_once(__DIR__.'/includes/php/config.php');?>
<?php require_once(__DIR__.'/includes/php/eventosBD.php');?>
<!DOCTYPE html>
<html>
  <head>
    <title>Finddle</title>
    <meta charset="UTF-8">
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
<body>
  <?php require(__DIR__.'/includes/php/header.php');?>
  <!--Inicio Contenido-->
  <div class="main">
    <div class="container">
      <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
          <li role="presentation" class="active"><a href="<?= ROOT_DIR?>/administrar/eventos">Gestión de eventos</a></li>
          <li role="presentation"><a href="<?= ROOT_DIR?>/administrar/usuarios">Gestión de usuarios</a></li>
        </ul>
      </div>
      <div class="container-fixed col-xs-8 col-sm-8 col-md-9">


        <div class="table table-responsive table table-hover"> <!--Fin Contenido-->
          <table class="table">
           <thead>
                <tr>              
                  <th>Id</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Fecha</th>
                  <th>Precio</th>
                  <th>Tipo</th>
                  <th>Promotor</th>
                  <th>Activo</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              
              <?php 
              $eventos = getEventosAdmin();
                foreach ($eventos as $evento) {

                  
                  echo '<tr id="r_'.$evento['ID'].'">';
                  echo '<td>'.$evento['ID'].'</td>';
                  echo '<td><input class="middleInput" text="submit" disabled ="true" name="role" id="nombreEvento" value="'.$evento['Nombre'].'"/></td>';
                  echo '<td><input class="largeInput" text="submit" disabled ="true" name="role" id="descripcionEvento" value="'.$evento['Descripcion'].'"/></td>';
                  echo '<td><input class="middleInput" text="submit" disabled ="true" name="role" id="fechaEvento" value="'.$evento['Fecha'].'"/></td>';
                  echo '<td><input class="extraSmallInput" text="submit" disabled ="true" name="role" id="precioEvento" value="'.$evento['Precio'].'"/></td>';
                  
                  if($evento['Tipo'] == 1){
                    echo '<td>Cine</td>';
                  }
                  else{
                    echo '<td>Evento</td>';
                  }

                  echo '<td><input class="smallInput" text="submit" disabled ="true" name="role" id="promotorEvento" value="'.$evento['Promotor'].'"/></td>';
                  
                  if($evento['Activo'] == 1){
                    echo '<td>Si</td>';
                  }
                  else{
                    echo '<td>No</td>';
                  }
                  echo '<td><button type="button" class="btn btn-default btn-xs s" id="send_'.$evento['ID'].'"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Guardar</button>';
                  echo     '<button type="button" class="btn btn-default btn-xs x" id="del_'.$evento['ID'].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>';    
                  echo     '<button type="button" class="btn btn-default btn-xs edt" id="edt_'.$evento['ID'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>';
                 if($evento['Activo'] == 1){
                  echo '<button type="button" class="btn btn-default btn-xs da" id="edt_'.$evento['ID'].'"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Desactivar</button></td>';
                  }
                 else{
                  echo '<button type="button" class="btn btn-default btn-xs a" id="edt_'.$evento['ID'].'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Activar</button></td>';
                  }



                  echo '</tr>';
                  }
                

              ?>

              </tbody>
          </table>
      
      </div> 

      <script type = "text/javascript">

      $(function(){

var url= $("#root_app").attr("href");

$(".x").click(function() {
  
  var evento = parseInt($(this).attr("id").substring("del_".length));
  $.post(url+"/includes/php/ejecutarEliminarEvento.php",{id:evento}, function(data){
  if(data){
    console.log("Borrando evento: ", evento);
    location.reload(true);
  }else alert ("Error al borrar evento: ", evento); });
  }); 



$(".a").click(function() {
  
 var evento = parseInt($(this).attr("id").substring("del_".length));
  $.post(url+"/includes/php/ejecutarActivarEvento.php",{id:evento}, function(data){
 if(data){
    console.log("Activando evento: ", evento);
    location.reload(true);
  }else alert ("Error al activar evento: ", evento); });
  }); 

$(".da").click(function() {
  var evento = parseInt($(this).attr("id").substring("del_".length));
  $.post(url+"/includes/php/ejecutarDesactivarEvento.php",{id:evento}, function(data){
 if(data){
    console.log("Desactivando evento: ", evento);
    location.reload(true);
  }else alert ("Error al desactivar evento: ", evento); });
  }); 


$(".s").click(function() {
  var evento = parseInt($(this).attr("id").substring("del_".length));
  var name = $(this).parent().parent().children().children()[0]['value'];
  var description = $(this).parent().parent().children().children()[1]['value'];
  var date = $(this).parent().parent().children().children()[2]['value'];
  var price = parseInt($(this).parent().parent().children().children()[3]['value']);
  var pro = $(this).parent().parent().children().children()[5]['value'];
  
  $.post(url+"/includes/php/ejecutarEditarEvento.php",{id:evento, nombre: name, descripcion: description, fecha: date, precio: price, promotor: pro}, function(data){
if(data)
 location.reload(true);});
  }); 

$(".edt").click(function() {
  var evento = parseInt($(this).attr("id").substring("del_".length));
  $("input").attr("disabled", "disabled");
  $(this).parent().parent().find("input").removeAttr("disabled");
  });

  });
  </script>

        <!-- Contenido aqui -->
      </div>
      <div class="clearfix visible-xs-block visible-sm-block"></div>
      <div class="sidebar-right container-fixed col-xs-4 col-sm-4 col-md-3">
      </div>
    </div>
  </div>
  <!--Fin Contenido-->
  <?php require(__DIR__.'/includes/php/footer.php');?>
</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>