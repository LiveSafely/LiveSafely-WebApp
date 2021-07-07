<?php
//Clase que hereda de controller para poder manipular la información del doctor
//Todas las vistas tienen como parametro una cadena que hace referencia a la carpeta y archivo que los contiene. Se omite la extension .php, porque esta parceada en el constructor de la vista.
require_once '../app/models/doctor.php';
class Doctor extends Controller {
	
	//Vista inicio
	public function index() {
		$this->view('doctor/home');
	}
	//Funcion para cerrar Sesion
	public function close () {
		session_destroy();
		header('Location: /LiveSafelyWebApp/www/home/home');
	}
	//Vista crear usuario
	public function create_user() {
		$this->view('doctor/addUser');
	}
	//Vista crear Historial de paciente
	public function create_record() {
		$this->view('doctor/cRecord');
	}
	//Vista crear receta
	public function create_recipe() {
		$this->view('doctor/cRecipe');
	}
	//Vista ver receta
	public function watch_record() {
		$this->view('doctor/wRecord');
	}
	//Vista ver usuarios
	public function watch_user() {
		$this->view('doctor/wUser');
	}
	//Vista crear enfermedad
	public function add_sick() {
		$this->view('doctor/addSick');
	}
	//Vista asignar enfermedad a los pacientes
	public function add_dis() {
		$this->view('doctor/aDis');
	}
	//Vista dar de alta a un paciente
	public function free_user() {
		$this->view('doctor/fUser');
	}
	//Funcion para dar de alta  aun paciente haciendo uso del redireccionamiento
	public function freeUser() {
		$doctorModel = new doctor_model();
		$username = $_GET["username"];
		$sick = $_GET["dis"];
		$doctorModel->updateSickStatusByUser($sick, $username);
		header("Location: /LiveSafelyWebApp/www/doctor/free_user");
	}
} 