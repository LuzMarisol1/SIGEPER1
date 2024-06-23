<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->roles->contains("nombre", "admin"));
    }

    public function withValidator(Validator $validator)
    {
        $validator->sometimes('matricula', 'required|string|max:10', function ($input) {
            return in_array(3, $input->rol_usuario_id);
        });
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
            "apellidos" => ["required", "string", "max:255"],
            "matricula" => ["nullable", "string", "max:10"],
            "correo" => ["required", "string", "email", "max:255", "unique:usuarios"],
            "password" => ["required", "string", "min:8", "confirmed"],
            "rol_usuario_id" => ["required", "array"],
            "rol_usuario_id.*" => ["exists:rol_usuarios,id"]
        ];
    }

    public function messages()
    {
        return [
            "nombre.required" => "El nombre es obligatorio.",
            "nombre.string" => "El nombre debe ser un texto.",
            "nombre.max" => "El nombre no puede superar los 255 caracteres.",
            "apellidos.required" => "Los apellidos son obligatorios.",
            "apellidos.string" => "Los apellidos deben ser un texto.",
            "apellidos.max" => "Los apellidos no pueden superar los 255 caracteres.",
            "matricula.required" => "La matrícula es obligatoria.",
            "matricula.string" => "La matrícula debe ser un texto.",
            "matricula.max" => "La matrícula no puede superar los 10 caracteres.",
            "correo.required" => "El correo es obligatorio.",
            "correo.string" => "El correo debe ser un texto.",
            "correo.email" => "El correo debe ser un correo electrónico.",
            "correo.max" => "El correo no puede superar los 255 caracteres.",
            "correo.unique" => "El correo ya está registrado.",
            "password.required" => "La contraseña es obligatoria.",
            "password.string" => "La contraseña debe ser un texto.",
            "password.min" => "La contraseña debe tener al menos 8 caracteres.",
            "password.confirmed" => "Las contraseñas no coinciden.",
            "rol_usuario_id.required" => "El rol es obligatorio.",
            "rol_usuario_id.array" => "El rol debe ser un arreglo.",
            "rol_usuario_id.*.exists" => "El rol no existe en la base de datos."
        ];
    }
}
