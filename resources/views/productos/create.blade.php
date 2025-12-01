<!DOCTYPE html>
<html>
<head>
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Crear Producto</h1>

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
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
        </div>

        <div class="mb-3">
            <label>Categoría:</label>
            <select name="categoria_id" class="form-select">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @if(old('categoria_id')==$categoria->id) selected @endif>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
</body>
</html>
