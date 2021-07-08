<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/LiveSafelyWebApp/www/home/maps/"></base>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LiveSafely</title>
    <link href="../../assets/css/main.css" rel="stylesheet">
</head>
<body id="page-top">
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
            <a class="btn btn-lg btn-success" href="#map">Revisa las zonas libres de enfermedades</a>
        </div>
    </header>
    <section id="map w-100">
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
                                        <select name="" class="form-control" id="">
                                            <option value="">Seleccione una enfermedad</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="submit" value="Mostrar mapa" name="showMap" class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>