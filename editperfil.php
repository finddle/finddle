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
	  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/perfilUsuario.css">
	  <link rel="stylesheet" type="text/css" href="<?= ROOT_DIR?>/includes/css/formularios.css">
	  <!--Favicon-->
	  <link rel="shortcut icon" href="<?= ROOT_DIR?>/includes/img/favicon.png" />  
	  <script src="<?= ROOT_DIR?>/includes/js/jquery.min.js"></script>
	  <script src="<?= ROOT_DIR?>/includes/js/bootstrap.js"></script>
    </head>
	<?php 
		require(__DIR__.'/includes/php/usuarios.php');
		if(isset($_POST['editPerfil'])) {
			$result = formEditUser($_POST, $_FILES);
		}
	?>
    <body>
    <?php require(__DIR__.'/includes/php/header.php');?>
			
		<!--MENU del USUARIO-->	
		<div class="sidebar-left container-fixed col-xs-4 col-sm-4 col-md-3 ">
				 <a href="perfilUsuario.php" class="submit btn primary-btn">Perfil</a>
				 <a href="mensajes.php" class="submit btn primary-btn">Mensajes</a>
				 <a href="proximosEventos.php" class="submit btn primary-btn">Proximos eventos</a>
		</div>
		
		<!--CONTENIDO-->
		<div class="container-fixed col-xs-8 col-sm-8 col-md-6">
            <div id="vu-contenido">
			<div class="span-tittle"></div>
				<section>				
                <div id="container_demo" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
					
                        <div id="login" class="animate form">
						
                            <form  method = "POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> enctype="multipart/form-data"> 
                                
								<?php 
									if(isset($_SESSION['username'])){
										echo "<h1>Editar perfil</h1>";
										if(isset($result)){
											echo '<ul>';
											foreach($result as $error){
											if($error == "Su perfil se ha editado correctamente"){
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
                                    <input id="nombre" pattern="[a-zA-Z ]+" title = "No introduzca elementos númericos" name="nombre" required="required" type="text" placeholder="name" /> 
                                </p>
								<p> 
                                    <label> Apellidos </label>
                                    <input id="apellidos" pattern="[a-zA-Z ]+" title = "No introduzca elementos númericos" name="apellidos" required="apellidos" type="text" placeholder="surnames" /> 
                                </p>
								<p> 
                                    <label> Edad </label>
                                    <input id="edad" pattern="[0-9]+" title = "Introduzca un número" name="edad" required="required" type="text" placeholder="age" /> 
                                </p>
								<p> 
                                    <label> Contraseña </label>
                                    <input id="contrasena" name="contrasena" required="required" type="password" placeholder="password" /> 
                                </p>
								<p> 
                                    <label> E-mail </label>
                                    <input id="correo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="El correo ha de tener el siguiente formato: myemail@myemail.com" name="correo" required="required" type="text" placeholder="e-mail" /> 
                                </p>
								<p> 
                                    <label> Avatar </label>
                                    <input id="avatar"  name="avatar" placeholder="avatar" type="file"/> 
                                </p>
								<input type="hidden" name="editPerfil"/>
                                <p class="login button"> 
									<a href="perfilUsuarioBD.php">
										<input type="submit" value="Finalizar" /> 
									</a>
								</p>
							<?php	
								}
								else echo "<p>No eres un usuario logeado.</p>";
							?>
                            </form>
                        </div>
						
                    </div>
                </div>  
				</section>
			</div>
		</div>
     </div>
	<script>
		$("#nick").change(function(){
		<?php 
		require_once(__DIR__."/usuariosBD.php");
		?>
		var url="buscarNick()nick=" + $("#nick").val();
		$.get(url,usuarioExiste);
		});							
	</script>
    </body>
</html>
<?php require(__DIR__.'/includes/php/cleanup.php');?>