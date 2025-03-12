@extends('layouts.app')

@section('content')
    <div class="col-span-4">


        <div id="contactModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Agregar Contacto</h2>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                        ✖
                    </button>
                </div>

                <form action="{{ route('contacts.store') }}" method="POST" class="mt-4">
                    @csrf

                    <!-- Campo oculto para almacenar el ID del usuario -->
                    <input type="hidden" id="user_id" name="user_id">

                    <!-- Tipo de contacto -->
                    <div class="mb-3">
                        <label for="label" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de Contacto</label>
                        <input type="text" id="label" name="label" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <!-- Valor del contacto -->
                    <div class="mb-3">
                        <label for="value" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor del Contacto</label>
                        <input type="text" id="value" name="value" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:text-white" required>
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-gray-500">Cancelar</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <h1 class="mb-4">Lista de Usuarios</h1>
        <a href="{{ route('users.create') }}" class="btn btn-new mb-4">Nuevo Usuario</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
            <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="p-2 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>LDAP</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr class="p-2 bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->ldap }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-edit">Editar</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Eliminar</button>
                            </form>
                            <!-- Botón para abrir el modal -->
                            <button onclick="openModal({{ $user->id }})" class="btn btn-edit">
                                Agregar Contacto
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}

    </div>




    <script>
        function openModal(userId) {
            document.getElementById("user_id").value = userId; // Asigna el ID del usuario al campo oculto
            document.getElementById("contactModal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("contactModal").classList.add("hidden");
        }
    </script>


@endsection
