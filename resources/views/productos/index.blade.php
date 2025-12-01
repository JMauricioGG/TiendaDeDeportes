<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
</head>
<body>
<h1>Productos</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<a href="{{ route('productos.create') }}">Crear Producto</a>
<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Acciones</th>
    </tr>
    @foreach($productos as $producto)
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->nombre }}</td>
        <td>{{ $producto->categoria->nombre }}</td>
        <td>
            <a href="{{ route('productos.edit', $producto->id) }}">Editar</a>
            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<a href="{{ route('categorias.index') }}">Ver Categorías</a>
</body>
</html>
