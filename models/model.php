<!-- Luis Cruz -->
<!-- El modelo tendra una clase para los usuarios y otra clase para las estaciones, ademas que tendra la estructura para manipular la base de datos -->

<?php

class Usuario { // clase de usuario 
    
    private $usuario;
    private $db; //variables para el usuario y para la base de datos

    public function __construct() { //el constructor para generar el usuario y para conectarse a la base de datos
        $this->usuario = array();
		$this->db = new PDO('mysql:host=localhost;dbname=u659609380_maestria', "u659609380_user", "database");				
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'"); //funcion para el set names en el formato utf8
    }

    public function getUsuarios() { //funcion para obtener los usuarios de la base de datos
        self::setNames();
        $sql = "SELECT id, apodo, nombre,correo,contrasena FROM usuarios"; // hace un query con select, para obtener la informacion de la tabla
        foreach ($this->db->query($sql) as $res) {
            $this->usuario[] = $res; //un ciclo para obtener la informacion de usuario por usuario en un arreglo
        }
        return $this->usuario; //retorna la informacion de los usuarios
        $this->db = null;
    }

    public function setUsuario($apodo, $nombre, $correo, $contrasena) { //funcion para insertar un nuevo usuario
        self::setNames();
        $sql = "INSERT INTO usuarios(apodo,nombre,correo,contrasena) VALUES ('" . $apodo . "', '" . $nombre . "', '" . $correo . "', '" . $contrasena . "')"; //query con insert, para ingresar un nuevo usuario a la tabla
        $result = $this->db->query($sql); //se aplica el query
		//pasos para hacer un retorno de si se pudo realizar el query
        if ($result) {
			return "true";
        } else {
			return "false";
        }
    }
}

class Estacion { //clase que hace referencia a las estaciones de la base de datos
    
    private $estacion;
    private $db; //variable para la estacion y la base de datos

    public function __construct() { //el constructor para generar la estacion y para conectarse a la base de datos
        $this->estacion = array();
        $this->db = new PDO('mysql:host=localhost;dbname=u659609380_maestria', "u659609380_user", "database");				
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'"); //funcion para el set names en el formato utf8
    }

    public function getEstaciones() { //funcion para obtener las estaciones de la base de datos
        self::setNames();
        $sql = "SELECT id, nombre, liga, fecha, hora, id_usuario FROM punto"; //query con insert, para ingresar una nueva estacion a la tabla
        foreach ($this->db->query($sql) as $res) {
            $this->estacion[] = $res; //un ciclo para obtener la informacion de estacion por estacion en un arreglo
        }
        return $this->estacion; //retorna la informacion de las estaciones
        $this->db = null;
    }

    public function setEstacion($nombre, $liga, $fecha, $hora, $id_usuario) { //funcion para insertar una nueva estacion
        self::setNames();
        $sql = "INSERT INTO punto(nombre,liga,fecha,hora,id_usuario) VALUES ('" . $nombre . "', '" . $liga . "', '" . $fecha . "', '" . $hora . "', '" . $id_usuario . "' )";
		//query con insert, para ingresar una nueva estacion a la table
        $result = $this->db->query($sql); //se aplica el query
		//pasos para hacer un retorno de si se pudo realizar el query
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	public function delEstacion($id) { //funcion para borrar una estacion de la base de datos
        self::setNames();
        $sql = "DELETE FROM punto WHERE id='" . $id . "'"; //query con delete para borrar una estacion a la tabla        
        $result = $this->db->query($sql); // se ejecuta el query
		if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
	public function updEstacion($id, $nombre, $liga, $fecha, $hora) { //funcion para editar una estacion
        self::setNames();
        $sql = "UPDATE punto SET nombre='" . $nombre . "', liga='" . $liga . "', fecha='" . $fecha . "', hora='" . $hora . "' WHERE id='" . $id ."'";
		//query con insert, para borrar una estacion a la table
        $result = $this->db->query($sql); //se aplica el query
		//pasos para hacer un retorno de si se pudo realizar el query
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
	
}
?>