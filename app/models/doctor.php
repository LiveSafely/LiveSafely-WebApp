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

    public function getDoctorNames($idDoctor){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT name,lastname FROM users WHERE username='$idDoctor'");
            $statement->execute();
            $result = $statement->fetchAll();
            $fullname = $result[0][0]." ".$result[0][1];
            echo $fullname;
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getUserByDoctor($idDoctor){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT username FROM users WHERE id_doctor='$idDoctor'");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            echo $n;
            for ($i = 0; $i <= $n-1; $i++) {
                echo "<option value='". $result[$i]['username'] ."'>". $result[$i]['username'] ."</option>";
            }
            

            
        }catch(PDOException $e){
            echo $e;
        }
    }
    public function insertRecord($idDoctor, $username, $title, $desc){
        $dateToday = date("Y/m/d");
        try{
            $query = "INSERT INTO record(title,descr, date, username, id_doctor) VALUES('$title','$desc', '$dateToday', '$username', '$idDoctor')";
            $connection = new Connection;
            $connection->conn();
            $connection->conn->exec($query);
        }catch(PDOException $e){
            echo $e;
        }      
    }
    public function insertHeaderRecipe($username, $idDoctor, $diagnosis){
        $dateToday = date("Y/m/d");
        try{
            $query = "INSERT INTO recipe(username,id_doctor, date, diagnosis) VALUES('$username','$idDoctor', '$dateToday', '$diagnosis')";
            $connection = new Connection;
            $connection->conn();
            $connection->conn->exec($query);
        }catch(PDOException $e){
            echo $e;
        }  
    }   
    public function insertDisease($name, $desc,$type){
        try{
            $query = "INSERT INTO diseases(name, descr, type) VALUES('$name','$desc','$type')";
            $connection = new Connection;
            $connection->conn();
            $connection->conn->exec($query);
        }catch(PDOException $e){
            echo $e;
        }  
    }
    public function showRecordByPatient($username, $idDoctor){
        $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT date, title, descr FROM record WHERE id_doctor='$idDoctor' AND username='$username'");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            for ($i = 0; $i <= $n-1; $i++) {
                echo "<tr><td>".$result[$i]['date']."</td><td>".$result[$i]['title']."</td><td>".$result[$i]['descr']."</td></tr>";
            }
    }
    public function getDiseases(){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT * FROM diseases");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            echo $n;
            for ($i = 0; $i <= $n-1; $i++) {
                echo "<option value='". $result[$i]['id'] ."'>". $result[$i]['name'] ."</option>";
            }
            

            
        }catch(PDOException $e){
            echo $e;
        }
    }
    public function insertSickness($username,$idDoctor, $idDis, $status){
        try{
            $query = "INSERT INTO sickness(username, id_diseases, id_doctor, status) VALUES('$username',$idDis,'$idDoctor',$status)";
            $connection = new Connection;
            $connection->conn();
            $connection->conn->exec($query);
        }catch(PDOException $e){
            echo $e;
        }
    }

}