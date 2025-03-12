@extends('layouts.app')

@section('content')
    <h1>Editar Categoría</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="code">Código</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $category->code) }}">
            @error('code')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Otros campos... -->

        <button type="submit" class="btn btn-save">Actualizar</button>
    </form>
@endsection
