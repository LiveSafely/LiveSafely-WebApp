<?php

require '../app/utils/Connection.php';


class user_model{
    public function __construct() {
	}

    public function registerPlace($id , $latitude, $longitude, $descr, $dept, $username){
        try{
            $query = "INSERT INTO places VALUES('$id' , '$latitude','$longitude', '$descr', '$dept', '$username')";
            $connection = new Connection;
            $connection->conn();
            $connection->conn->exec($query);
        }catch(PDOException $e){
            echo $e;
        }        

    }

    public function getRecipe($username){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT recipe.date as date, recipe.diagnosis as diagnosis FROM recipe WHERE username='$username'");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            for ($i = 0; $i <= $n-1; $i++) {
                echo "<tr><td>".$result[$i]['date']."</td><td>".$result[$i]['diagnosis']."</td></tr>";
            }
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getMedicine($username){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT recipe.id as id, recipe.diagnosis as diagnosis, medicine.name as name, medicine.dosis as dosis, medicine.qty as qty, medicine.comment as comment FROM recipe, medicine WHERE recipe.id = medicine.id_recipe AND username='$username' ");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            for ($i = 0; $i <= $n-1; $i++) {
                echo "<tr><td>".$result[$i]['id']."</td><td>".$result[$i]['diagnosis']."</td><td>".$result[$i]['name']."</td><td>".$result[$i]['dosis']."</td><td>".$result[$i]['qty']."</td><td>".$result[$i]['comment']."</td></tr>";
            }
        }catch(PDOException $e){
            echo $e;
        }
    }

    public function getUserNames($user){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT name,lastname FROM users");
            $statement->execute();
            $result = $statement->fetchAll();
            $fullname = $result[0][0]." ".$result[0][1];
            echo $fullname;
        }catch(PDOException $e){
            echo $e;
        }
    }
}