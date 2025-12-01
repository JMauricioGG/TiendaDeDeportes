@extends('layout')

@section('title', 'Productos')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear Producto</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>${{ $producto->precio }}</td>
            <td>{{ $producto->categoria->nombre }}</td>
            <td>
                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
