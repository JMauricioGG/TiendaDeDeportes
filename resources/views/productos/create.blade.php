@extends('layout')

@section('title', 'Crear Producto')

@section('content')
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
        <input type="number" name="precio" value="{{ old('precio') }}" class="form-control" required min="1">
    </div>

    <div class="mb-3">
        <label>Categoría:</label>
        <select name="categoria_id" class="form-select" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" @if(old('categoria_id')==$categoria->id) selected @endif>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
