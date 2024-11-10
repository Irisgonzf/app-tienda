<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumpi</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/estiloPortada.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/ico" href="Imagenes/favicon.ico">
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('index') }}">Jumpi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('formulario') }}">Formulario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('catalogo') }}">Catálogo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Imagenes/1.png" class="d-block w-100 imagen-carrusel" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="Imagenes/2.png" class="d-block w-100 imagen-carrusel" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="Imagenes/3.png" class="d-block w-100 imagen-carrusel" alt="Banner 3">
            </div>
        </div>
    </div>

    

    <section class="descripcion text-center">
        <div class="container">
            <h2>¡Bienvenidos a Jumpi!</h2>
            <p>En nuestra tienda de jueguetes, encontrarás todo lo que necesitas para los más pequeños.</p>
        </div>
    </section>



    <!--Mostrar tres productos -->
<section class="seccion-productos py-5">
        <div class="container">
            <div class="row">
                @foreach($productos as $producto)
                    <div class="col-md-4 mb-4">
                        <div class="card tarjeta-producto">
                            <img src="Imagenes/{{$producto->imagen_ruta}}" alt="{{$producto->nombre}}" class="card-img-top imgagen-tarjeta">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{$producto->nombre}}</h5>
                                <p class="card-text">{{$producto->descripcion}}</p>
                                <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#modal{{$producto->id}}">Ver más</button>
                            </div>
                        </div>
                    </div>

            <!-- Modal para ver los producto-->
            <div class="modal fade" id="modal{{$producto->id}}" tabindex="-1" aria-labelledby="modalLabel{{$producto->id}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{$producto->id}}">{{$producto->nombre}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>{{$producto->descripcion}}</p>
                                    <p class="negrita">Cantidad Disponible: {{$producto->cantidad}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    </section>


    <footer id="footer-tienda" class="py-4 mt-auto">
        <img class="logo-footer" src="Imagenes/logo.png" alt="ñpgp">
        <p class="mt-3">&copy; 2024 Tienda Infantil. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
