<?php 
	require_once(__DIR__.'/config.php');
?>

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
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php 
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
              if(isset($_SESSION['username'])){
                echo ''.$_SESSION['username'].'<a href="'.ROOT_DIR.'/perfilUsuario.php"><img  id="userPhoto" src="'.ROOT_DIR.'/'.$_SESSION['picture'].'"/></a>';
                echo '<li><a href="'.ROOT_DIR.'/includes/php/logout.php">Logout</a></li>';
              }else{
                echo '<li><a href="'.ROOT_DIR.'/login.php">Ingresar</a></li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</div>
<!--Fin Cabecera-->