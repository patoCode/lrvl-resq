<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determine if the users is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|unique:categories,name',
            'code' => 'nullable|string|min:2|unique:categories,code',
            'status' => 'nullable|in:active,inactive',
            'is_public' => 'nullable',
            'is_promediable' => 'nullable',
            'is_schedulable' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El name de la categoría es obligatorio.',
            'name.string' => 'El name debe ser una cadena de texto.',
            'name.min' => 'El name debe tener al menos 2 caracteres.',
            'name.unique' => 'Ya existe una categoría con este name.',

            'code.string' => 'El código debe ser una cadena de texto.',
            'code.min' => 'El código debe tener al menos 2 caracteres.',
            'code.unique' => 'El código de la categoría ya está en uso.',

            'status.in' => 'El estado debe ser "ACTIVE" o "INACTIVE".',
        ];
    }
}
