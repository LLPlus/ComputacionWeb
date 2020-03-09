<!-- Luis Cruz -->
<!-- Layout para las vistas, despliega la parte inferior de las vistas -->

   
   <div class="col-lg-6 text-center">
                    <hr/>					
					<?php session_start();
					if(isset($_SESSION['name']) && !empty($_SESSION['name'])) {		//en la parte inferior, tambien habra una liga para cerrar o iniciar sesion	, ademas aparecera un boton o liga para añadir una estacion de radio, ya que si no hay sesion iniciada, no se podra insertar una estacion			
						?> <a href="../controllers/controller.php?option=logout"><h3>Cerrar Sesión</h3></a>
						<hr/>
						<hr/>
						<a href="../controllers/controller.php?option=add"><h3>Añadir Estaciones</h3></a>						
					<?php }
					else { ?>					
						<a href="../controllers/controller.php?option=login"><h3>Iniciar Sesión</h3></a>						
					<?php } ?>					
                    <hr/>
					<hr/> <!-- ligas o botones para crear usuario, mirar las estaciones de radio, y una vista de prueba para ver los usuarios -->
                    <a href="../controllers/controller.php?option=create"><h3>Crear Usuario</h3></a>
                    <hr/>
					<hr/>
					<a href="../controllers/controller.php?option=look"><h3>Mirar Estaciones</h3></a>
                    <hr/>
					<hr/>
					<a href="../controllers/controller.php?option=test"><h3>Testing View</h3></a>
                    <hr/>
                </div> 
            </div>
            <footer class="col-lg-12 text-center">
                Luis Cruz - <?php echo date("Y"); ?> <hr/><hr/><hr/><hr/>
            </footer>
        </div>
    </body>
</html>