<?php

namespace App\Http\Controllers;

use App\Events\CategoryCreated;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.list', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:10',
            'cronograma' => 'nullable|in:on,off',
            'publica' => 'nullable|in:on,off',
            'promedia' => 'nullable|in:on,off',
        ]);

        // Verificar si el código ya existe manualmente
        if (Category::where('code', $validated['code'])->exists()) {
            return redirect()->back()->withInput()->withErrors(['code' => "El código '{$validated['code']}' ya está en uso."]);
        }

        try{
            $category = Category::create([
                'name' => $validated['name'],
                'code' => $validated['code'],
                'is_schedulable' => isset($validated['cronograma']),
                'is_public' => isset($validated['publica']),
                'is_promediable' => isset($validated['promedia'])
            ]);


            event(new CategoryCreated($category));

            session()->flash('success', 'Category created successfully');

            return redirect()->route('categories');
        } catch (Exception $e) {
            session()->flash('exception', "El código '{$validated['code']}' ya está en uso.");
            return redirect()->back()->withInput();
        }

    }

}
