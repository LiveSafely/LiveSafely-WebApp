<?php
    require_once '../app/models/doctor.php';
    $doctorModel = new doctor_model();
    if($_SESSION["doctor"]=="") header("Location: /LiveSafelyWebApp/www/home/login");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<base href="/LiveSafelyWebApp/www/doctor/"></base>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Doctor-Home</title>
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
                <div class="sidebar-brand-text mx-3">Doctor</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="home">
                    <i class="fas fa-fw fa-medkit"></i>
                    <span>Inicio</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Paciente
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Acciones</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Acciones sobre el paciente</h6>
                        <a class="collapse-item" href="create_user">A??adir Paciente</a>
                        <a class="collapse-item" href="create_record">Crear Historial</a>
                        <a class="collapse-item" href="create_recipe">Crear Receta</a>
                        <a class="collapse-item" href="watch_record">Ver Historial</a>
                        <a class="collapse-item" href="watch_User">Ver pacientes enfermos</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Enfermedades
            </div>
            <li class="nav-item">
                <a class="nav-link" href="add_sick"><i class="fas fa-virus fa-chart-area"></i><span>A??adir Enfermedad</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_dis"><i class="fas fa-fw fa-head-side-cough"></i><span>Asignar Enfermedades</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="free_user"><i class="fas fa-fw fa-file-medical"></i><span>Dar de alta</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $doctorModel->getDoctorNames($_SESSION["doctor"]);?></span>
                                <img class="img-profile rounded-circle"
                                    src="../../www/assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesion</a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
            <div class="container-fluid">
                <h1>Bienvenido al modulo del doctor</h1>
            </div>
             
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>LiveSafely Web App</span>
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
                        <span aria-hidden="true">??</span>
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
if(isset($_POST["asingValue"])){
    $username= $_POST["username"];
    $idDis = $_POST["diseases"];
    $status=$_POST["status"];
    $doctorModel->insertSickness($username,$_SESSION["doctor"], $idDis, $status);
}
?>