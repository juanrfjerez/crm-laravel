<!DOCTYPE html>
<html>
<head>
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ route('clientes.index') }}">CRM</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('proveedores.index') }}">Proveedores</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('ventas.index') }}">Ventas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('compras.index') }}">Compras</a></li>
            </ul>

            <form method="POST" action="{{ route('logout') }}" class="d-flex">
                @csrf
                <button class="btn btn-outline-danger btn-sm">
                    Cerrar sesión
                </button>
            </form>

        </div>
    </div>
</nav>

<div class="container mt-4">
    <h1>Clientes</h1>

    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Nuevo Cliente</a>

    <table id="tabla-clientes" class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        @if(auth()->user()->role_id == 1)
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Seguro que quieres borrar este cliente?')">
                                    Borrar
                                </button>
                            </form>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clientes->links() }}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabla-clientes').DataTable();
    });
</script>

</body>
</html>