<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
    <h1>Listado de Productos</h1>

    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Nuevo Producto</a>

    <table id="tabla-productos" class="table table-bordered">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>PDF</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>
                    @if($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}"
                             alt="Imagen"
                             width="60"
                             height="60"
                             style="object-fit: cover; border-radius: 4px;">
                    @else
                        <span class="text-muted">Sin imagen</span>
                    @endif
                </td>

                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->categoria }}</td>

                <td>
                    @if($producto->pdf)
                        <a href="{{ asset('storage/' . $producto->pdf) }}" target="_blank" class="btn btn-sm btn-info">
                            Ver PDF
                        </a>
                    @else
                        <span class="text-muted">Sin PDF</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar producto?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabla-productos').DataTable();
    });
</script>

</body>
</html>