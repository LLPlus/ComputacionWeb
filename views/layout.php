
<!DOCTYPE html>
<html>
<head>
	<title>Estaciones de Radio</title> <!-- Parametros de formato y archivos externos del html -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="../js/menu.js?key=<?php echo time(); ?>"></script>
	<link rel="stylesheet" type="text/css" href="../estilos/estilo1.css?key=<?php echo time(); ?>" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<!-- Barra de Navegacion Superior -->
	<button class="tablink" onclick="openNav()"> Menu </button>
	<button class="tablink" onclick="changeblock('menurojo', this, '#FF7538','#ff9999')" id="defaultOpen">Inicio</button>
	<button class="tablink" onclick="changeblock('menuverde', this, '#BEF166','lightgreen')">Acerca de</button>
	<?php if(isset($_SESSION['name'])) //verifica si hubo alguna entrada de informacion
		{ ?>
	<button class="tablink" onclick="changeblock('menuamarillo', this, '#FCD26D','#FFF673')">Añadir Estacion</button>
		<?php }else{ ?>
	<button class="tablink" onclick="changeblock('menuazul', this, '#388CFF','lightblue')">Iniciar Sesion</button>
	<?php }	?>

	<!-- Barra de Navegacion LLateral -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<?php session_start();	//inicia la sesion de usuario
		if(isset($_SESSION['name']) && !empty($_SESSION['name'])) { //revisa que exista informacion en la sesion de usuario
		?>
		<!-- Despliega la informacion del usuario,en caso que este iniciado sesion -->
		<p><?php echo $_SESSION['user'] ?></p>
		<p><?php echo $_SESSION['fullname'] ?></p>
		<p><?php echo $_SESSION['mail'] ?></p>
		<a href='..\controllers\controller.php?option=logout'>Cerrar Sesion</a>  
		<?php } ?>
		<!-- Despliega los menus -->
		<a href='..\controllers\controller.php?option=create'>Crear Usuario</a>  
		<a href='..\controllers\controller.php?option=look'>Mirar Estaciones</a>
		<a href='..\controllers\controller.php?option=test'>Mirar Usuarios</a>
	</div>

	<!-- Despliegue de cada seccion del menu superior -->
		<!-- Inicio -->
	<div id="menurojo" class="tabcontent">
		<h1>Inicio</h1>
		<h2>Sistema de subidas de Estaciones de Radio</h2> </br>
		<h2>Inicia Sesión para subir una estacion</h2> </br>
		<h2>Puedes crear una cuenta</h2> </br>
	</div>
		<!-- Acerca de -->
	<div id="menuverde" class="tabcontent">
		<h1>Acerca de</h1>
		<h2>Computacion en Servidor Web</h2> </br>
		<h2>Sistema con base de datos para añadir estaciones de radio en una lista</h2> </br>
		<p>Se valida la autenticacion de usuario, con el cual se puede editar las estaciones de radio en la base de datos</p> </br>
	</div>

		<!-- Inicio de Sesion -->
	<div id="menuazul" class="tabcontent">
		<div class="container">
			<div class="main">
				<h3>Iniciar Sesión</h3>
				<form id="form_id" method="post" name="myform">
					<label>User Name :</label>
					<input type="text" name="username" id="username" class="log"/>
					<label>Password :</label>
					<input type="password" name="password" id="password" class="log"/>
					<input type="button" value="Login" id="submit" onclick="validate()"/>
				</form>
			</div>
		</div>
	</div>

		<!-- Estadion de Radio -->
	<div id="menuamarillo" class="tabcontent">
		<div class="container">
			<div class="main">
			<h3>Añadir Estación de Radio</h3>
			<form id="form_id" method="post" name="myform">
				<label>Descripción: </label>
				<input type="text" name="name" id="name" class="log"/>
				<label>Liga :</label>
				<input type="text" name="web" id="web" class="log"/>
				<label>Fecha: </label>
				<input type="submit" value="Crear" id="submit" name="add_button" onclick="validate()"/>
			</form>

			</div>
		</div>
	</div>
