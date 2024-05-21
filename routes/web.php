<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', 'App\Http\Controllers\HomeController@viewTablaEstudiantes')->middleware('auth')->name('home');
Route::get('/InfEstudiantes', 'App\Http\Controllers\HomeController@viewTablaEstudiantes');
Route::get('/actualizarInfo', 'App\Http\Controllers\HomeController@viewTablaEstudiantes');
/*Route::get('/', function () {
    return view('tablaAlumnos');
});
Route::get('/registro', [RegistroController::class], 'create');
Route::post('registro', [RegistroController::class], 'store');*/
// Route::get('/cuenta', [HomeController::class, 'registrarUsuario'])->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/crearUsuario', [UsuarioController::class, 'create'])->name('crearUsuario');
Route::post('/storeUsuario', [UsuarioController::class, 'store'])->name('storeUsuario');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios');


//TABLA ESTUDIANTES
Route::get('/InfEstudiantes', 'App\Http\Controllers\HomeController@viewTablaEstudiantes');
Route::post('/actualizarInfo', [HomeController::class, 'actualizarInfo'])->name('actualizarInfo'); 

//Route::post('/actualizarInfo', 'HomeController@actualizarInfo')->middleware('csrf');