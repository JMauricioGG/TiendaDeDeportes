<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
</head>
<body>
<h1>Crear Producto</h1>

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('productos.store') }}" method="POST">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}"><br><br>

    <label>Precio:</label>
    <input type="number" name="precio" value="{{ old('precio') }}" step="0.01" required><br><br>

    <label>Categoría:</label>
    <select name="categoria_id">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" @if(old('categoria_id')==$categoria->id) selected @endif>{{ $categoria->nombre }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Guardar</button>
</form>

<a href="{{ route('productos.index') }}">Volver</a>

</body>
</html>
