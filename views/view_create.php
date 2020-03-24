<!-- Luis Cruz -->
<!-- Vista para crear un nuevo usuario, desplegara un formulario -->

<!DOCTYPE html>
<?php require_once("../views/layout.php"); ?>	<!-- se inserta el layout de la vista -->
	<div class="col-lg-6">
		<form action="../controllers/controller.php" method="post" class="col-lg-5"> <!-- Es el formulario para registrar un nuevo usuario, una vez que se someta la informacion, correra el controlador para registrar nuevos usuarios a la base de datos -->	
			<div class="container">
				<div class="main">
					<h3>Nuevo Usuario</h3>                                        
					Usuario: <input type="text" name="apodo" class="log"/>    
					Nombre: <input type="text" name="nombre" class="log"/>    
					Correo: <input type="text" name="correo" class="log"/>    
					Contraseña: <input type="password" name="contrasena" class="log"/>    				
					<input type="submit" value="Crear" class="btn btn-success" name="insert_button"/>
				</div>
			</div>
		</form>
	</div>
</body>
</html>