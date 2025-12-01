@extends('layouts.app')

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
        <label class="form-label">Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Precio:</label>
        <input type="number" name="precio" value="{{ old('precio') }}" class="form-control" step="0.01">
    </div>

    <div class="mb-3">
        <label class="form-label">Categoría:</label>
        <select name="categoria_id" class="form-select">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" @if(old('categoria_id')==$categoria->id) selected @endif>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection
