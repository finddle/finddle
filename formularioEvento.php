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
    <script type="text/javascript" src="includes/js/utils.js"></script>
    </head>
	
	<?php 
		require(__DIR__.'/includes/php/eventosBD.php');
		if(isset($_POST['formRegistroEvento'])) {
			$result = comprobarFormularioEvento($_POST, $_FILES, $_SESSION["rol"]);
		}
	?>
	
	<body>
		<?php require(__DIR__.'/includes/php/header.php'); ?>
	
        <div class="span-content"></div>
		  <div class="container">
		  <div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
          <li role="presentation"><a href="<?= ROOT_DIR?>/promotor">Ver eventos propios</a></li>
          <li role="presentation" class="active"><a href="<?= ROOT_DIR?>/evento/crear">Añadir eventos</a></li>
        </ul>
      </div>
      <?php if(isset($_SESSION['username']) && (($_SESSION['rol']=="promotor")||($_SESSION['rol']=="admin"))){?>
		  <section>				
                <div id="container_demo">
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method = "POST" enctype='multipart/form-data' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                                <h1>Formulario de Registro de Evento</h1>
								<?php 
									if(isset($result)){
										echo '<ul>';
										foreach($result as $error){
										if($error == "Evento creado correctamente"){
											echo '<li class = "resultOk">'.$error.'</li>';
										} else {
											echo '<li class = "resultError">'.$error.'</li>';
										}
										}
										echo '</ul>';
									}
								?>								
                                <p> 
                                    <label> Nombre </label>
									<input id="Nombre" pattern="[a-zA-Z ]+" title = "No introduzca elementos númericos" name="Nombre" required="required" type="text" placeholder="Nombre" />
                                </p>
                                <p> 
                                    <label> Descripcion </label></br>
                                    <textarea name="Descripcion" cols="50" required="required" type="text" placeholder="Descripcion"/></textarea>
                                </p>
                                <p> 
                                    <label> Fecha </label>
                                    <input name="Fecha" required="required" type="datetime"min="2013-01-01T00:00Z"  max="2018-12-31T12:00Z"
									value="<?php echo date("Y-m-d\TH:i");?>"
									placeholder="aaaa/mm/dd hh/mm/ss"/>
                                </p>
								<p> 
                                    <label> Precio </label>
                                    <input id="Precio" pattern="[0-9.]+" name="Precio" required="required" type="text" placeholder="Precio" /> 
                                </p>
								<p> 
                                    <label> Plazas Disponibles </label>
                                    <input id="plazasDisponibles" pattern="[0-9]+" title="Introduzca elementos númericos" name="PlazasDisponibles" type="text" required="required" placeholder="Plazas Disponibles" /> 
                                </p>
                                <p> 
                                    <label> Tipo </label>
                                    <input id="tipo" pattern="[01]" title = "Introduzca un número, solo '0' o '1'" name="Tipo" required="required" type="text" placeholder="1=Cine 0=Fiestas" /> 
                                </p>
                                <p> 
                                    <label> Imagen </label>
                                    <input id="imagen" name="Imagen" type='file'/>
                                  
                                </p>

								<input type="hidden" name="formRegistroEvento"/>
                                <p class="login button"> 
                                    <input type="submit" value="Finalizar" /> 
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
            <?php }else echo '<h1>No tienes permiso para acceder a esta pagina</h1>';?>
        </div>
		
		<?php 
			require(__DIR__.'/includes/php/footer.php');
		?>
    </body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>