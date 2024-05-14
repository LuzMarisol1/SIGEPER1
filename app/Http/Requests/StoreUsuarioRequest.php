<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->rol->nombre === "admin");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "nombre" => ["required", "string", "max:255"],
            "correo" => ["required", "string", "email", "max:255", "unique:usuarios"],
            "password" => ["required", "string", "min:8", "confirmed"],
            "rol_usuario_id" => ["required", "exists:rol_usuarios,id"]
        ];
    }
}
