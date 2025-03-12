<!-- resources/views/configurations/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Configuraciones</h1>
    <div class="col-span-4">
        <a href="{{ route('configurations.create') }}" class="btn btn-new">Crear Configuración</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="p-2 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Key</th>
                <th>Valor</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($configurations as $configuration)
                <tr class="p-2 bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td>{{ $configuration->id }}</td>
                    <td>{{ $configuration->name }}</td>
                    <td>{{ $configuration->code }}</td>
                    <td>{{ $configuration->key }}</td>
                    <td>{{ $configuration->value }}</td>
                    <td>{{ $configuration->status }}</td>
                    <td>
                        <a href="{{ route('configurations.edit', $configuration) }}" class="btn btn-edit">Editar</a>
                        <form action="{{ route('configurations.destroy', $configuration) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
