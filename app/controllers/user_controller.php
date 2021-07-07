<?php

class User extends Controller {

	public function index() {
		$this->view('user/home');
	}

	public function close () {
		session_destroy();
		header('Location: /LiveSafelyWebApp/www/home/home');
	}

	public function add_location() {
		$this->view('user/add_location');
	}

	public function show_recipe() {
		$this->view('user/show_recipe');
	}

	public function show_medicine() {
		$this->view('user/show_medicine');
	}
	
} 