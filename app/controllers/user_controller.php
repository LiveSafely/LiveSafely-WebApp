<?php

// CONTROLADOR PARA EL MODULO DE USUARIO

class User extends Controller {

	// CON ESTA RUTA ACCEDEMOS AL INICIO

	public function index() {
		$this->view('user/home');
	}

	// CON ESTA RUTA CERRAMOS SESION DE USUARIO

	public function close () {
		session_destroy();
		header('Location: /LiveSafelyWebApp/www/home/home');
	}

	// CON ESTA RUTA ACCEDEMOS A LA OPCION DE ANIADIR UNA UBICACION 

	public function add_location() {
		$this->view('user/add_location');
	}

	// CON ESTA RUTA ACCEDEMOS AL APARTADO DE VER TODAS LAS RECETAS QUE POSEE EL USUARIO

	public function show_recipe() {
		$this->view('user/show_recipe');
	}

	// CON ESTA RUTA ACCEDEMOS AL APARTADO DE VER TODAS LAS MEDICINAS QUE POSEEN LAS RECETAS
	
	public function show_medicine() {
		$this->view('user/show_medicine');
	}
	
} 