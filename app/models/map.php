<?php
//Se manda a llamar la instancia de conexion a la base de datos
require '../app/utils/Connection.php';

//Creando modelo para manejar los mapas de contagio
//Aqui iran todas las funciones que se realizaran en este modulo
class map_model{
    //Creando el constructor
    public function __construct() {
	}
    //Funcion para obtener todas las enfermedades registradas en el aplicativo
    public function getDis(){
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
    //Funcion para obtener el arreglo de coordenadas para posteriormente trabajarlo en el mapa
    public function returnArrayPlaces($idDis){
        try{
            $coor="";
            $connection = new Connection;
            $connection->conn();
            $statement = $connection->conn->prepare("select places.latitude as lt, places.longitude as lg, places.dept as dp from sickness, users, places where places.username = users.username and users.username = sickness.username and sickness.status = 1 and sickness.id_diseases = $idDis");
            $statement->execute();
            $result = $statement->fetchAll();
            $n = count($result);
            for ($i = 0; $i <= $n-1; $i++) {
                $coor .= "['".$result[$i]['dp']."',". $result[$i]['lt'] .",". $result[$i]['lg'] ."],";
                echo "['".$result[$i]['dp']."',". $result[$i]['lt'] .",". $result[$i]['lg'] ."],";
            }
            return $coor;
            
        }catch(PDOException $e){
            echo $e;
        }
    }
}

