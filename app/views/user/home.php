<?php
    require_once '../app/models/user.php';
    $userModel = new user_model();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/LiveSafelyWebApp/www/user/"></base>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio usuario</title>
</head>
<body>
    <h1>Inicio del usuario <?php echo $_SESSION["user"]; ?></h1>
    <a href="">Cerrar Sesion</a>
    <hr>
        <h1>Añadir lugares de Frecuencia</h1>
        <form action="home" method="post">
            <input type="text" name="latitude" placeholder="Latitud" id="">
            <input type="text" name="longitude" placeholder="Longitud" id="">
            <input type="text" name="descr" placeholder="Descripcion" id="">
            <input type="text" name="username" placeholder="Nombre de usuario" id="">
            <input type="submit" value="Agregar lugar" name="registerPlace" id="">
        </form>
    <hr>
    <h1>Mostrar Historial de Recetas</h1>
    <table>
            <tr>
                <th>Fecha</th>
                <th>Diagnostico</th>
                <th>Info</th>
                
            </tr>
            <?php $userModel->getRecipe($_SESSION["user"]);?>
    </table>
    <hr>
    <h1>Mostrar contenido de Recetas</h1>
    <table>
            <tr>
                <th>id</th>
                <th>Diagnostico</th>
                <th>Nombre</th>
                <th>Dosis</th>
                <th>Cantidad</th>
                <th>Comentario</th>
                
            </tr>
            <?php $userModel->getMedicine($_SESSION["user"]);?>
        </table>
</body>
</html>

<?php 

if(isset($_POST['registerPlace'])){
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $descr = $_POST["descr"];
    $username = $_POST["username"];
    $userModel->registerPlace($id, $latitude, $longitude, $descr, $username);
}

?>