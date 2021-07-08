<?php

class Home extends Controller {

	public function index() {
		$this->view('home/home');
	}
	
	public function login(){
		$this->view('home/login');
	}
	public function maps(){
		$this->view('home/maps');
	}
} 