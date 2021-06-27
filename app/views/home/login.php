<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/LiveSafelyWebApp/www/home/"></base>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="login">
        <input type="text" name="username" id="">
        <input type="password" name="password" id="">
        <input type="submit" name="log-in" value="Iniciar Sesion">
    </form>
</body>
</html>
<?php  
require_once '../app/models/login.php';

if(isset($_POST['log-in'])){
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $loginModel = new login_model();
    $loginModel->login($user,$pass);
}

?>