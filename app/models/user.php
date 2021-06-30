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
}