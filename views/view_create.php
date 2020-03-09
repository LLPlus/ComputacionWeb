<!-- Luis Cruz -->
<!-- Vista para crear un nuevo usuario, desplegara un formulario -->

<!DOCTYPE html>
<?php $titulo="Crear Usuario";
 require_once("../views/layout_top.php"); ?>	<!-- se inserta el layout de la vista -->
	<div class="col-lg-6">
		<form action="../controllers/controller.php" method="post" class="col-lg-5"> <!-- Es el formulario para registrar un nuevo usuario, una vez que se someta la informacion, correra el controlador para registrar nuevos usuarios a la base de datos -->
			<h3>Nuevo Usuario</h3>                                        
			Usuario: <input type="text" name="apodo" class="form-control"/>    
			Nombre: <input type="text" name="nombre" class="form-control"/>    
			Correo: <input type="text" name="correo" class="form-control"/>    
			Contraseña: <input type="password" name="contrasena" class="form-control"/>    
			<br/>
			<input type="submit" value="Crear" class="btn btn-success" name="insert_button"/>
		</form>
	</div>
<?php require_once("../views/layout_bot.php"); ?>	<!-- se inserta el layout de la vista -->