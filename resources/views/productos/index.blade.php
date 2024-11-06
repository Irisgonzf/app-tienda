<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminProductos</title>
    <link href="{{ asset('css/estiloAdmin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/ico" href="Imagenes/favicon.ico">
</head>
<body>
    <div class="container mt-5 text-center">
        <img src="Imagenes/logo.png" alt="Logo de la tienda" class="img-fluid mb-3"> 
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 justify-content-center">
            <div class="container-fluid">
                <a class="navbar-brand">Productos Jumpi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('asignaciones.index') }}">Asignaciones</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h2>Productos</h2>

                <!-- Filtro-->
                <form method="GET" action="{{ route('productos.index') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Buscar" value="{{ $buscar }}">
                        <button type="submit" class="btn btn-custom">Buscar</button>
                    </div>
                </form>

                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>
                                <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->id) }}" class="eliminar" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center mt-3">
                    <a href="{{ route('productos.create') }}" class="btn btn-custom">Crear Nuevo Producto</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
