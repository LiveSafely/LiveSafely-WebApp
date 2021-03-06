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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
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
            <li class="nav-item">
                <a class="nav-link" href="home">
                    <i class="fas fa-fw fa-medkit"></i>
                    <span>Inicio</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Paciente
            </div>
            <li class="nav-item active">
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
                                <a class="dropdown-item" href="close" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesion</a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
            <div class="container-fluid">
                <h1>Recetas</h1>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Crear receta</h6>
                    </div>
                    <div class="card-body">
                        <form action="create_recipe" method="post">
                            <select name="usernamePaciente" class="form-control mb-2"  id="">
                                <option value="">Seleccione un paciente</option>
                                <?php 
                                echo $doctorModel->getUserByDoctor($_SESSION["doctor"]);
                                ?>
                            </select>
                            <input type="text" class="form-control mb-2" name="diagnosis" placeholder="Diagnostico" id="">
                            <div class="row mb-2">
                                <div class="col"><label for="">??Cuantos medicamentos desea incluir en la receta?</label></div>
                                <div class="col"><input type="number" name="amount" id="" class="form-control"></div>
                            </div>
                            <input type="submit" class="form-control btn btn-success" value="Crear cabecera de la receta" name="addRecipe">
                        </form>
                    </div>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">A??adir medicamentos a la receta</h6>
                    </div>
                    <div class="card-body">
                        <form action="create_recipe" method="post">       
                        <?php 
                            if(isset($_POST["addRecipe"])){
                                $username = $_POST["usernamePaciente"];
                                $diagnosis = $_POST["diagnosis"];
                                $_SESSION["cantidad"] = $_POST["amount"];

                                $doctorModel->insertHeaderRecipe($username, $_SESSION["doctor"], $diagnosis);
                                $doctorModel->setMedicines($_SESSION["cantidad"]);
                            }
                        ?>
                        </form>
                    </div>
                </div>
                
                <hr>
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
    <script src="../../www/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../www/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../www/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../www/assets/js/sb-admin-2.min.js"></script>
    <script src="../../www/assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../../www/assets/js/demo/chart-area-demo.js"></script>
    <script src="../../www/assets/js/demo/chart-pie-demo.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>

</html>

<?php
if(isset($_POST["insertMedicines"])){
    $idRecipe = $doctorModel->getLastRecipe();
    for($i = 0; $i < $_SESSION["cantidad"]; $i++){
        $name=$_POST["name".$i];
        $dosis=$_POST["dosis".$i];
        $cantidad=$_POST["qty".$i];
        $comment=$_POST["comment".$i];
        $doctorModel->insertMedicines($idRecipe, $name, $dosis, $cantidad, $comment);
    }
    $_SESSION["cantidad"] = null;
    echo "<script>alertify.success('Receta agregada con exito!');</script>";
}
?>