<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\RolUsuario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //redirect if not admin
        $user = auth()->user();
        if (!$user->roles->contains("nombre", "admin")) {
            return redirect()->route("home");
        }

        $usuarios = Usuario::all();
        return view("tablaUsuarios", compact("usuarios"));
    }

    public function registro(Request $request)
{
    Log::info('Iniciando proceso de registro', $request->all());

    Log::info('Datos recibidos:', $request->all());

    try {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'matricula' => 'required|string|unique:usuarios,matricula',
            'correo' => 'required|string|unique:usuarios,correo',
            'contrasena' => 'required|string|min:8|confirmed',
        ]);
        Log::info('Validación inicial pasada');

        // Verificar si la matrícula ya existe
        $usuarioExistente = Usuario::where('matricula', $request->matricula)->first();
        if ($usuarioExistente) {
            Log::warning('Intento de registro con matrícula existente', ['matricula' => $request->matricula]);
            throw ValidationException::withMessages([
                'matricula' => ['Esta matrícula ya está registrada.'],
            ]);
        }

        // Verifica si el correo ya incluye el dominio
        $correo = $request->correo;
        if (!str_ends_with($correo, '@estudiantes.uv.mx')) {
            $correo .= '@estudiantes.uv.mx';
        }

        // Verificar si el correo ya existe
        $usuarioExistente = Usuario::where('correo', $correo)->first();
        if ($usuarioExistente) {
            Log::warning('Intento de registro con correo existente', ['correo' => $correo]);
            throw ValidationException::withMessages([
                'correo' => ['Este correo ya está registrado.'],
            ]);
        }

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'matricula' => $request->matricula,
            'correo' => $correo,
            'password' => Hash::make($request->contrasena),
        ]);

        Log::info('Usuario registrado exitosamente', ['id' => $usuario->id]);

        return response()->json([
            'success' => true,
            'message' => 'Usuario registrado exitosamente',
            'usuario' => $usuario
        ], 200);  // Asegúrate de que el código de estado sea 200 para éxito

    } catch (ValidationException $e) {
        Log::error('Error de validación:', $e->errors());
        return response()->json([
            'message' => 'Error de validación',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        Log::error('Error inesperado:', ['message' => $e->getMessage()]);
        return response()->json([
            'message' => 'Error inesperado al procesar la solicitud'
        ], 500);
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //redirect if not admin
        $user = auth()->user();
        if (!$user->roles->contains("nombre", "admin")) {
            return redirect()->route("home");
        }

        //except admin
        $roles = RolUsuario::where("nombre", "!=", "admin")->get();
        return view("crearCuenta", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsuarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $validated = $request->validated();
        $usuario = new Usuario();
        $usuario->nombre = $validated["nombre"];
        $usuario->correo = $validated["correo"];
        $usuario->apellidos = $validated["apellidos"];
        $usuario->matricula = $validated["matricula"];
        $usuario->password = Hash::make($validated["password"]);
        $usuario->save();
        $usuario->roles()->sync($validated["rol_usuario_id"]);
        // return redirect()->back()->with("success", "Usuario creado exitosamente");
        return redirect()->route("usuarios")->with("success", "Usuario creado exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsuarioRequest  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
