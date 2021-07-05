<?php
    require_once '../app/models/admin.php';
    $adminModel = new admin_model();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/LiveSafelyWebApp/www/admin/"></base>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View</title>
</head>
<body>
<h1>Inicio del Admin </h1>
        <a href="">Cerrar Sesion</a>
        <hr>
        <h1>Añadir Doctor</h1>
        <form action="home" method="post">
            <input type="text" name="name" placeholder="Nombre" id="">
            <input type="text" name="lastname" placeholder="Apellido" id="">
            <input type="text" name="username" placeholder="Nombre de usuario" id="">
            <input type="password" name="password" placeholder="Contraseña" id="">
            <input type="email" name="email" placeholder="Email" id="">
            <input type="text" name="dui" placeholder="Dui" id="">
            <input type="text" name="noJunta" placeholder="Numero de Junta" id="">
            <input type="number" name="age" placeholder="Edad" id="">
            <input type="submit" value="Agregar doctor" name="register" id="">
        </form>
        <hr>
</body>
</html>