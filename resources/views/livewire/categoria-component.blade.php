<div class="p-6">

    @if (session()->has('message'))
        <div class="p-2 block bg-green-400 text-green-800 bordedr border-green-800">
            {{ session('message') }}
        </div>
    @endif

    <!-- Formulario de Crear/Editar Categoría -->
    <div class="mb-4 bg-white rounded-md p-2">
        <h2>{{ $categoria_id ? 'Editar Categoría' : 'Crear Categoría' }}</h2>
        Nombre {{ $nombre }}
        <form wire:submit.prevent="save">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" wire:model="nombre" class="form-control" required>
                <!-- Mostrar error si existe -->
                @error('nombre')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_public">¿Es Pública?</label>
                <input type="checkbox" id="is_public" wire:model="is_public" class="form-control">
            </div>

            <div class="form-group">
                <label for="is_promediable">¿Es Promediable?</label>
                <input type="checkbox" id="is_promediable" wire:model="is_promediable" class="form-control">
            </div>

            <div class="form-group">
                <label for="is_schedulable">¿Es Programable?</label>
                <input type="checkbox" id="is_schedulable" wire:model="is_schedulable" class="form-control">
            </div>

            <div class="form-group">
                <label for="status">Estado</label>
                <select wire:model="status" class="form-control">
                    <option value="ACTIVE">Activo</option>
                    <option value="INACTIVE">Inactivo</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-400 text-blue-900 p-2 rounded-md border-blue-900">{{ $categoria_id ? 'Actualizar' : 'Crear' }} Categoría</button>
        </form>
    </div>

    <!-- Tabla de Categorías -->
    <div class="mt-4 bg-white p-2">
        <h2>Listado de Categorías</h2>

        <table class="table table-striped min-w-full">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Code</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->name }}</td>
                    <td>{{ $categoria->code }}</td>
                    <td>{{ $categoria->status }}</td>
                    <td>
                        <button wire:click="edit({{ $categoria->id }})" class="bg-yellow-400 text-yellow-900 p-2 rounded-md border-yellow-900">Editar</button>
                        <button wire:click="delete({{ $categoria->id }})" class="bg-red-400 text-red-900 p-2 rounded-md border-red-900">Eliminar</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
