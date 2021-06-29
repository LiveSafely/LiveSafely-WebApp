<?php
    require_once '../app/models/doctor.php';
    $doctorModel = new doctor_model();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/LiveSafelyWebApp/www/doctor/"></base>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Doctor</title>
</head>
<body>
        <h1>Inicio del doctor <?php echo $_SESSION["doctor"];?> </h1>
        <a href="">Cerrar Sesion</a>
        <hr>
        <h1>Añadir Paciente</h1>
        <form action="home" method="post">
            <input type="text" name="name" placeholder="Nombre" id="">
            <input type="text" name="lastname" placeholder="Apellido" id="">
            <input type="text" name="username" placeholder="Nombre de usuario" id="">
            <input type="password" name="password" placeholder="Contraseña" id="">
            <input type="email" name="email" placeholder="Email" id="">
            <input type="text" name="dui" placeholder="Dui" id="">
            <input type="number" name="age" placeholder="Edad" id="">
            <input type="submit" value="Agregar paciente" name="register" id="">
        </form>
        <hr>
        <h1>Crear Historial por paciente</h1>
        <form action="home" method="post">
        <select name="usernamePaciente" id="">
            <option value="">Seleccione un paciente</option>
            <?php 
               echo $doctorModel->getUserByDoctor($_SESSION["doctor"]);
            ?>
        </select>
        <br>
        <input type="text" name="title" placeholder="Titulo" id=""><br>
        <textarea name="desc" id="" cols="30" rows="10" placeholder="Descripción de la visita"></textarea>
        <input type="submit" value="Añadir Record">
        </form>
        
</body>
</html>

<?php 

if(isset($_POST['register'])){
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $username = $_POST["username"];
    $pass = $_POST["password"];
    $email = $_POST["email"];
    $dui = $_POST["dui"];
    $age = $_POST["age"];
    $doctorModel->registerPerson($name, $lastname, $username, $_SESSION["doctor"], $pass, $email, $dui, $age);
}


?>