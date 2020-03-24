<!-- Luis Cruz -->
<!-- Vista para editar una nueva estacion de radio, desplegara un formulario -->

<!DOCTYPE html>
<?php require_once("../views/layout.php"); ?>	<!-- se inserta el layout de la vista -->
	<div class="col-lg-6">
		<form action="../controllers/controller.php?" method="post" class="col-lg-5"> <!-- formulario para editar una nueva estacion -->		
			<div class="container">
			<div class="main">
			<h3>Editar Estación</h3>
			Descripción: <input type="text" name="nombre" class="log" value="<?php echo $datos2[$xid]["nombre"]; ?>"/>    
			Liga: <input type="text" name="liga" class="log" value="<?php echo $datos2[$xid]["liga"]; ?>"/>    
			Fecha: <input type="date" name="fecha" class="log" value="<?php echo $datos2[$xid]["fecha"]; ?>"/>    
			Hora: <input type="time" name="hora" step="1" class="log" value="<?php echo $datos2[$xid]["hora"]; ?>"/>    
			<br/>
			<input type="submit" value="Editar" class="btn btn-success" name="change_button"/>
			<input type="hidden" name="editid" value="<?php echo $xid; ?>" />
			</div>
			</div>
		</form>					
	 </div>			
</body>
</html>