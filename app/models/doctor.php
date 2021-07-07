<?php
//Se manda a llamar la instancia de conexion a la base de datos
require '../app/utils/Connection.php';

//Creando modelo del doctor
//Aqui iran todas las funciones que se realizaran en este modulo
class doctor_model{
    //Creando el constructor
    public function __construct() {
	}

    //Funcion para registrar un paciente.
    public function registerPerson($name, $lastname, $username, $idDoctor, $password, $email, $dui, $age){
        try{
            //Se manejan 3 estados; 0 admin, 1 Doctor, 2 Paciente.
            //Si el usuario esta activo se le deja en 1 si no, en 0
            $query = "INSERT INTO users VALUES('$name','$lastname', '$username', '$idDoctor', '$password', '$email', '$dui',null,$age, 2, 1)";
            $connection = new Connection;
            $connection->conn();
            $connection->conn->exec($query);
            echo "<script> window.location.href='create_user'; alertify.success('Paciente agregado correctamente!');</script>";
        }catch(PDOException $e){
            echo $e;
        }        

    }

    //Funcion para retornar contar todos los pacientes de un doctor
    function counUsersByDoctor($idDoctor){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT count(*) FROM users WHERE id_doctor='$idDoctor'");
            $statement->execute();
            $result = $statement->fetchAll();
            echo $result[0][0];
        }catch(PDOException $e){
            echo $e;
        }
    }
    //Funcion par obtener el nombre y el apellido del doctor
    public function getDoctorNames($idDoctor){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT name,lastname FROM users WHERE username='$idDoctor'");
            $statement->execute();
            $result = $statement->fetchAll();
            //De lo retornado se obtiene un arreglo matriz con filas y columnas, se extrae todo de la primera fila, y de su columna respectivamente.
            $fullname = $result[0][0]." ".$result[0][1];
            //Se imprime el nombre completo
            echo $fullname;
        }catch(PDOException $e){
            echo $e;
        }
    }
    //Funcion obtener todos los usuarios de un doctor, sera usada para colocarlos en un combobox
    public function getUserByDoctor($idDoctor){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT username FROM users WHERE id_doctor='$idDoctor'");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            echo $n;
            //Se recorre todas las filas y se imprime el nombre de usuario, para ser incluido en el combobox del html
            for ($i = 0; $i <= $n-1; $i++) {
                echo "<option value='". $result[$i]['username'] ."'>". $result[$i]['username'] ."</option>";
            }            
        }catch(PDOException $e){
            echo $e;
        }
    }

    //Funcion para insertar receta
    public function insertRecord($idDoctor, $username, $title, $desc){
        //Se crea la fecha en formato Anio/Mes/Dia para ser insertada en la BD.
        $dateToday = date("Y/m/d");
        try{
            //Se prepara la query de insercsion.
            $query = "INSERT INTO record(title,descr, date, username, id_doctor) VALUES('$title','$desc', '$dateToday', '$username', '$idDoctor')";
            $connection = new Connection;
            $connection->conn();
            //Se ejecuta
            $connection->conn->exec($query);
            echo "<script>alertify.success('Historial Agregado correctamente!');</script>";
        }catch(PDOException $e){
            echo "<script>alertify.error('".$e."');</script>";
        }      
    }
    
    //Funcion para crear la cabecera de la receta
    public function insertHeaderRecipe($username, $idDoctor, $diagnosis){
        //Se crea la fecha en formato Anio/Mes/Dia para ser insertada en la BD.
        $dateToday = date("Y/m/d");
        try{
            $query = "INSERT INTO recipe(username,id_doctor, date, diagnosis) VALUES('$username','$idDoctor', '$dateToday', '$diagnosis')";
            $connection = new Connection;
            $connection->conn();
            $connection->conn->exec($query);
            echo "<script>alertify.success('Cabecera añadida correctamente!');</script>";
        }catch(PDOException $e){
            echo $e;
        }  
    }   
    
    //Funcion para crear la enfermedad.
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

    //Funcion para obtener el historiaal segun el paciente.
    public function showRecordByPatient($username, $idDoctor){
        try{
            $connection = new Connection;
            $connection->conn();
            //Se filtra en base a fecha, titulo y descripcion
            $statement = $connection->conn->prepare("SELECT date, title, descr FROM record WHERE id_doctor='$idDoctor' AND username='$username'");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            for ($i = 0; $i <= $n-1; $i++) {
                //Se retorna un html que contiene los datos en tabla del historial del paciente
                echo "<tr><td>".$result[$i]['date']."</td><td>".$result[$i]['title']."</td><td>".$result[$i]['descr']."</td></tr>";
            }
        }catch(PDOException $e){
            echo $e;
        }
    }

    //Funcion para obtener todas las enfermedades para un combobox y poderlo usar posteriormente
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
                //Imprimir en formato HTML los datos de las enfermedades, en un option para el combobox
                echo "<option value='". $result[$i]['id'] ."'>". $result[$i]['name'] ."</option>";
            }
        }catch(PDOException $e){
            echo $e;
        }
    }

    //Funcion para asignar una enfermedad a un paciente.
    public function insertSickness($username,$idDoctor, $idDis, $status){
        try{
            $connection = new Connection;
            $connection->conn();
            //Primero vamos a verificar que el usuario no tenga activa esa enfermedad
            $statement = $connection->conn->prepare("SELECT * FROM sickness WHERE username='$username' AND id_diseases='$idDis' AND status=1");
            $statement->execute();
            $result = $statement->rowCount();
            if($result){
                //Si ya esta activa, se retorna un mensaje de que ya existe ese registro
                echo "Ya existe un registro de ese paciente con esa enfermedad";
            }else{
                //Si no debemos verificar si ese paciente ya tuvo esa enfermedad.
                $statement = $connection->conn->prepare("SELECT * FROM sickness WHERE username='$username' AND id_diseases='$idDis' AND status=0");
                $statement->execute();
                $result = $statement->rowCount();
                if($result){
                    //Si ya estuvo enfermo, etonces se le activa nuevamente la enfermedad
                    $query = "UPDATE sickness SET status='$status' WHERE id_diseases='$idDis' AND username='$username'";
                    $connection = new Connection;
                    $connection->conn();
                    $connection->conn->exec($query);
                    $connection = null;
                    echo"<script type='text/javascript'>window.location.href='add_dis'</script>";
                }else{
                    //Si no se encuentra registro previo entonces se inserta la nueva enfermedad
                    $query = "INSERT INTO sickness(username, id_diseases, id_doctor, status) VALUES('$username',$idDis,'$idDoctor',$status)";
                    $connection = new Connection;
                    $connection->conn();
                    $connection->conn->exec($query);
                    $connection = null;
                    echo"<script type='text/javascript'>window.location.href='add_dis'</script>";
                }
                
            }
            $connection = null; 
            echo"<script type='text/javascript'>window.location.href='add_dis'</script>";
        }catch(PDOException $e){
            echo "No has Seleccionado nada";
        }
    }

    //Funcion para obtener la enfermedades activas de los pacientes.
    public function getSickByStatus($idDoctor){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT users.name as name, users.lastname as lastname, diseases.name as diName, sickness.status FROM users, diseases, sickness WHERE users.username=sickness.username and diseases.id = sickness.id_diseases AND sickness.id_doctor='$idDoctor' AND sickness.status=1 ");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            for ($i = 0; $i <= $n-1; $i++) {
                //Se retorna todo en formato de tabla
                echo "<tr><td>".$result[$i]['name']."</td><td>".$result[$i]['lastname']."</td><td>".$result[$i]['diName']."</td><td>Activo</td></tr>";
            }
        }catch(PDOException $e){
            echo $e;
        }
    }

    //Funcion para dar de alta a los pacientes segun estado
    public function getSickByStatusForAction($idDoctor){
        try{
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("SELECT users.name as name, users.lastname as lastname, users.username as username, diseases.name as diName, diseases.id as disId, sickness.status FROM users, diseases, sickness WHERE users.username=sickness.username and diseases.id = sickness.id_diseases AND sickness.id_doctor='$idDoctor' AND sickness.status=1 ");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            for ($i = 0; $i <= $n-1; $i++) {
                //Se retorna con un campo mas que redirecciona con el id de la enfermedad y el del usuario a una función en el modelo que se encarga de cambiar el estado en la bd
                echo "<tr><td>".$result[$i]['name']."</td><td>".$result[$i]['lastname']."</td><td>".$result[$i]['diName']."</td><td>Activo</td><td><a href='freeUser?username=".$result[$i]['username']."&dis=".$result[$i]['disId']."'>Dar de alta</a></td></tr>";
            }
        }catch(PDOException $e){
            echo $e;
        }
    }

    //Funcion para dar de alta al paciente
    public function updateSickStatusByUser($idDis, $username){
        try{
            $connection = new Connection;
            $connection->conn();
            //Se actualiza el estado en 0 para que ya no aparezca con una enfermedad reflejada.
            $query = "UPDATE sickness SET status=0 WHERE id_diseases='$idDis' AND username='$username'";
            $connection = new Connection;
            $connection->conn();
            $connection->conn->exec($query);
            $connection = null;
        }catch(PDOException $e){
            echo $e;
        }
    }

}