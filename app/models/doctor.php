<?php

require '../app/utils/Connection.php';


class doctor_model{
    public function __construct() {
	}

    public function registerPerson($name, $lastname, $username, $idDoctor, $password, $email, $dui, $age){
        try{
            $query = "INSERT INTO users VALUES('$name','$lastname', '$username', '$idDoctor', '$password', '$email', '$dui',null,$age, 2, 1)";
            $connection = new Connection;
            $connection->conn();
            $connection->conn->exec($query);
        }catch(PDOException $e){
            echo $e;
        }        

    }

}