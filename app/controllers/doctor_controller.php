<?php

class Doctor extends Controller {

	public function index() {
		$this->view('doctor/home');
	}

	public function close () {
		session_destroy();
		header('Location: /LiveSafelyWebApp/www/home/home');
	}
	public function create_user() {
		$this->view('doctor/addUser');
	}
	public function create_record() {
		$this->view('doctor/cRecord');
	}
	public function create_recipe() {
		$this->view('doctor/cRecipe');
	}
	public function watch_record() {
		$this->view('doctor/wRecord');
	}
	public function watch_user() {
		$this->view('doctor/wUser');
	}
	public function add_sick() {
		$this->view('doctor/addSick');
	}
	public function add_dis() {
		$this->view('doctor/aDis');
	}
} 