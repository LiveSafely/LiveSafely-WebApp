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
    public function getUserByDoctor($idDoctor){
        try{
            $connection = new Connection;
            $connection->conn();
            $query = "SELECT username FROM users WHERE  id_doctor='$idDoctor'";
            $statement = $connection->conn->prepare("SELECT username FROM users WHERE id_doctor='$idDoctor'");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            echo $n;
            for ($i = 0; $i <= $n-1; $i++) {
                echo "<option value=''>". $result[$i]['username'] ."</option>";
            }
            

            
        }catch(PDOException $e){
            echo $e;
        }
    }

}