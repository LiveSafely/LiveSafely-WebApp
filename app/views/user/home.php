<?php
    require_once '../app/models/user.php';
    $userModel = new user_model();
    if($_SESSION["user"]=="") header("Location: /LiveSafelyWebApp/www/home/login");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<base href="/LiveSafelyWebApp/www/user/"></base>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>User-Home</title>
    <link href="../../www/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../../www/assets/css/safely.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <div class="sidebar-brand-text mx-3">User</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="home">
                    <i class="fas fa-fw fa-medkit"></i>
                    <span>Inicio</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Mapa
            </div>
            <li class="nav-item">
                <a class="nav-link active" href="add_location"><i class="fas fa-virus fa-chart-area"></i><span>Añadir Lugares de frecuencia</span></a>
            </li>
            <div class="sidebar-heading">
                Historial de usuario
            </div>
            <li class="nav-item">
                <a class="nav-link" href="show_recipe"><i class="fas fa-fw fa-head-side-cough"></i><span>Historial de recetas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="show_medicine"><i class="fas fa-fw fa-file-medical"></i><span>Contenido de recetas</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $userModel->getUserNames($_SESSION["user"]);?></span>
                                <img class="img-profile rounded-circle"
                                    src="../../www/assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="close" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesion</a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
            <div class="container-fluid">
                <h1>Bienvenido al modulo de Usuario</h1>
            </div>
             
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>LiveSafelyWebApp</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seguro que deseas salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona cerrar si realmente quieres cerrar sesion</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="close">Cerrar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../www/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../www/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../www/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../www/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../www/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../www/assets/js/demo/chart-area-demo.js"></script>
    <script src="../../www/assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>

<?php 

if(isset($_POST['registerPlace'])){
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $descr = $_POST["descr"];
    $username = $_POST["username"];
    $userModel->registerPlace($id, $latitude, $longitude, $descr, $dept, $username);
}

?>