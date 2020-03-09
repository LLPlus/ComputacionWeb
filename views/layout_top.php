<!-- Luis Cruz -->
<!-- Layout para las vistas, despliega la parte superior de las vistas -->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Computación en el servidor web</title> <!-- parte del layout para las vistas -->
        <link href="../views/estilo.css" rel="stylesheet" type="text/css" /> <!-- css para dar estilo a la pagina -->
        <link href="../views/estilo2.css" rel="stylesheet" >
    </head>
    <body style="background-color:#FFFCD2;"> <!-- color de fondo -->
		<?php
		session_start();	//inicia la sesion de usuario
	if(isset($_SESSION['name']) && !empty($_SESSION['name'])) { //revisa que exista informacion en la sesion de usuario
		for ($i = 0; $i < count($datos1); $i++) {
			if($_SESSION['name'] == $datos1[$i]["id"]){ //se revisara el ID del usuario
				$number=$_SESSION['name'];
			break;
			}
		}
		?><div style="position: absolute; top: 0; right: 0; width: 200px; text-align:right;"> <!-- formato para poner en la parte superior derecha la informacion de la sesion -->
		<p><br/><?php echo $datos1[$i]["id"]." .<br>".$datos1[$i]["apodo"]." .<br>".$datos1[$i]["nombre"]." .<br>".$datos1[$i]["correo"]." .";?><hr/>
		<p><a href="../controllers/controller.php?option=logout">Cerrar Sesión .</a></p> <!-- liga o boton para cerrar sesion -->
		</div>
	<?php }
	else{
		?><div style="position: absolute; top: 0; right: 0; width: 200px; text-align:right;">		
		<p><br/><a href="../controllers/controller.php?option=login">Iniciar Sesión .</a></p> <!-- si no hay sesion abierta, entonces la liga o boton sera para iniciar sesion -->
		</div>
	<?php }
		
	?>

        <div class="container">
            <header class="text-center">
                <h1>Computación en el Servidor</h1> <!-- titulo principal -->
                <hr/>
                <p class="lead"><?php echo $titulo ?> <br/> <!-- titulo parcial de la vista que se esta desplegando -->
                    <?php if($_GET){
						echo $_GET['textoc']; //pondra un mensaje en caso que se haya generado uno, como fallo en inicio de sesion, registro exitoso, etc..
					}else{
						echo $textoc;
					} ?></p><br/>
            </header>