<?php

class User extends Controller {

	public function index() {
		$this->view('user/home');
	}

	public function close () {
		session_destroy();
		header('Location: /LiveSafelyWebApp/www/home/home');
	}
	
} 