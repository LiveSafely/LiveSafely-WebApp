<?php

require '../app/utils/Connection.php';

class admin_model{
    public function __construct(){}

    public function registerDoctor($name, $lastname, $username, $idDoctor, $password, $email, $dui, $noJunta, $age){
        try{
            $query = "INSERT INTO users VALUES('$name','$lastname', '$username', '$idDoctor', '$password', '$email', '$dui','$noJunta',null,$age, 2, 1)";
            $connection = new Connection;
            $connection->conn();
            $connection->conn->exec($query);
        }catch(PDOException $e){
            echo $e;
        }        
    }


}