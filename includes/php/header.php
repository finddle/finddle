<script type="text/javascript">
function peticionClick(button){
  var tipo = button.attr("accion");
  var user1 = button.attr("user1");
  var user2 = button.attr("user2");

  $.post(root_app+"/includes/php/procesaPeticion.php", 
  {
    accion : tipo,
    userSource : user1,
    userTarget : user2
  },
  function(data) {
    button.parent().remove();
    var nAvisos= $('#notificationLink').attr("data-notifications");
    $('#notificationLink').attr("data-notifications",nAvisos-1);
  });
}
</script>
<?php require_once(__DIR__.'/config.php');?>
<link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/styledrop.css">
<!--Inicio Cabecera-->
<div class="container">
  <header>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a href="<?= ROOT_DIR?>/" id="logofindd"class="navbar-brand"><img src="<?= ROOT_DIR?>/includes/img/finddle-50w.png"/></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?= ROOT_DIR?>/peliculas">Cine</a></li>
            <li><a href="<?= ROOT_DIR?>/fiestas">Fiestas</a></li>
            <?php
            if(isset($_SESSION['username'])&&$_SESSION['rol']=="admin"){
               echo '<li><a href="<?= ROOT_DIR?>/administrar/usuarios">Administrar</a></li>';
             }else if(isset($_SESSION['username'])&&$_SESSION['rol']=="promotor")
               echo '<li><a href="<?= ROOT_DIR?>/promotor">Promotor</a></li>';
            ?>
            <a id="root_app" type="hidden" href="<?= ROOT_DIR?>"></a>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <form class="search" method="get" action="#" >
                <input class="sear" type="text" id="search" placeholder="Buscar..." />
                <ul id="searchResults" class="search-ac" >
                </ul>
              </form>
            </li>
           
            <?php 
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(isset($_SESSION['username'])){
              echo '<a id="notificationLink" href="#" data-container="body" data-toggle="popover" data-placement="bottom"><img src="'.ROOT_DIR.'/includes/img/wbell.png"/></a>';
              echo '<a href="'.ROOT_DIR.'/usuarios/perfil"><img  id="userPhoto" src="'.ROOT_DIR.'/'.$_SESSION['picture'].'"/></a><p class="hide" id="isLogged" user="'.$_SESSION['username'].'">Logeado</p>';
              echo '<li><a href="'.ROOT_DIR.'/includes/php/logout.php">Logout</a></li>';
            }else{
              echo '<li><a href="'.ROOT_DIR.'/login">Ingresar</a></li>';
            }
            ?>
            <div class="hide" id="popoverContent"><p> No hay notificaciones. </p></div>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</div>
<!--Fin Cabecera-->
<script type="text/javascript">
$(function(){
  var root_app = $('#root_app').attr("href");
  //funcionalidad buscador:
  $('#search').keyup(function(){
    var search = $(this).val();

    if(search.length >= 2){
      $('#searchResults').html('<img id="ajaxgif"src="'+root_app+'/includes/img/ajax-loader.gif"/>');
      $.get(root_app+"/includes/php/loadsearch.php?search="+search, function(data){
        if (data != "null") {
          var arrayN = JSON.parse(data);
          var html = "";
          for(var i=0; i<arrayN.length; i++){
            if(typeof arrayN[i]["ID"] != 'undefined'){//isset en javascript
              html += '<li><a href="'+root_app+'/evento/'+arrayN[i]["ID"]+'">Evento <br/><span>'+arrayN[i]["Nombre"]+'</span></a></li>';
            }else{
               html += '<li><a href="'+root_app+'/usuario/'+arrayN[i]["Nick"]+'">Usuario <br/><span>'+arrayN[i]["Nick"]+'</span></a></li>';
            }
          }
        
          $('#searchResults').html(html);          
        }else{
          $('#searchResults').empty();
        }
      });
    }else{
        $('#searchResults').empty();
    }
  });
  //funcionalidad notifiaciones:
  if($('#isLogged').length){//Procesa el codigo solo si estas logeado. Se genera una etiqueta escondida con php si la sesin esta activa para comprobarlo.
    $('#notificationLink').popover(
      {title:"Notificaciones",
      html:true,
      placement: function(){
      //Subo a la parte de arriba de la ventana para que el pop-up se muestre en la posicion correcta en caso de que el scroll se encuentre abajo.
        window.scrollTo(0,0); 
        return "bottom";
      },
      content:function(){
        return $('#popoverContent').html();
      }});
     
    function comprobarAvisos(){
      var nAvisos = 0;
      var html = "";
      var user = $('#isLogged').attr("user");
     
      $.get(root_app+"/includes/php/comprobarNotificaciones.php?user="+user, function(data){
        if (data != "null") {
          var arrayN = JSON.parse(data);
          nAvisos = arrayN.length;
        for(var i=0; i<nAvisos; i++){
          if(typeof arrayN[i]["ID"] != 'undefined'){//isset en javascript
            html += '<div class="notificaciones"><p>  Mensaje de : ' + arrayN[i]['NickEmisor']+'</p>'
         + '<a href="'+root_app+'/mensaje/recibido/'+arrayN[i]["ID"]+'" class="btn btn-default">Responder</a></div>';
          }else{
            html += '<div class="notificaciones"><p> Peticion de amistad: ' +'<a href="'+root_app+'/usuario/'+arrayN[i]['NickUsuario1']+'">'+arrayN[i]['NickUsuario1']+'</a></p>'+
            '<button type="button" accion="aceptar" onclick="peticionClick($(this));" class="peticiones btn btn-default" user1="'+arrayN[i]['NickUsuario1']+'" user2="'+arrayN[i]['NickUsuario2']+'">Aceptar</button>'+
            '<button type="button" accion="rechazar" onclick="peticionClick($(this));" class="peticiones btn btn-default" user1="'+arrayN[i]['NickUsuario1']+'" user2="'+arrayN[i]['NickUsuario2']+'">Rechazar</button></div>';
          }
         
        }
        
        $('#popoverContent').html(html);
        $('#notificationLink').attr("data-notifications",nAvisos);
          
        }else{
          $('#popoverContent').html("<p> No hay notificaciones. </p>");
          $('#notificationLink').removeAttr("data-notifications");
        }
      });
      
    }
    comprobarAvisos();
    setInterval(comprobarAvisos, 5000);
  }
});
</script>