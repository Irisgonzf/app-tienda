<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminAsignarProducto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/estiloAdminEdit.css') }}">
    <link rel="icon" type="image/ico" href="Imagenes/favicon.ico">
</head>
<body>
    <div class="tarjeta">
        <div class="encabezado">
            <h1>Asociar Producto a Cliente</h1>
        </div>
        <div class="form-section">
            <form action="{{ route('asignaciones.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="cliente_id" class="form-label">Seleccionar Cliente:</label>
                    <select name="cliente_id" id="cliente_id" class="form-control" required>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="producto_id" class="form-label">Seleccionar Producto:</label>
                    <select name="producto_id" id="producto_id" class="form-control" required>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }} (Existencias: {{ $producto->cantidad }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad a Asignar:</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Asignar Producto</button>
                    <a href="{{ route('asignaciones.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
