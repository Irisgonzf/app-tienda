<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminAsignaciones</title>
    <link href="{{ asset('css/estiloAdmin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/ico" href="Imagenes/favicon.ico">
</head>

<body>
    <div class="container mt-5 text-center">

    <div class="d-flex justify-content-end">
        <form action="{{ route('asignaciones.export') }}" method="GET">
            <button type="submit" class="btn btn-custom exportar">Exportar todas las Asignaciones</button>
        </form>
    </div>

        <img src="Imagenes/logo.png" alt="Logo de la tienda" class="img-fluid mb-3"> 
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 justify-content-center">
            <div class="container-fluid">
                <a class="navbar-brand">Asignaciones Jumpi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="card shadow-sm">
            <div class="card-body">
                <h2>Asignaciones de Productos a Clientes</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Cliente</th>
                                <th>Producto</th>
                                <th>Cantidad Asignada</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($asignaciones as $asignacion)
                                <tr>
                                    <td>{{ $asignacion->cliente->nombre }}</td>
                                    <td>{{ $asignacion->producto->nombre }}</td>
                                    <td>{{ $asignacion->cantidad }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-3">
                        <a href="{{ route('asignaciones.create') }}" class="btn btn-custom">Crear Nueva Asignación</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
