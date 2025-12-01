<!DOCTYPE html>
<html>
<head>
    <title>Categorías</title>
</head>
<body>
<h1>Categorías</h1>

<a href="{{ route('categorias.create') }}">Crear Categoría</a>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    @foreach($categorias as $categoria)
    <tr>
        <td>{{ $categoria->id }}</td>
        <td>{{ $categoria->nombre }}</td>
        <td>
            <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Eliminar categoría?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<a href="{{ route('productos.index') }}">Ver Productos</a>

</body>
</html>
