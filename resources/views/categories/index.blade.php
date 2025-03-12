@extends('layouts.app')

@section('content')
    <div class="col-span-4">
        <a href="{{ route('categories.create') }}" class="btn btn-new">Crear Categoría</a>
    </div>
    <div class="col-span-4">
        <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="p-2 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="border border-gray-300">Nombre</th>
                    <th class="border border-gray-300">Code</th>
                    <th class="border border-gray-300">Status</th>
                    <th class="border border-gray-300">Conditions</th>
                    <th class="border border-gray-300">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr class="p-2 bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td class="border border-gray-300">{{ $category->name }}</td>
                    <td class="border border-gray-300">{{ $category->code }}</td>
                    <td class="border border-gray-300">{{ $category->status }}</td>
                    <td class="border border-gray-300">
                        {{ $category->is_public ? 'si':'no' }} <br>
                        {{ $category->is_promediable ? 'si':'no' }} <br>
                        {{ $category->is_schedulable ? 'si':'no' }}
                    </td>
                    <td class="border border-gray-300">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-edit">Editar</a>
                        <button
                            class="btn btn-common-action"
                            onclick="openModal(event, {{ $category->id }})"
                        >
                            Ver Colas
                        </button>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Modal -->
        <div id="modal-colas" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex justify-center items-center">
            <div class="bg-slate-800 text-gray-200 p-6 rounded-lg shadow-lg w-2/3">
                <h2 class="text-lg font-bold mb-4">Gestión de Colas y Técnicos</h2>

                <input type="hidden" name="categoria_id" id="hidden-categoria">
                <!-- Select de usuarios -->
                <label class="block mb-2">Seleccionar Usuario:</label>
                <select id="select-usuario" name="usuario" class="border rounded px-2 py-1 w-full mb-4">
                    <!-- Opciones cargadas dinámicamente -->
                </select>

                <!-- Select de colas -->
                <label class="block mb-2">Seleccionar Cola:</label>
                <select id="select-cola" class="border rounded px-2 py-1 w-full mb-4" name="cola">
                    <!-- Opciones cargadas dinámicamente -->
                </select>

                <button onclick="agregarTecnico()" class="bg-green-500 text-white px-4 py-2 rounded">Agregar Técnico</button>

                <hr class="my-4">

                <h3 class="text-lg font-bold">Colas de la Categoría</h3>
                <div id="contenido-colas">
                    <!-- Aquí se mostrarán las colas con sus técnicos -->
                </div>

                <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
            </div>
        </div>



    </div>
    <script>
        function openModal(event, categoriaId) {
            event.preventDefault();
            let categoria = document.getElementById("hidden-categoria");
            categoria.value = categoriaId
            fetch(`/categories/${categoriaId}/colas`)
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    // Cargar usuarios en el select
                    let selectUsuarios = document.getElementById("select-usuario");
                    if (data.usuarios.length > 0) {
                        selectUsuarios.innerHTML = data.usuarios.map(usuario =>
                            `<option value="${usuario.id}">${usuario.name}</option>`
                        ).join("");
                    } else {
                        selectUsuarios.innerHTML = '<option disabled selected>No hay usuarios disponibles</option>';
                    }


                    // Cargar colas en el select
                    let selectColas = document.getElementById("select-cola");
                    if (data.colas.length > 0) {
                        selectColas.innerHTML = data.colas.map(cola =>
                            `<option value="${cola.id}">Cola #${cola.id}</option>`
                        ).join("");
                    } else {
                        selectColas.innerHTML = '<option disabled selected value="">No hay colas disponibles</option>';
                    }

                    // Cargar colas con técnicos
                    let html = "";
                    data.colas.forEach(cola => {
                        html += `
                    <div class="border rounded mb-2">
                        <button class="w-full text-left px-4 py-2 bg-gray-800 hover:bg-gray-900"
                            onclick="toggleAccordion(${cola.id})">
                            Cola #${cola.id}
                        </button>
                        <div id="tecnicos-${cola.id}" class="hidden p-4">
                            <ul class="list-disc pl-4">
                                ${cola.queue_technicians.map(tecnico => `<li>${tecnico.name}</li>`).join("")}
                            </ul>
                        </div>
                    </div>
                `;
                    });

                    document.getElementById("contenido-colas").innerHTML = html;
                    document.getElementById("modal-colas").classList.remove("hidden");
                })
                .catch(error => console.error("Error cargando datos:", error));
        }

        function closeModal() {
            document.getElementById("modal-colas").classList.add("hidden");
        }

        function toggleAccordion(colaId) {
            document.getElementById(`tecnicos-${colaId}`).classList.toggle("hidden");
        }

        function agregarTecnico() {
            let usuarioId = document.getElementById("select-usuario").value;
            let colaId = document.getElementById("select-cola").value;
            let categoriaId = document.getElementById("hidden-categoria").value;

            fetch(`/colas/agregar-tecnico`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ usuario_id: usuarioId, categoria_id: categoriaId, cola_id: colaId })
            })
                .then(response => response.json())
                .then(data => {
                    alert("Técnico agregado correctamente");
                    openModal(event, data.categoria_id); // Recargar datos del modal
                })
                .catch(error => console.error("Error al agregar técnico:", error));
        }
    </script>

@endsection
