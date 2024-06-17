<?php

namespace Database\Seeders;

use App\Models\Usuario;
use App\Models\RolUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create admin
        if (
            Usuario::where("correo", "admin@example.com")->count() == 0
        ) {
            $admin = new Usuario();
            $admin->nombre = "admin";
            $admin->apellidos = "admin";
            $admin->matricula = "zs18967888";
            $admin->correo = "admin@example.com";
            $admin->password = Hash::make("admin");
            $rol = RolUsuario::where("nombre", "admin")->first();
            $admin->save();
            $admin->roles()->attach($rol);
        }
    }
}
