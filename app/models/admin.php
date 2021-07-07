<?php
//Se requiere mandar a llamar la instancia para realizar la conexion a la base de datos.
require '../app/utils/Connection.php';

//Se crea el modelo para declarar todas las funciones que se utilizaran en el código.
class admin_model{
    //Creamos el constructor
    public function __construct(){}

    //Funcion para insertar (registrar) un doctor en la base de datos.
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
    public function getDoctorNames($idDoctor){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT name,lastname FROM users WHERE username='$idDoctor'");
            $statement->execute();
            $result = $statement->fetchAll();
            //De lo retornado se obtiene un arreglo matriz con filas y columnas, se extrae todo de la primera fila, y de su 
            //columna respectivamente.
            $fullname = $result[0][0]." ".$result[0][1];
            //Se imprime todo el nombre
            echo $fullname;
        }catch(PDOException $e){
            echo $e;
        }
    }
}