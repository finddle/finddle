<?php require_once(__DIR__.'/config.php');?>
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
          <a href="<?= ROOT_DIR?>/" class="navbar-brand">FINDDLE</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?= ROOT_DIR?>/cartelera.php">Cine</a></li>
            <li><a href="<?= ROOT_DIR?>/proximosEventos.php">Fiestas</a></li>
            <a id="root_app" type="hidden" href="<?= ROOT_DIR?>"></a>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php 
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if(isset($_SESSION['username'])){
              echo '<a id="notificationLink" data-notifications="1" href="#" data-container="body" data-toggle="popover" data-placement="bottom"><img src="'.ROOT_DIR.'/includes/img/wbell.png"/></a>';
              echo '<a href="'.ROOT_DIR.'/perfilUsuario.php"><img  id="userPhoto" src="'.ROOT_DIR.'/'.$_SESSION['picture'].'"/></a><p class="hide" id="isLogged">Logeado</p>';
              echo '<li><a href="'.ROOT_DIR.'/includes/php/logout.php">Logout</a></li>';
            }else{
              echo '<li><a href="'.ROOT_DIR.'/login.php">Ingresar</a></li>';
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
  if($('#isLogged').length){//Procesa el codigo solo si estas logeado. Se genera una etiqueta escondida para comprobarlo.
    var root_app = $('#root_app').attr("href");
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
      var arrayN;
      $.get(root_app+"/includes/php/comprobarNotificaciones.php", function(data){
        arrayN = JSON.parse(data);
        nAvisos = arrayN.length;
        //..recorrer array rellenando el html..
                for(var i=0; i<arrayN.length; i++){
                  html += '<p> Tienes una notificacion de ' + arrayN[i]['NickUsuario1']+'</p>'
				  + '<p class="login button"><input type="submit" ation = "aceptarPeticion($_SESSION["username"], arrayN[i]["NickUsuario1"])" value="Aceptar"></p>'
				  + '<p class="login button"><input type="submit" ation = "cancelarPeticion($_SESSION["username"], arrayN[i]["NickUsuario1"])" value="Rechazar"></p>';
                }

        if(nAvisos > 0){
          $('#popoverContent').html(html);
          $('#notificationLink').attr("data-notifications",nAvisos);
        }else{
          $('#popoverContent').html("<p> No hay notificaciones. </p>");
          $('#notificationLink').removeAttr("data-notifications");
        }
      });
      
    }
    //setInterval(comprobarAvisos, 5000);

  }
});
</script>
