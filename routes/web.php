<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auxiliarController;
use App\Http\Controllers\citaController;
use App\Http\Controllers\citaMedicaController;
use App\Http\Controllers\disponibilidadController;
use App\Http\Controllers\gerenteController;
use App\Http\Controllers\medicoController;
use App\Http\Controllers\pacienteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('roles');
    })->name('dashboard');
});

Route::get('/auxiliares',[auxiliarController::class,'index'])->name('auxiliares.index');
Route::post('/auxiliar',[auxiliarController::class,'store'])->name('auxiliares.store');
Route::get('/auxiliar/funciones',[auxiliarController::class,'show'])->name('auxiliares.show');


Route::get('/citasMedicas',[citaMedicaController::class,'index'])->name('citasMedicas.index');
Route::post('/citaMedica',[citaMedicaController::class,'store'])->name('citasMedicas.store');
Route::get('/citas',[citaMedicaController::class,'citas'])->name('citasMedicas.citas');
Route::delete('/citas/{id}',[citaMedicaController::class,'destroy'])->name('citasMedicas.destroy');
Route::post('/citas/guardar/{id}',[citaMedicaController::class,'update'])->name('citasMedicas.update');


Route::get('/gerentes',[gerenteController::class,'index'])->name('gerentes.index');
Route::post('/gerente',[gerenteController::class,'store'])->name('gerentes.store');

Route::get('/gerente/reporte',[gerenteController::class,'show'])->name('gerentes.show');
Route::get('/gerente',[gerenteController::class,'reportes'])->name('gerentes.reportes'); 


Route::get('/medicos',[medicoController::class,'index'])->name('medicos.index');
Route::post('/medico',[medicoController::class,'store'])->name('medicos.store');
Route::get('/medico',[medicoController::class,'horarios'])->name('medicos.horario');

Route::get('/citas',[citaMedicaController::class,'citas'])->name('citasMedicas.citas');

Route::get('/pacientes',[pacienteController::class,'index'])->name('pacientes.index');
Route::post('/pacientes/store',[pacienteController::class,'store'])->name('pacientes.store');

Route::get('/disponibles',[disponibilidadController::class,'index'])->name('disponibles.index');
Route::post('/disponible',[disponibilidadController::class,'store'])->name('disponibles.store');