<?php

class Connection{

	public $db = array(
		"host" => "localhost:3306",
		"user" => "root",
		"password" => "",
		"database" => "livesafely"
	);

	public $conn;

	public function __construct() {
	}

	public function conn () {
		$host = $this->db["host"];
		$database = $this->db["database"];
		$user = $this->db["user"];
		$password = $this->db["password"];

		$this->conn = new \PDO("mysql:host=$host;dbname=$database", $user, $password);
		$this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}
}