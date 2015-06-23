<?php require_once(__DIR__.'/includes/php/config.php');?>
<?php require_once(__DIR__.'/includes/php/usuariosBD.php');?>
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
          <li role="presentation" class="active"><a href="<?= ROOT_DIR?>/administrar/usuarios">Gestión de usuarios</a></li>
          <li role="presentation"><a href="<?= ROOT_DIR?>/administrar/eventos">Gestión de eventos</a></li>
          <li role="presentation"><a href="<?= ROOT_DIR?>/evento/crear">Añadir evento</a></li>
        </ul>
      </div>

      <div class="container-fixed col-xs-8 col-sm-8 col-md-9">
        <div class="table table-responsive table table-hover"> <!--Fin Contenido-->
          <table class="table">
           <thead>
                <tr>              
                  <th>Nick</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Edad</th>
                  <th>Correo</th>
                  <th>Tipo</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              
              <?php 
              $usuarios = getUsuarios();
                foreach ($usuarios as $user) {

                  if($user['Nick'] != "UsuarioAnonimo"){
                  echo '<tr id="r_'.$user['Nick'].'">';
                  echo '<td>'.$user['Nick'].'</td>';
                  echo '<td><input class="nombreInput" text="submit" disabled ="true" name="role" id="nombreUsuario" value="'.$user['Nombre'].'"/></td>';
                  echo '<td><input class="apellidosInput" text="submit" disabled ="true" name="role" id="apellidosUsuario" value="'.$user['Apellidos'].'"/></td>';
                  echo '<td><input class="edadInput" text="submit" disabled ="true" name="role" id="edadUsuario" value="'.$user['Edad'].'"/></td>';
                  echo '<td><input class="datosInput" text="submit" disabled ="true" name="role" id="correoUsuario" value="'.$user['Correo'].'"/></td>';
                  echo '<td>'.$user['Tipo'].'</td>';
                  echo '<td><button type="button" class="btn btn-default btn-xs s" id="send_'.$user['Nick'].'"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Guardar</button>';
                      echo '<button type="button" class="btn btn-default btn-xs x" id="del_'.$user['Nick'].'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</button>';
                      if($user['Tipo']!="banned"){
                      echo '<button type="button" class="btn btn-default btn-xs b" id="del_'.$user['Nick'].'"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Banear</button>';
                      }
                      else{
                      echo'<select id ="roles">';
                      echo'<option>usuario</option>';
                      echo'<option>promotor</option>';
                      echo'</select>';

                      echo '<button type="button" class="btn btn-default btn-xs db" id="del_'.$user['Nick'].'"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Quitar Ban</button>';
                      }
                      echo '<button type="button" class="btn btn-default btn-xs edt" id="edt_'.$user['Nick'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button></td>';

                  echo '</tr>';
                  }
                }

              ?>

              </tbody>
          </table>
      
      </div> 
      </div>

      <div class="clearfix visible-xs-block visible-sm-block"></div>
      
    </div>
  </div>
   <script type = "text/javascript">

$(function(){

var url= $("#root_app").attr("href");

$(".x").click(function() {
  var fila=$(this);
  var nick = $(this).attr("id").substring("del_".length);
  console.log("borrando", nick);
  $.post(url+"/includes/php/ejecutarBorradoUsuario.php",{user:nick}, function(data){
 if(data)
 location.reload(true);});
  }); 

$(".db").click(function() {
  var fila=$(this);
  var nick = $(this).attr("id").substring("del_".length);
  var role = $( "#roles option:selected" ).val();
  
  $.post(url+"/includes/php/ejecutarQuitarBanUsuario.php",{user:nick , rol:role}, function(data){
  if(data){
    console.log("quitando Ban", nick);
     location.reload(true);
  }
    else alert("Error al quitar ban", nick);
    });
  }); 

$(".b").click(function() {
  var fila=$(this);
  var nick = $(this).attr("id").substring("del_".length);
  console.log("Baneando", nick);
  $.post(url+"/includes/php/ejecutarBanearUsuario.php",{user:nick}, function(data){
if(data)
 location.reload(true);});
  }); 

$(".s").click(function() {
  var nick = $(this).attr("id").substring("send_".length);
  var name = $(this).parent().parent().children().children()[0]['value'];
  var lastName = $(this).parent().parent().children().children()[1]['value'];
  var age = parseInt($(this).parent().parent().children().children()[2]['value']);
  var mail = $(this).parent().parent().children().children()[3]['value'];
  console.log("enviando", nick);
  $.post(url+"/includes/php/ejecutarEditarUsuario.php",{user:nick, nombre: name, apellidos: lastName, edad: age, correo: mail}, function(data){
if(data)
 location.reload(true);});
  }); 

$(".edt").click(function() {
  var nick = $(this).attr("id").substring("edt_".length);
  $("input").attr("disabled", "disabled");
  $(this).parent().parent().find("input").removeAttr("disabled");
  });

  });
  </script>
  <!--Fin Contenido-->
  <?php require(__DIR__.'/includes/php/footer.php');?>
</body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>