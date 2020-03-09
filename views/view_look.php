<!-- Luis Cruz -->
<!-- Vista para desplegar la lista de las estaciones almacenadas en la base de datos, y referenciara quien la subio -->

<!DOCTYPE html>
<?php $titulo="Lista de Estaciones"; //variable para agregar un titulo en el layout
require_once("../views/layout_top.php"); ?> <!-- parte del layout para las vistas -->
	<div class="col-lg-6">
		<hr/>                			
		<?php
		for ($i = 0; $i < count($datos2); $i++) { //ciclo para obtener dato de cada estacion
			for($j=0; $j < count($datos1); $j++){ //ciclo para obtener dato de cada uusario
				if($datos2[$i]["id_usuario"]==$datos1[$j]["id"]){ // revisa que usuario es el que inserto la estacion a la base de datos
			?>						
			<tr><p>		<!-- Listado de cada estacion que hay en la base de datos con su informacion -->
				<?php if($datos1[$j]["id"]==$_SESSION['name']){
					echo "<a href=\"../controllers/controller.php?xid=".$i."&option=edit\">Editar</a><br/>";
					echo "<a href=\"../controllers/controller.php?xid=".$i."&option=del\">Borrar</a><br/>";
				} ?>
				<strong>ID: </strong><?php echo $datos2[$i]["id"]; ?><br/> 
				<strong>Descripción: </strong><?php echo $datos2[$i]["nombre"]; ?><br/>
				<strong>Fecha: </strong><?php echo $datos2[$i]["fecha"]; ?><br/>
				<strong>Hora: </strong><?php echo $datos2[$i]["hora"]; ?><br/>
				<strong>Usuario: </strong><?php echo $datos1[$j]["apodo"]; ?><br/>
				<strong>Nombre: </strong><?php echo $datos1[$j]["nombre"]; ?><br/>
				<a href="<?php echo $datos2[$i]["liga"]; ?>"> <!-- Codigo para insertar la imagen con la liga dentro de la imagen -->
					<img alt="Qries" src="../images/corchea.png" width="30" height="30"> 
				</a><br/><br/><br/>
			</p></tr>
			<?php
				$j=count($datos1); //si encontro al usuario que inserto la base de datos, termina la busqueda del usuario para proseguir con la siguiente estacion
				}
			}
		}
		?>
	</div>
<?php require_once("../views/layout_bot.php"); ?> <!-- parte del layout para las vistas -->