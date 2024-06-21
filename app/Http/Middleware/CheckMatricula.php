<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMatricula
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        
        if (!$user || !$user->matricula) {
            return redirect()->route('home')->with('error', 'Acceso no autorizado. Se requiere matrícula.');
        }

        return $next($request);
    }
}