<?php

require '../app/utils/Connection.php';


class login_model{
    public function __construct() {
	}

    public function login($username, $password){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare(
                "SELECT * FROM users WHERE username='$username' AND password='$password' AND status=1"
            );
            $statement->execute();
            $result = $statement->rowCount();
            if($result){
                $row = $statement->fetchAll();
                if($row[0]['type'] == 0){
                    $_SESSION["admin"] = $username; 
                    header("Location: /LiveSafelyWebApp/www/admin/home");
                }else if($row[0]['type'] == 1){
                    $_SESSION["doctor"] = $username; 
                    header("Location: /LiveSafelyWebApp/www/doctor/home");
                }else if($row[0]['type'] == 2){
                    $_SESSION["user"] = $username; 
                    header("Location: /LiveSafelyWebApp/www/user/home");
                }else{
                    echo "No se encontró ningun usuario con esas credenciales";
                }
            }
        }catch(PDOException $e){
            echo $e;
        }
    }
}