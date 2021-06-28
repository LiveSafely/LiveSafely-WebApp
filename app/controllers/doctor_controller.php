<?php

class Doctor extends Controller {

	public function index() {
		$this->view('doctor/home');
	}

	public function close () {
		session_destroy();
		header('Location: /LiveSafelyWebApp/www/home/home');
	}
	
} 