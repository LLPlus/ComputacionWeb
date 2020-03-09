<!-- Luis Cruz -->
<!-- Vista para añadir una nueva estacion de radio, desplegara un formulario -->

<!DOCTYPE html>
<?php $titulo="Añadir Estacion"; //variable para el titulo en el layout
require_once("../views/layout_top.php"); ?>	<!-- parte del layout para las vistas -->
	<div class="col-lg-6">
		<form action="../controllers/controller.php" method="post" class="col-lg-5"> <!-- formulario para insertar una nueva estacion -->
			<h3>Nueva Estación</h3>
			Descripción: <input type="text" name="nombre" class="form-control"/>    
			Liga: <input type="text" name="liga" class="form-control"/>    
			Fecha: <input type="date" name="fecha" class="form-control"/>    
			Hora: <input type="time" name="hora" step="1" class="form-control"/>    
			<br/>
			<input type="submit" value="Crear" class="btn btn-success" name="add_button"/>
		</form>					
	 </div>			
<?php require_once("../views/layout_bot.php"); ?> <!-- parte del layout para las vistas -->