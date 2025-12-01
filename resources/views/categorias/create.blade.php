<!DOCTYPE html>
<html>
<head>
    <title>Crear Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Crear Categoría</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
</body>
</html>
