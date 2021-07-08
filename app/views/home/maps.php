<?php
    require_once '../app/models/map.php';
    $model = new map_model();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/LiveSafelyWebApp/www/home/maps/"></base>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiveSafely</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
    <link href="../../assets/css/main.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container px-4">
            <a class="navbar-brand" href="#page-top">LiveSafely</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/LiveSafelyWebApp/www/home/home/home#about">Acerca de</a></li>
                    <li class="nav-item"><a class="nav-link" href="/LiveSafelyWebApp/www/home/home/home#services">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="/LiveSafelyWebApp/www/home/home/home#contact">Contacto</a></li>
                    <li class="nav-item active"><a class="nav-link active" href="home/maps">Ver mapas</a></li>
                    <li class="nav-item"><a class="nav-link" href="home/login">Iniciar Sesion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-maps text-white vh-100 d-flex align-items-center">
        <div class="tela"></div>
        <div class="container px-4 text-center position-relative">
            <h1 class="fw-bolder">¡Bienvenidos a LiveSafely!</h1>
            <p class="lead">La web app que te protege a ti y a los tuyos</p>
            <a class="btn btn-lg btn-success" href="#mapi">Revisa las zonas libres de enfermedades</a>
        </div>
    </header>
    <section class="w-100" id="mapi">
        <div class="container w-100">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Gestor del mapa</h6>
                        </div>
                        <div class="card-body">
                            <form action="maps" method="post">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <select name="dis" class="form-control" id="">
                                            <option value="">Seleccione una enfermedad</option>
                                            <?php $model->getDis(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="submit" value="Mostrar mapa" name="showMap" id="showMap" class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w-100 vh-50 bg-secondary position-relative d-flex">
        <div class="mapSivar w-100" id='mapSivar'></div>
    </section> 
    <footer class="py-3 bg-dark">
        <div class="container px-4">
            <p class="m-0 text-center text-white">LiveSafelyWebApp</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/map.js"></script>
    
</body>
</html>

