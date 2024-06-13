<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioER;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Usuario_e_r;


class HomeController extends Controller
{


/*public function register(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required|in:coordinador,maestro,alumno',
    ]);

    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => $validatedData['role'],
    ]);

    // Enviar correo electrónico de confirmación (implementar según sea necesario)

    return redirect()->route('login')->with('success', 'Cuenta creada exitosamente. Por favor, inicia sesión.');
    }*/


    public function viewTablaEstudiantes(Request $request){

       /* $usuarios = DB::table('usuario_e_r_s')->get();*/
       $usuarios = DB::select("
       SELECT usuario_e_r_s.id, usuario_e_r_s.nombre AS nombreUsuario, usuario_e_r_s.apellido, usuario_e_r_s.matricula, estatuses.nombre AS nombreEstatus, usuario_e_r_s.proyecto, usuario_e_r_s.director, usuario_e_r_s.tipo_inscripcion_id, usuario_e_r_s.modalidad_id, usuario_e_r_s.estatus_id
       FROM usuario_e_r_s
       LEFT JOIN estatuses ON usuario_e_r_s.estatus_id = estatuses.id
   ");

        return view('tablaAlumnos', ['usuarios' => $usuarios]);
    }


    public function registrarUsuario(Request $request){
        return view('crearCuenta');
    }
    public function actualizarInfo(Request $request)
    {
        $arrayReturn = ["res" => 0, "msg" => ""];

        $matricula = $request->matricula;
        $tipoInscripcionId = $request->input('tipoInscripcionId');
        $proyecto = $request->proyecto;
        $modalidadId = $request->input('modalidad_id');
        $director = $request->director;
        $estatusId = $request->input('estatus_id');

        // Verificar si el estudiante existe en la base de datos
        $estudiante = DB::table('usuario_e_r_s')->where('matricula', $matricula)->first();

        if ($estudiante) {
            // Verificar si se proporcionó un valor para modalidad_id
            if ($modalidadId !== null) {
                // Actualizar los datos del estudiante
                DB::table('usuario_e_r_s')
                    ->where('matricula', $matricula)
                    ->update([
                        'tipo_inscripcion_id' => $tipoInscripcionId,
                        'proyecto' => $proyecto,
                        'modalidad_id' => $modalidadId,
                        'director' => $director,
                        'estatus_id' => $estatusId,
                    ]);

                $arrayReturn["res"] = 1;
                $arrayReturn["msg"] = "Los datos del estudiante se han actualizado correctamente.";
            } else {
                $arrayReturn["res"] = 0;
                $arrayReturn["msg"] = "El campo modalidad_id es requerido.";
            }
        } else {
            $arrayReturn["res"] = 0;
            $arrayReturn["msg"] = "No se ha podido actualizar, inténtelo más tarde...";
        }

        return response()->json($arrayReturn);
    }
    public function eliminar($id)
    {
        $usuario = UsuarioER::findOrFail($id);
        $usuario->delete();

    return response()->json(['message' => 'Registro eliminado correctamente']);
}

    public function ImportarListaExcel(Request $request){
        return view ('ImportarListaAlumnos');
    }

    public function import(Request $request)
    {
        if ($request->hasFile('excelFile')) {
            $file = $request->file('excelFile');
            $spreadsheet = IOFactory::load($file->getPathname());
            $worksheet = $spreadsheet->getActiveSheet();
            $rows = $worksheet->toArray();

            $duplicates = []; // Array para almacenar las matrículas de los usuarios duplicados

            foreach ($rows as $index => $row) {
                // Omitir la primera fila si contiene encabezados
                if ($index === 0) {
                    continue;
                }

                if (count($row) < 3) {
                    // La fila no tiene la cantidad esperada de columnas
                    continue;
                }

                // Limpiar y convertir los datos a UTF-8
                $nombre = mb_convert_encoding($row[0] ?? '', 'UTF-8', 'auto');
                $apellido = mb_convert_encoding($row[1] ?? '', 'UTF-8', 'auto');
                $proyecto = mb_convert_encoding($row[2] ?? '', 'UTF-8', 'auto');
                $matricula = mb_convert_encoding($row[4] ?? '', 'UTF-8', 'auto');

                // Verificar si ya existe un registro con la misma matrícula
                $existeUsuario = UsuarioER::where('matricula', $matricula)->first();

                if (!$existeUsuario) {
                    $data = [
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'matricula' => $matricula,
                        'proyecto' => $proyecto
                    ];

                    UsuarioER::create($data);
                } else {
                    $duplicates[] = $matricula; // Agregar la matrícula al array de duplicados
                    Log::info('Duplicado encontrado: ' . $matricula);
                }
            }

            $message = 'Datos guardados exitosamente';

            if (count($duplicates) > 0) {
                $message .= '. Se encontraron ' . count($duplicates) . ' registros duplicados.';
            }

            Log::info('Mensaje: ' . $message);

            return response()->json(['message' => 'Datos guardados exitosamente. Se encontraron ' . count($duplicates) . ' registros duplicados.']);
        }

        return response()->json(['error' => 'No se proporcionó ningún archivo Excel'], 400);
    }
}
