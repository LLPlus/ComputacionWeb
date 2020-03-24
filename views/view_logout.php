<!-- Luis Cruz -->
<!-- Codigo para salir de sesion -->

<!DOCTYPE html>
<?php require_once("../views/layout.php");  // parte del layout para las vistas 

session_unset(); //quita la informacion de la sesion de usuario
session_destroy(); //destruye la sesion de usuario
?>
<script type="text/javascript"> <!-- Borra los cookies -->
    delete_cookie('jsuser');
</script>

<script type="text/javascript">
    delete_cookie('jspass');
</script>
<?php
header("Location:../views/view_login.php"); //se redirige al controlador para iniciar sesion
exit;
?>
</body>
</html>