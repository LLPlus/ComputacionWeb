<!-- Luis Cruz -->
<!-- Controlador para la sesion de usuario, manipula la informacion entre la vistas y la clases, y se conecta a la base de datos -->

<?php
	//seccion de inicializacion de datos
	date_default_timezone_set('America/Mexico_City');
	session_start(); //inicia la sesion de usuario
	require_once("../models/model.php"); //obtiene las clases del modelo
    $usuarios = new Usuario();
    $datos1 = $usuarios->getUsuarios(); //obtiene la informacion de la base de datos
	$estaciones = new Estacion(); //variable de estacioens, para manipular la tabla de la base de datos
	$datos2 = $estaciones->getEstaciones();
	$textoc=$_GET['textoc'];
	
	//seccion de expirar sesion de n 5 minutos
	if(isset($_SESSION['name']) && time()-$_SESSION['time']>300) { // si la sesion tiene mas de 5 minutos, entonces expira y cierra sesion
		require_once("../views/view_logout.php");	
		}
	else{
	$_SESSION['time']=time(); //en caso que no expire, renueva el tiempo de sesion
	}
	
	//seccion para cerrar sesion
	if ($_GET['option']=="logout") {
		require_once("../views/view_logout.php"); //ejecuta la vista para ver estaciones\
	}
	
	//seccion para ver estaciones desde la liga
	if ($_GET['option']=="look") {
		require_once("../views/view_look.php"); //ejecuta la vista para ver estaciones
		exit;
	}
	
	//seccion crear usuario
	if (isset($_POST['insert_button'])) {
		for ($i = 0; $i < count($datos1); $i++) { 
			if($_POST['apodo'] == $datos1[$i]["apodo"]){ //revisa si existe el usuario en la base de datos
				?> <script>alert("Ya existe nombre de usuario");</script> <?php
				require_once("../views/view_create.php"); //vuelve a aparecer la pantalla de registro, colocando un mensaje extra
				exit;
			}
		}
		if ((isset($_POST['apodo'])) && ($_POST['apodo'] != '') && (isset($_POST['nombre'])) && ($_POST['nombre'] != '') && (isset($_POST['correo'])) && ($_POST['correo'] != '') && (isset($_POST['contrasena'])) && ($_POST['contrasena'] != '') ) { // se verifica que se haya ingresado todos los campos		
			$usuarios->setUsuario($_POST['apodo'], $_POST['nombre'], $_POST['correo'], sha1($_POST['contrasena']));  // la informacion ingresa en el formulario de view_create se registra como un nuevo usuario, insertando la informacion en la tabla de usuarios de la base de datos		
			?> <script>alert("Usuario creado correctamente"); 
			location.replace("../controllers/controller.php")</script><?php
			exit;			
		}
		else //en caso que no se haya ingresado todos los datos requeridos en el formulario
		{
			?> <script>alert("Usuario no creado, hizo falta un fato");</script> <?php
			require_once("../views/view_create.php"); //vuelve a aparecer la pantalla de registro, colocando un mensaje extra de que no se creo el usuario
			exit;
		}
	}
	
	//seccion para entrar al formulario de crear usuario
	if ($_GET['option']=="create") {
		require_once("../views/view_create.php"); //ejecuta la vista para crear usuarios
		exit;
	}
	
	//seccion para editar estaciones
	if ($_GET['option']=="edit") {
		$xid=$_GET['xid'];
		require_once("../views/view_edit.php"); //se ejecuta la vista para ver las estaciones
		exit;
	}
	
	//seccion para el ambiente de prueba, lista de usuarios
	if ($_GET['option']=="test") {
		require_once("../views/view_test.php"); //vista para hacer una prueba de usuarios.
		exit;
	}
	
	//seccion para añadir estaciones de radio
	if ($_GET['option']=="add" || isset($_POST['add_button'])){		
	?> <script>alert("Add Button Detected");</script> <?php
	
		if(isset($_SESSION['name']) && !empty($_SESSION['name'])) { //se verifica que este una sesion de usuario abierta
		?> <script>alert("Sesion Detected"); </script><?php
		
			$estaciones = new Estacion(); //variable de estacioens, para manipular la tabla de la base de datos			
			
			if ( (isset($_COOKIE['jsname'])) && ($_COOKIE['jsname'] != '') && (isset($_COOKIE['jsweb'])) && ($_COOKIE['jsweb'] != '')) {
			?> <script>alert("Info detected");</script> <?php
				
				$estaciones->setEstacion($_COOKIE['jsname'], $_COOKIE['jsweb'], date("Y-m-d"), date('H:i:s'),$_SESSION['name']); // se inserta la informacion de la nueva estacion
				
				$datos2 = $estaciones->getEstaciones(); //refresca la lista de estaciones				
				?> <script>alert("Estación Añadida Exitosamente");</script> <?php
				require_once("../views/view_look.php"); //se redirige a la vista de mirar estaciones				
				exit;
			}
			else
			{
				?> <script>alert("Falto algun dato para ingresar");</script> <?php	
				require_once("../views/view_main.php"); // en caso que este la sesion abierta, pero no se haya ingresado toda la informacion de la nueva sesion, se regresara para ingresar una nueva estacion
				exit;
			}
		}
		else
		{	//en caso que no exista un inicio de sesion, se redirigira la pantalla de inicio de sesion
			?> <script>alert("Fallo, no hay inicio de sesión");
			location.replace("../controllers/controller.php")</script><?php
			exit;
		}
	}
	
	//seccion para cambiar la informacion de la estacion de radio
	if (isset($_POST['change_button'])) {
		if(isset($_SESSION['name']) && !empty($_SESSION['name'])) { //se verifica que este una sesion de usuario abierta
			$estaciones = new Estacion(); //variable de estacioens, para manipular la tabla de la base de datos
			$datos2 = $estaciones->getEstaciones();			
			if ( (isset($_POST['nombre'])) && ($_POST['nombre'] != '' && (isset($_POST['liga'])) && ($_POST['liga'] != '') && (isset($_POST['fecha'])) && ($_POST['fecha'] != '') && (isset($_POST['hora'])) && ($_POST['hora'] != ''))  ) { //se verifica que se haya ingresado toda la informacion requerida en el formulario para nueva estacion		
				$estaciones->updEstacion($datos2[$_POST['editid']]["id"],$_POST['nombre'], $_POST['liga'], $_POST['fecha'], $_POST['hora']); // se inserta la informacion de la nueva estacion				
				?> <script>alert("Estación Editada Exitosamente");
				location.replace("../controllers/controller.php")</script><?php
				exit;
			}			
			else
			{
				?> <script>alert("No se edito la estación");</script> <?php	
				require_once("../views/view_look.php"); //se redirige a la vista de estaciones
				exit;
			}
		}
		else
		{	//en caso que no exista un inicio de sesion, se redirigira la pantalla de inicio de sesion
			?> <script>alert("No hay inicio de sesión");
			location.replace("../controllers/controller.php")</script><?php
			exit;
		}
	}
	
	//seccion para borrar estaciones de radio
	if ($_GET['option']=="del") {
		if(isset($_SESSION['name']) && !empty($_SESSION['name'])) { //se verifica que este una sesion de usuario abierta
			$estaciones = new Estacion(); //variable de estacioens, para manipular la tabla de la base de datos
			$datos2 = $estaciones->getEstaciones();					
			if($datos2[$_GET['xid']]["id_usuario"]==$_SESSION['name']){
				$estaciones->delEstacion( $datos2[$_GET['xid']]["id"] ); //se borra la estacion
				$datos2 = $estaciones->getEstaciones(); //refresca la lista de estaciones
				?> <script>alert("Eliminación Exitosa");
				location.replace("../controllers/controller.php")</script><?php
				exit;
			}			
			else
			{
				?> <script>alert("Fallo en la eliminación");</script> <?php	
				require_once("../views/view_look.php"); //se redirige a la vista de estaciones
				exit;
			}
		}
		else
		{	//en caso que no exista un inicio de sesion, se redirigira la pantalla de inicio de sesion
			?> <script>alert("Error, No hay inicio de sesión");
			location.replace("../controllers/controller.php")</script><?php
			exit;
		}
	}
	
	//seccion para iniciar sesion
	if(isset($_COOKIE["jsuser"])) //verifica si hubo alguna entrada de informacion
	{
		for ($i = 0; $i < count($datos1); $i++) { 
			if($_COOKIE["jsuser"] == $datos1[$i]["apodo"]){ //revisa si existe el usuario en la base de datos								
				if(sha1($_COOKIE["jspass"]) == $datos1[$i]["contrasena"]){ //verifica que la contraseña coincida
					session_start();
					$_SESSION['name']=$datos1[$i]["id"]; //en caso que si, asigna el usuario a la sesion
					$_SESSION['user']=$datos1[$i]["apodo"]; //en caso que si, asigna el usuario a la sesion
					$_SESSION['fullname']=$datos1[$i]["nombre"]; //en caso que si, asigna el usuario a la sesion
					$_SESSION['mail']=$datos1[$i]["correo"]; //en caso que si, asigna el usuario a la sesion
					$_SESSION['time']=time();
					$i=count($datos1);
					?> <script>alert("Inicio de Sesión Exitoso");</script> <?php
					require_once("../views/view_look.php"); //se ejecuta la vista para ver las estaciones
					exit;
				}
			}
		}
		?> <script>alert("Inicio de Sesión Incorrecta");</script> <?php	
		require_once("../views/view_main.php");	// en caso que no encuentra al usuario o no coincida la contraseña, regresa al inicio de sesion
		exit;
	}
	else{
		if(isset($_SESSION['name'])){
			require_once("../views/view_look.php"); //se ejecuta la vista para ver las estaciones
			exit;
		}
	}
    require_once("../views/view_main.php"); //en caso que no este en sesion, y no se intente ingresar, se redirigira a la pantalla de inicio de sesion
	exit;
?>