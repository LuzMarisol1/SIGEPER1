<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('tablaAlumnos');
});*/

Route::get('/InfEstudiantes', 'App\Http\Controllers\HomeController@viewTablaEstudiantes');
Route::get('/actualizarInfo', 'App\Http\Controllers\HomeController@viewTablaEstudiantes');
/*Route::get('/', function () {
    return view('tablaAlumnos');
});
Route::get('/registro', [RegistroController::class], 'create');
Route::post('registro', [RegistroController::class], 'store');*/