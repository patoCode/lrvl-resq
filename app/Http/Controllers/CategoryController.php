<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Category;
use Exception;

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

}
