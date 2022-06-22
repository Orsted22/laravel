<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PacientesController;

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

Route::get('/', function () {
    return view('principal');
});

//Enrutar con categoria
Route::get('/pacientes', [PacientesController::class, 'index']);
Route::get('/pacientes/crear', [PacientesController::class, 'create']);
Route::post('/pacientes/guardar', [PacientesController::class, 'store']);
Route::get('/pacientes/editar/{id}', [PacientesController::class, 'edit']);
Route::put('/pacientes/actualizar/{id}', [PacientesController::class, 'update']);
Route::delete('/pacientes/eliminar/{paciente}', [PacientesController::class, 'destroy']);
/*
Route::get('/categoria', function () {
    return view('categorias.index');
});
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
