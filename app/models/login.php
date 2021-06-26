<?php

require '../app/utils/Connection.php';


class login_model{
    public function __construct() {
	}

    public function login($username, $password){
        try{

        }catch(PDOException $e){
            echo $e;
        }
    }
}