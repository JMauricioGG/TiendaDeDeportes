<!DOCTYPE html>
<html>
<head>
    <title>Editar Categoría</title>
</head>
<body>
<h1>Editar Categoría</h1>

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $categoria->nombre }}">
    <button type="submit">Actualizar</button>
</form>

<a href="{{ route('categorias.index') }}">Volver</a>

</body>
</html>
