<?php 
	require_once('config.php');
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
          <a href="index.php" class="navbar-brand">FINDDLE</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="cartelera.php">Cine</a></li>
            <li><a href="proximosEventos.php">Fiestas</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php 
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            
              if(isset($_SESSION['username'])){
                echo '<li>'.$_SESSION['username'].'<a href="perfilUsuario.php"><img  id="userPhoto" src="'.$_SESSION['picture'].'"/></a></li>';
                echo '<li><a href="includes/php/logout.php">Logout</a></li>';
              }else{
                echo '<li><a href="login.php">Ingresar</a></li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</div>
<!--Fin Cabecera-->