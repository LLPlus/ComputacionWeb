<!-- Luis Cruz -->
<!-- Index que redirigira desde el inicio al controlador de inicio de sesion -->

<?php
//procedimiento para cerrar sesion en caso de inactividad de 5 minutos
	header("Location: ./controllers/controller.php");
	exit;
?>