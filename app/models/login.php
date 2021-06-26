<?php

require '../app/utils/Connection.php';


class login_model{
    public function __construct() {
	}

    public function login($username, $password){
        try{
            $connection = new Connection;
            $connection->$conn();
            $statement = $connection->conn->prepare(
                "SELECT * FROM users WHERE username='$username' AND password='$password'";
            )
        }catch(PDOException $e){
            echo $e;
        }
    }
}