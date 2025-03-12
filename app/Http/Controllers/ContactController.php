<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        Contact::create([
            'label' => $request->label,
            'value' => $request->value,
            'user_id' => $request->user_id, // Se asocia correctamente con el usuario
        ]);

        return redirect()->route('users.index')->with('success', 'Contacto agregado correctamente.');
    }
}
