@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Categoría</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $category->nombre) }}">
                @error('nombre')
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

            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection
