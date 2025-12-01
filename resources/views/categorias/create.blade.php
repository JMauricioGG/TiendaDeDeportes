<!DOCTYPE html>
<html>
<head>
    <title>Crear Categoría</title>
</head>
<body>
<h1>Crear Categoría</h1>

@if($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}">
    <button type="submit">Guardar</button>
</form>

<a href="{{ route('categorias.index') }}">Volver</a>

</body>
</html>
