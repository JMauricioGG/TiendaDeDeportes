<x-app-layout>
    <livewire:categoria />
</x-app-layout>
<div class="container mt-5">
    <h2 class="mb-4">CRUD de Categorías</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <button wire:click="crear" class="btn btn-primary mb-3">Nueva Categoría</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>
                    <button wire:click="editar({{ $categoria->id }})" class="btn btn-sm btn-warning">Editar</button>
                    <button wire:click="borrar({{ $categoria->id }})" class="btn btn-sm btn-danger">Borrar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    @if($modal)
    <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $categoria_id ? 'Editar Categoría' : 'Nueva Categoría' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label>Nombre:</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" wire:model="nombre">
                            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary">Cancelar</button>
                    <button type="button" wire:click="guardar" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
