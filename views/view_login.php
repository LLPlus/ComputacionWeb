<!-- Luis Cruz -->
<!-- Vista para iniciar sesion, desplegara un formulario -->

<!DOCTYPE html>
<?php $titulo="Iniciar Sesion"; //variable para el titulo
require_once("../views/layout_top.php"); ?> <!-- parte del layout para las vistas -->
	<div class="col-lg-6">
		<form action="../controllers/controller.php" method="post" id="main_form" class="col-lg-5"> <!-- formulario para iniciar sesion -->
			<h3>Nuevo Usuario</h3>                
			Usuario: <input type="text" name="apodo" class="form-control"/>    
			Contraseña: <input type="password" name="contrasena" class="form-control"/>    
			<br/>
			<input type="submit" value="Iniciar Sesion" class="btn btn-success" name="login_button"/>
		</form>
	 </div>
<?php require_once("../views/layout_bot.php"); ?> <!-- parte del layout para las vistas -->