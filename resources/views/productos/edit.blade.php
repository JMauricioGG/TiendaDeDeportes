<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>
<h1>Editar Producto</h1>

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Importante para usar el método PUT -->

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}"><br><br>

    <label>Categoría:</label>
    <select name="categoria_id">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" 
                @if(old('categoria_id', $producto->categoria_id) == $categoria->id) selected @endif>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('productos.index') }}">Volver</a>
</body>
</html>
