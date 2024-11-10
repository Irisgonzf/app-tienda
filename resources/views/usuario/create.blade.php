<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jumpi</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/estiloFormulario.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/ico" href="Imagenes/favicon.ico">
</head>
<body>


    <!-- Barra de Navegación -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('index') }}">Jumpi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('index') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('catalogo') }}">Catálogo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="descripcion text-center">
        <div class="container">
            <h2 class="display-4 text-uppercase font-weight-bold">¡Contactanos!</h2>
        </div>
    </section>

    <!-- Mensaje de envio correcto -->
    @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario -->
    <div class="tarjeta">
        <div class="encabezado">
            <h1 class="text-white">Formulario de Contacto</h1>
        </div>
        <div class="form-section">
            <form action="{{ route('formulario.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>

                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-custom">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <footer id="footer-tienda" class="py-4 mt-5">
        <div class="container text-center">
            <img class="logo-footer mb-3" src="Imagenes/logo.png" alt="Logo">
            <p class="mt-3">&copy; 2024 Tienda Infantil. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
