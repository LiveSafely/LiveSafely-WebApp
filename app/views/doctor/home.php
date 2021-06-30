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
        <h1>Inicio del doctor <?php echo $doctorModel->getDoctorNames($_SESSION["doctor"]);?> </h1>
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
            <input type="submit" value="Añadir Record" name="addRecord">
        </form>
        <hr>
        <h1>Crear Receta por paciente</h1>
        <form action="login" method="post">
            <select name="usernamePaciente" id="">
                <option value="">Seleccione un paciente</option>
                <?php 
                echo $doctorModel->getUserByDoctor($_SESSION["doctor"]);
                ?>
            </select>
            <input type="text" name="diagnosis" placeholder="Diagnostico" id=""><br><br>
            <input type="submit" value="Crear cabecera de la rece" name="addRecipe">
        </form>
        <hr>
        <h1>Añadir Enfermedades Infecciosas</h1>
        <form action="home" method="post">
            <input type="text" name="dName" id="" placeholder="Nombre"><br><br>
            <textarea name="dDesc" id="" cols="30" rows="10" placeholder="Descripción"></textarea><br><br>
            <input type="text" name="dType" id="" placeholder="Tipo"><br><br>
            <input type="submit" name="addDisease" value="Agregar enfermedad">
        </form>
        <hr>
        <h1>Mostrar historial completo por paciente</h1>
        <form action="home" method="post">
            <select name="usernamePaciente" id="">
                    <option value="">Seleccione un paciente</option>
                    <?php 
                    echo $doctorModel->getUserByDoctor($_SESSION["doctor"]);
                    ?>
            </select>
            <input type="submit" name="showCompleteRecord" value="Mostrar Historial completo">
        </form>
        <table>
            <tr>
                <th>Fecha</th>
                <th>Titulo</th>
                <th>Descripción</th>
            </tr>
            <?php 
                if(isset($_POST["showCompleteRecord"])){
                    $username = $_POST["usernamePaciente"];
                    $doctorModel->showRecordByPatient($username, $_SESSION["doctor"]);
                }
               
            ?>
        </table>
            

        
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
if(isset($_POST['addRecord'])){
    $title = $_POST["title"];
    $username = $_POST["usernamePaciente"];
    $desc = $_POST["desc"];
    $doctorModel->insertRecord($_SESSION["doctor"], $username, $title, $desc);
}
if(isset($_POST["addRecipe"])){
    $username = $_POST["usernamePaciente"];
    $diagnosis = $_POST["diagnosis"];
    $doctorModel->insertHeaderRecipe($username, $_SESSION["doctor"], $diagnosis);
}
if(isset($_POST["addDisease"])){
    $name =$_POST["dName"];
    $desc =$_POST["dDesc"];
    $type =$_POST["dType"];
    $doctorModel->insertDisease($name, $desc,$type);
}
?>