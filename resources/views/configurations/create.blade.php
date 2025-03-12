<!-- resources/views/configurations/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Configuración</h1>

        <form action="{{ route('configurations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="key">Key</label>
                <input type="text" class="form-control" name="key" id="key" value="{{ old('key') }}" required>
            </div>

            <div class="form-group">
                <label for="value">Valor</label>
                <input type="text" class="form-control" name="value" id="value" value="{{ old('value') }}" required>
            </div>

            <div class="form-group">
                <label for="status">Estado</label>
                <select class="form-control" name="status" id="status">
                    <option value="ACTIVE" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>Activo</option>
                    <option value="INACTIVE" {{ old('status') == 'INACTIVE' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
