<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/LiveSafelyWebApp/www/"></base>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LiveSafely - Login</title>
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/safely.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container vh-100">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row" style="height:500px;">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">¡Bienvenido a LiveSafely Web App!</h1>
                                    </div>
                                    <form method="post" class="login">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"  placeholder="Ingrese su nombre de usuario...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Contraseña">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Iniciar Sesion" name="log-in" >
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="home">Regresar al inicio</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
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