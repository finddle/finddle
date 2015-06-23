<?php require_once(__DIR__.'/includes/php/config.php');?>
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
  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/formularios.css">
  <!--Favicon-->
  <link rel="shortcut icon" href="<?= ROOT_DIR?>/includes/img/favicon.png" />
  <script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
  <script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
</head>
<?php 
require(__DIR__.'/includes/php/usuarios.php');
    if(isset($_POST['formLogin'])) {
        $result = formLogin($_POST);
    }
?>
<body>
<?php 
    require(__DIR__.'/includes/php/header.php');  
?>

  <!--Inicio Contenido-->
  <div class="main">
    <div class="container">
      <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <!-- Barra lateral izquierda -->
      </div>
      <div class="container-fixed col-xs-8 col-sm-8 col-md-6">
          <section><div class="span-content">            
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="on"> 
                                <h1>Log in</h1> 
                                <?php 
                                    if(isset($result)){
                                        echo '<ul>';
                                        foreach($result as $error){
                                            echo '<li class = "resultError">'.$error.'</li>';
                                        }
                                        echo '</ul>';
                                    }
                                ?>
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Tu nick o correo </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Tu contraseña </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="keeplogin"> 
                                    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
                                    <label for="loginkeeping">No cerrar sesión</label>
                                </p>
                                <input type="hidden" name="formLogin"/>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
                                </p>
                                <p class="change_link">
                                    No eres miembro aun?
                                    <a href="formularioRegistro.php" class="to_register">Unete a nosotros</a>
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>
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