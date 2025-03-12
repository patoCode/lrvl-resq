@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Categoría</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="name" class="form-control" id="nombre" value="{{ old('name') }}">
            @error('name')
                <div class="message-box message-box-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="code">Código</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}">
            @error('code')
                <div class="message-box message-box-error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control block">
                <option value="active">Activo</option>
                <option value="inactive">Inactivo</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-save">Guardar</button>
        </div>
    </form>
@endsection
