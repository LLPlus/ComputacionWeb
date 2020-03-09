<!-- Luis Cruz -->
<!-- Vista para añadir una nueva estacion de radio, desplegara un formulario -->

<!DOCTYPE html>
<?php $titulo="Editar Estacion"; //variable para el titulo en el layout
require_once("../views/layout_top.php"); ?>	<!-- parte del layout para las vistas -->
	<div class="col-lg-6">
		<form action="../controllers/controller.php?" method="post" class="col-lg-5"> <!-- formulario para editar una nueva estacion -->		
			<h3>Nueva Estación</h3>
			Descripción: <input type="text" name="nombre" class="form-control" value="<?php echo $datos2[$xid]["nombre"]; ?>"/>    
			Liga: <input type="text" name="liga" class="form-control" value="<?php echo $datos2[$xid]["liga"]; ?>"/>    
			Fecha: <input type="date" name="fecha" class="form-control" value="<?php echo $datos2[$xid]["fecha"]; ?>"/>    
			Hora: <input type="time" name="hora" step="1" class="form-control" value="<?php echo $datos2[$xid]["hora"]; ?>"/>    
			<br/>
			<input type="submit" value="Editar" class="btn btn-success" name="change_button"/>
			<input type="hidden" name="editid" value="<?php echo $xid; ?>" />
		</form>					
	 </div>			
<?php require_once("../views/layout_bot.php"); ?> <!-- parte del layout para las vistas -->