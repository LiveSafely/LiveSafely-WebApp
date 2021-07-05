<?php

require '../app/utils/Connection.php';


class user_model{
    public function __construct() {
	}

    public function registerPlace($id , $latitude, $longitude, $descr, $username){
        try{
            $query = "INSERT INTO places VALUES('$id' , '$latitude','$longitude', '$descr', '$username')";
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
                echo "<tr><td>".$result[$i]['date']."</td><td>".$result[$i]['diagnosis']."</td><td><button>Ver</button></td></tr>";
            }
        }catch(PDOException $e){
            echo $e;
        }
    }
}