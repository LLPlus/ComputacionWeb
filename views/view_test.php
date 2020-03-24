<!-- Luis Cruz -->
<!-- Despliega la lista de usuarios -->

<!DOCTYPE html>
<?php require_once("../views/layout.php"); ?>	<!-- parte del layout para las vistas -->
   <div class="col-lg-6">
		<hr/>                		
		<?php
		for ($i = 0; $i < count($datos1); $i++) { ?> <!-- ciclo para obtener la informacion de usuario por usuario de la base de datos-->
			<tr><p>														
				<strong>ID: </strong><?php echo $datos1[$i]["id"]; ?><br/>
				<strong>Apodo: </strong><?php echo $datos1[$i]["apodo"]; ?><br/>
				<strong>Nombre: </strong><?php echo $datos1[$i]["nombre"]; ?><br/>
				<strong>Correo: </strong><?php echo $datos1[$i]["correo"]; ?><br/>
				<strong>Contraseña: </strong><?php echo $datos1[$i]["contrasena"]; ?><br/>
			</p></tr>
			<?php
				}						
		?>
	 </div>
<?php require_once("../views/layout_bot.php"); ?> <!-- parte del layout para las vistas -->