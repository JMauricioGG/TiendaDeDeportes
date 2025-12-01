<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h1>Crear Producto</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Precio:</label>
        <input type="number" name="precio" value="{{ old('precio') }}" class="form-control" min="1" required>
    </div>
    <div class="mb-3">
        <label>Categoría:</label>
        <select name="categoria_id" class="form-select" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" @if(old('categoria_id')==$categoria->id) selected @endif>{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
</form>

</body>
</html>
