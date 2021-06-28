<?php

class Admin extends Controller {

	public function index() {
		$this->view('admin/home');
	}

	public function close () {
		session_destroy();
		header('Location: /LiveSafelyWebApp/www/home/home');
	}
	
} 