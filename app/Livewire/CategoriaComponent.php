<?php

namespace App\Livewire;

use App\Http\Requests\CategoriaRequest;
use Livewire\Component;
use App\Models\Category as Categoria;

class CategoriaComponent extends Component
{

    public $categorias, $nombre, $code, $is_public, $is_promediable, $is_schedulable, $status, $categoria_id;

    public function mount()
    {
        $this->categorias = Categoria::all();  // Cargar todas las categorías
    }

    public function save()
    {
        $this->validate((new CategoriaRequest)->rules());

        Categoria::create([
            'name' => $this->nombre,
            'code' => $this->code ? $this->code : 'NN',
            'status' => $this->status ? strtolower($this->status) : 'inactive',
            'is_public' => $this->is_public ?? 0,
            'is_promediable' => $this->is_promediable ?? 0,
            'is_schedulable' => $this->is_schedulable ?? 0,
        ]);

        $this->resetFields();
        $this->categorias = Categoria::all();
        session()->flash('message', 'Categoría guardada exitosamente.');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        $this->categoria_id = $categoria->id;
        $this->nombre = $categoria->nombre;
        $this->is_public = $categoria->is_public;
        $this->is_promediable = $categoria->is_promediable;
        $this->is_schedulable = $categoria->is_schedulable;
        $this->status = $categoria->status;
    }

    public function delete($id)
    {
        Categoria::find($id)->delete();
        $this->categorias = Categoria::all();
        session()->flash('message', 'Categoría eliminada correctamente.');
    }

    private function resetFields()
    {
        $this->reset([
            'nombre',
            'code',
            'status',
            'is_public',
            'is_promediable',
            'is_schedulable'
        ]);
    }

    public function render()
    {
        return view('livewire.categoria-component');
    }
}
