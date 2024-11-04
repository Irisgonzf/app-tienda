<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminClientes</title>
    <link href="{{ asset('css/estiloAdmin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/ico" href="Imagenes/favicon.ico">
</head>

<body>
    <div class="container mt-5 text-center">
        <img src="Imagenes/logo.png" alt="Logo de la tienda" class="img-fluid mb-3"> 
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 justify-content-center">
            <div class="container-fluid">
                <a class="navbar-brand">Clientes Jumpi</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th class="d-none d-md-table-cell">DNI</th>
                                <th class="d-none d-md-table-cell">Dirección</th>
                                <th class="d-none d-md-table-cell">Teléfono</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellidos }}</td>
                                <td class="d-none d-md-table-cell">{{ $cliente->dni }}</td>
                                <td class="d-none d-md-table-cell">{{ $cliente->direccion }}</td>
                                <td class="d-none d-md-table-cell">{{ $cliente->telefono }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>
                                    <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}"  class="eliminar" method="POST">
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
                        <a href="{{ route('clientes.create') }}" class="btn btn-custom">Crear Nuevo Cliente</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
