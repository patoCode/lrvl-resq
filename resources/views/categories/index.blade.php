@extends('layouts.app')

@section('content')
    <!-- Aquí va el contenido específico de la vista -->
    <div class="container">
        <h1>Categorías</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Crear Categoría</a>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Code</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->status }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Editar</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
