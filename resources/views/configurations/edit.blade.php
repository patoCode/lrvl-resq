@extends('layouts.app')

@section('content')
    <div class="col-span-4">
        <h1>Editar Configuración</h1>
        <form action="{{ route('configurations.update', $configuration) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('name', $configuration->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Code</label>
                <textarea class="form-control" name="code" id="code">{{ old('code', $configuration->code) }}</textarea>
            </div>

            <div class="form-group">
                <label for="value">Valor</label>
                <input type="text" class="form-control" name="value" id="value" value="{{ old('value', $configuration->value) }}" required>
            </div>

            <div class="form-group">
                <label for="status">Estado</label>
                <select class="form-control" name="status" id="status">
                    <option value="ACTIVE" {{ old('status', $configuration->status) == 'ACTIVE' ? 'selected' : '' }}>Activo</option>
                    <option value="INACTIVE" {{ old('status', $configuration->status) == 'INACTIVE' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-save">Guardar</button>
        </form>
    </div>
@endsection
