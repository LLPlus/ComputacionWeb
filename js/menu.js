// Controla el tamañ del menu de navegacion
function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	document.getElementById("main").style.marginLeft = "250px";
	document.body.style.backgroundColor = "rgba(148, 241, 241,0.5)";
}

// Cierra el menu de navegacion
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  document.body.style.backgroundColor = "rgba(148, 241, 241,1)";
}

// Valida la informacion entrante por parte del usuario
function validate(){
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var name = document.getElementById("name").value;
	var web = document.getElementById("web").value;	
	if (username != "" && password != ""){ //si no estan vacios los campos de usuario y password, envia la informacion al controlador
		$(document).ready(function () { createCookie("jsuser", username, "5"); });
		$(document).ready(function () { createCookie("jspass", password, "5"); });
		window.location = "../views/view_login.php"; 
		return false;
	}
	else if (name != "" && web != "" && date != "" && hour != ""){ //si los datos ingresados, fueron los de la estacion, los envia al controlador
		$(document).ready(function () { createCookie("jsname", name, "10"); });
		$(document).ready(function () { createCookie("jsweb", web, "10"); });		
		window.location = "../views/view_login.php";
		return false;
	}
	else{ // si no hay datos ingresados, manda una alerta
		alert("Algun campo esta en blanco");
		return false;
	}
}

// Funcion para el control del menu
function changeblock(menupos,elmnt,color,bcolor) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) { //acomodoa el contenido
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].style.backgroundColor = "";
	}
	document.getElementById(menupos).style.display = "block"; //ingresa los colores
	elmnt.style.backgroundColor = color;
document.body.style.backgroundColor = bcolor;
}

// Borra los archivos temporales
function delete_cookie( name ) {
  document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

// Maneja los archivos temporales
function createCookie(name, value, secs) {
    if (secs) {
        var date = new Date();
        date.setTime(date.getTime() + (secs * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

document.getElementById("defaultOpen").click();