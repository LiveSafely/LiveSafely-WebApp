<?php
//Clase que hereda de controller para poder manipular la información del admin
//Cada una de las vistas tienen como parametro una cadena de texto que hace referencia a la carpeta y archivo donde se encuentra. 
//Se omite la extension .php, porque esta parceada en el constructor de la vista.
require_once '../app/models/admin.php';
class Admin extends Controller {

	public function index() {
		$this->view('admin/home');
	}

	public function add_doctor(){
		$this->view('admin/addDoctor');
	}

	public function close () {
		session_destroy();
		header('Location: /LiveSafelyWebApp/www/home/home');
	}
	
} 