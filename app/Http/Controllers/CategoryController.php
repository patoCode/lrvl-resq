<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Category;
use App\Models\Queue;
use App\Models\QueueTechnician;
use App\Models\User;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoriaRequest $request)
    {
        Category::create($request->validated()); // Crear nueva categoría
        return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category')); // Vista para editar categoría
    }

    public function update(CategoriaRequest $request, Category $category)
    {
        $category->update($request->validated()); // Actualizar categoría
        return redirect()->route('categories.index')->with('success', 'Categoría actualizada exitosamente');
    }

    public function destroy(Category $category)
    {
        $category->delete(); // Eliminar categoría
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada exitosamente');
    }

    public function obtenerColas($id)
    {
        $colas = Queue::where('category_id', $id)->with(['queueTechnicians.users'])->get();
        $usuarios = User::all(); // Obtener todos los usuarios

        return response()->json([
            'colas' => $colas,
            'usuarios' => $usuarios
        ]);
    }

    public function agregarTecnico(Request $request)
    {
        $usuario = User::find($request->usuario_id);
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Obtener el ID de la categoría desde el formulario
        $categoriaId = $request->categoria_id;

        // Si no se ha seleccionado una cola, crear una nueva
        if (!$request->cola_id || $request->cola_id === "null") {
            $nuevaCola = Queue::create([
                'category_id' => $categoriaId,
                'type' => 'public',
                'status' => 'active'
            ]);

            $colaId = $nuevaCola->id;
            $orden = 1; // Primera asignación
        } else {
            $colaId = $request->cola_id;

            // Obtener el último valor de 'order' para la cola existente
            $ultimoOrden = QueueTechnician::where('queue_id', $colaId)->max('order');
            $orden = $ultimoOrden ? $ultimoOrden + 1 : 1;
        }

        // Asignar el técnico a la cola con el orden calculado
        QueueTechnician::create([
            'technician_id' => $usuario->id,
            'queue_id' => $colaId,
            'order' => $orden,
            'status' => 'active'
        ]);

        return response()->json([
            'message' => 'Técnico agregado',
            'categoria_id' => $categoriaId
        ]);
    }




}
