<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">CRM</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('proveedores.index') }}">Proveedores</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('ventas.index') }}">Ventas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('compras.index') }}">Compras</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Imagen actual</label><br>
            @if($producto->imagen)
                <img src="{{ asset('storage/' . $producto->imagen) }}"
                     alt="Imagen del producto"
                     width="120"
                     height="120"
                     style="object-fit: cover; border-radius: 6px;">
            @else
                <p class="text-muted">Este producto no tiene imagen</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Cambiar imagen (opcional)</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <div class="mb-3">
            <label>Archivo PDF (opcional)</label>
            <input type="file" name="pdf" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" value="{{ $producto->precio }}" required>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}" required>
        </div>

        <div class="mb-3">
            <label>Categoría</label>
            <input type="text" name="categoria" class="form-control" value="{{ $producto->categoria }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>