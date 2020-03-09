<!-- Luis Cruz -->
<!-- Controlador para la sesion de usuario, manipula la informacion entre la vistas y la clases, y se conecta a la base de datos

<?php
	//seccion de inicializacion de datos
	session_start(); //inicia la sesion de usuario
	require_once("../models/model.php"); //obtiene las clases del modelo
    $usuarios = new Usuario();
    $datos1 = $usuarios->getUsuarios(); //obtiene la informacion de la base de datos
	$estaciones = new Estacion(); //variable de estacioens, para manipular la tabla de la base de datos
	$datos2 = $estaciones->getEstaciones();
	$textoc=$_GET['textoc'];
	
	//seccion de expirar sesion de n 5 minutos
	if(time()-$_SESSION['time']>300) { // si la sesion tiene mas de 5 minutos, entonces expira y cierra sesion
		session_unset(); //quita la informacion de la sesion de usuario
		session_destroy(); //destruye la sesion de usuario	
		}
	else{
	$_SESSION['time']=time(); //en caso que no expire, renueva el tiempo de sesion
	}
	
	//seccion para cerrar sesion
	if ($_GET['option']=="logout") {
		session_unset(); //quita la informacion de la sesion de usuario
		session_destroy(); //destruye la sesion de usuario
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
				$textoc="Nombre de Usuario ya existe";
				require_once("../views/view_create.php"); //vuelve a aparecer la pantalla de registro, colocando un mensaje extra
				exit;
			}
		}
		if ((isset($_POST['apodo'])) && ($_POST['apodo'] != '') && (isset($_POST['nombre'])) && ($_POST['nombre'] != '') && (isset($_POST['correo'])) && ($_POST['correo'] != '') && (isset($_POST['contrasena'])) && ($_POST['contrasena'] != '') ) { // se verifica que se haya ingresado todos los campos		
			$usuarios->setUsuario($_POST['apodo'], $_POST['nombre'], $_POST['correo'], sha1($_POST['contrasena']));  // la informacion ingresa en el formulario de view_create se registra como un nuevo usuario, insertando la informacion en la tabla de usuarios de la base de datos		
			$textoc="Usuario Creado Correctamente";
			header("Location:../controllers/controller.php?textoc=".$textoc); //se redirige al controlador para iniciar sesion
			exit;			
		}
		else //en caso que no se haya ingresado todos los datos requeridos en el formulario
		{
			$textoc="Usuario no se creo, falto un dato";
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
		if(isset($_SESSION['name']) && !empty($_SESSION['name'])) { //se verifica que este una sesion de usuario abierta
			$estaciones = new Estacion(); //variable de estacioens, para manipular la tabla de la base de datos
			if ( (isset($_POST['nombre'])) && ($_POST['nombre'] != '' && (isset($_POST['liga'])) && ($_POST['liga'] != '') && (isset($_POST['fecha'])) && ($_POST['fecha'] != '') && (isset($_POST['hora'])) && ($_POST['hora'] != ''))  ) { //se verifica que se haya ingresado toda la informacion requerida en el formulario para nueva estacion			
				$estaciones->setEstacion($_POST['nombre'], $_POST['liga'], $_POST['fecha'], $_POST['hora'],$_SESSION['name']); // se inserta la informacion de la nueva estacion
				$datos2 = $estaciones->getEstaciones(); //refresca la lista de estaciones
				$textoc="Estacion añadida exitosamente";
				require_once("../views/view_look.php"); //se redirige a la vista de mirar estaciones				
				exit;
			}
			else
			{
				$textoc="Falto algn dato para ingresar";
				require_once("../views/view_add.php"); // en caso que este la sesion abierta, pero no se haya ingresado toda la informacion de la nueva sesion, se regresara para ingresar una nueva estacion
				exit;
			}
		}
		else
		{	//en caso que no exista un inicio de sesion, se redirigira la pantalla de inicio de sesion
			$textoc="No hay inicio de sesion";				
			header("location: ../controllers/controller.php?textoc=".$textoc); 
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
				//$textoc="Estacion editada exitosamente";
				$textoc=$datos2[$_POST['editid']]["id"];
				header("location: ../controllers/controller.php?textoc=".$textoc);  //se redirige a la vista de estaciones
				exit;
			}			
			else
			{
				$textoc="No se edito la estación , falto algun dato para ingresar";				
				require_once("../views/view_look.php"); //se redirige a la vista de estaciones
				exit;
			}
		}
		else
		{	//en caso que no exista un inicio de sesion, se redirigira la pantalla de inicio de sesion
			$textoc="No hay inicio de sesion";				
			header("location: ../controllers/controller.php?textoc=".$textoc); 
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
				$textoc="Estacion borrada exitosamente";
				header("location: ../controllers/controller.php?textoc=".$textoc);  //se redirige a la vista de estaciones
				exit;
			}			
			else
			{
				$textoc="Falto algun dato para ingresar";
				require_once("../views/view_look.php"); //se redirige a la vista de estaciones
				exit;
			}
		}
		else
		{	//en caso que no exista un inicio de sesion, se redirigira la pantalla de inicio de sesion
			$textoc="No hay inicio de sesion";				
			header("location: ../controllers/controller.php?textoc=".$textoc); 
			exit;
		}
	}
	
	//seccion para iniciar sesion
	if(isset($_POST['apodo'])) //verifica si hubo alguna entrada de informacion
	{
		for ($i = 0; $i < count($datos1); $i++) { 
			if($_POST['apodo'] == $datos1[$i]["apodo"]){ //revisa si existe el usuario en la base de datos
				if(sha1($_POST['contrasena']) == $datos1[$i]["contrasena"]){ //verifica que la contraseña coincida
					session_start();
					$_SESSION['name']=$datos1[$i]["id"]; //en caso que si, asigna el usuario a la sesion
					$_SESSION['time']=time();
					$i=count($datos1);
					$textoc="Inicio de Sesion Exitoso";															
					require_once("../views/view_look.php"); //se ejecuta la vista para ver las estaciones
					exit;
				}
			}
		}
		$textoc="Fallo en iniciar sesion";		
		require_once("../views/view_login.php");	// en caso que no encuentra al usuario o no coincida la contraseña, regresa al inicio de sesion
		exit;
	}
	else{
		if(isset($_SESSION['name'])){
			require_once("../views/view_look.php"); //se ejecuta la vista para ver las estaciones
			exit;
		}
	}
    require_once("../views/view_login.php"); //en caso que no este en sesion, y no se intente ingresar, se redirigira a la pantalla de inicio de sesion
	exit;
?>