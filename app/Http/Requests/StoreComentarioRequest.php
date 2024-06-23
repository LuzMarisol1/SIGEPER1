<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComentarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // if user is logged in
        if (auth()->check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'comentario' => ['required', 'string', 'max:5000'],
            'usuario_id' => ['required', 'integer', 'exists:usuarios,id'],
            'documento_id' => ['required', 'integer', 'exists:documentos,id'],
        ];
    }

    public function messages()
    {
        return [
            'comentario.required' => 'Debe llenar el comentario.',
            'comentario.string' => 'El comentario debe ser un texto.',
            'comentario.max' => 'El comentario no puede superar los 5000 caracteres.',
            'usuario_id.required' => 'El ID de usuario es obligatorio.',
            'usuario_id.integer' => 'El ID de usuario debe ser un número entero.',
            'usuario_id.exists' => 'El ID de usuario no existe en la base de datos.',
            'documento_id.required' => 'El ID de documento es obligatorio.',
            'documento_id.integer' => 'El ID de documento debe ser un número entero.',
            'documento_id.exists' => 'El ID de documento no existe en la base de datos.',
        ];
    }
}
