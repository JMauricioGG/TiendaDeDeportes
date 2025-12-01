@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Categoría</h1>
    <p><strong>ID:</strong> {{ $categoria->id }}</p>
    <p><strong>Nombre:</strong> {{ $categoria->nombre }}</p>
    <a href="{{ route('categorias.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection
