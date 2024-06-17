<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioERRequest;
use App\Http\Requests\UpdateUsuarioERRequest;
use App\Models\Documentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Models\UsuarioER;
use Illuminate\Support\Facades\Storage;

class UsuarioERController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informacionAlumnos(Request $request)
    {
        $usuario = auth()->user();

        // Imprimir el objeto $usuario completo
        //dd($usuario);

        // $matricula = explode('@', $usuario->correo)[0];
        $matricula = $usuario->matricula;
        // Imprimir la matrícula extraída
        //  dd($matricula);

        $estudianteER = UsuarioER::select(
            'usuario_e_r_s.id',
            'usuario_e_r_s.nombre AS nombreUsuario',
            'usuario_e_r_s.apellido',
            'usuario_e_r_s.matricula',
            'estatuses.nombre AS nombreEstatus',
            'usuario_e_r_s.proyecto',
            'usuario_e_r_s.director',
            'usuario_e_r_s.tipo_inscripcion_id',
            'usuario_e_r_s.modalidad_id',
            'usuario_e_r_s.estatus_id'
        )
            ->leftJoin('estatuses', 'usuario_e_r_s.estatus_id', '=', 'estatuses.id')
            ->whereRaw('LOWER(usuario_e_r_s.matricula) LIKE ?', ['%' . strtolower($matricula) . '%'])
            ->first();

        if ($estudianteER) {
            $estudiantes = [$estudianteER];
            // Imprimir el objeto $estudianteER después de aplicar el filtro
            // dd($estudianteER);
        } else {
            $estudiantes = [];
        }

        return view('informaciónEstudiante', ['estudiantes' => $estudiantes]);
    }

    public function uploadDocuments(Request $request)
    {
        $id = $request->input('id');

        $request->validate([
            'id' => 'required',
            'documento_*' => 'file' // Adjust mime types and max size as needed
        ]);

        // Iterate through the possible document inputs
        for ($i = 1; $i <= 12; $i++) {
            $fileInputName = 'documento_' . $i;

            // Check if a file is uploaded for the current input
            if ($request->hasFile($fileInputName)) {
                $file = $request->file($fileInputName);
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $filePath = Storage::putFileAs('documents/' . $id, $file, $filename);

                // Save the document information to the database
                Documentos::updateOrCreate([
                    'numero_de_documento' => $i,
                    'usuario_e_r_id' => $id
                ],[
                    'nombre' => $file->getClientOriginalName(),
                    'estatus' => 'pendiente',
                    'numero_de_documento' => $i,
                    'ruta' => $filePath,
                    'usuario_e_r_id' => $id
                ]);
            }
        }

        // Redirect or return a response
        return redirect()->back()->with('success', 'Documentos actualizados.');
    }

    public function downloadDocument(int $id)
    {
        $documento = Documentos::find($id);

        if (!$documento) {
            return redirect()->back()->with('error', 'Documento no encontrado.');
        }

        return Storage::download($documento->ruta, $documento->nombre);
    }


    // ...
}
