<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminVerProducto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/estiloAdminShow.css') }}"> 
    <link rel="icon" type="image/ico" href="Imagenes/favicon.ico">
</head>
<body>
    <div class="container mt-5">
        <div class="tarjeta">
            <div class="encabezado">
                <h1>Detalle del Producto</h1>
                <p>ID: {{ $producto->id }}</p>
            </div>
            <div class="cuadro p-4">
                <div class="contenido  mb-3">
                    <strong>Nombre:</strong>
                    <span>{{ $producto->nombre }}</span>
                </div>
                <div class="contenido  mb-3">
                    <strong>Descripción:</strong>
                    <span>{{ $producto->descripcion }}</span>
                </div>
                <div class="contenido  mb-3">
                    <strong>Cantidad:</strong>
                    <span>{{ $producto->cantidad }}</span>
                </div>
            </div>
            <a href="{{ route('productos.index') }}" class="btn btn-back">Volver al listado</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
