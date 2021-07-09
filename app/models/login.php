<?php

require '../app/utils/Connection.php';

//Creando clase para el manejo del login con sus respectivas sesiones
class login_model{
    public function __construct() {
	}
    //Creando una funcion global para validar las credenciales de inicio de sesion
    public function login($username, $password){
        try{
            //Se prepara la instancia de conexion
            $connection = new Connection;
            $connection->conn();
            //Se hace la verificaión con la información de la base de datos.
            $statement = $connection->conn->prepare(
                "SELECT * FROM users WHERE username='$username' AND password='$password' AND status=1"
            );
            $statement->execute();
            $result = $statement->rowCount();
            //Se obtiene el resultado y se valida el tipo de usuario
            if($result){
                $row = $statement->fetchAll();
                //Redireccionamiento para el Admin
                if($row[0]['type'] == 0){
                    $_SESSION["admin"] = $username; 
                    header("Location: /LiveSafelyWebApp/www/admin/home");
                }else if($row[0]['type'] == 1){
                    //Redireccionamiento para el doctor
                    $_SESSION["doctor"] = $username; 
                    header("Location: /LiveSafelyWebApp/www/doctor/home");
                }else if($row[0]['type'] == 2){
                    //Redireccionamiento para el paciente
                    $_SESSION["user"] = $username; 
                    header("Location: /LiveSafelyWebApp/www/user/home");
                }else{
                    //De no encontar nada imprimir alerta
                    echo "<script>alertify.error('Su usario o contraseña estan incorrectos!');</script>";
                }
            }else{
                //De no encontar nada imprimir alerta
                echo "<script>alertify.error('Su usario o contraseña estan incorrectos!');</script>";
            }
        }catch(PDOException $e){
            echo $e;
        }
    }
}