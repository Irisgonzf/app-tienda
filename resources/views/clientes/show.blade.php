<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminVerCliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/estiloAdminShow.css') }}">
    <link rel="icon" type="image/ico" href="Imagenes/favicon.ico">
</head>
<body>
    <div class="container mt-5">
        <div class="tarjeta">
            <div class="encabezado">
                <h1>Detalle del Cliente</h1>
                <p>ID: {{ $cliente->id }}</p>
            </div>
            <div class="cuadro p-4">
                <div class="contenido mb-3">
                    <strong>Nombre:</strong>
                    <span>{{ $cliente->nombre }}</span>
                </div>
                <div class="contenido mb-3">
                    <strong>Apellidos:</strong>
                    <span>{{ $cliente->apellidos }}</span>
                </div>
                <div class="contenido mb-3">
                    <strong>DNI:</strong>
                    <span>{{ $cliente->dni }}</span>
                </div>
                <div class="contenido mb-3">
                    <strong>Dirección:</strong>
                    <span>{{ $cliente->direccion }}</span>
                </div>
                <div class="contenido mb-3">
                    <strong>Teléfono:</strong>
                    <span>{{ $cliente->telefono }}</span>
                </div>
                <div class="contenido mb-3">
                    <strong>Email:</strong>
                    <span>{{ $cliente->email }}</span>
                </div>
            </div>
            <a href="{{ route('clientes.index') }}" class="btn btn-back">Volver a la lista</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
