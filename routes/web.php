<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\ContactoController;

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
});

Route::get('/directorios', [DirectorioController::class, 'index'])->name('directorio.index');

Route::get('/directorios/nueva', [DirectorioController::class, 'nueva'])->name('directorio.nueva');

Route::get('/directorios/buscar', [DirectorioController::class, 'buscar'])->name('directorio.buscar');

Route::get('/directorios/eliminar/{codigo}', [DirectorioController::class, 'eliminar'])->name('directorio.eliminar');

Route::get('/directorios/destroy/{codigo}', [DirectorioController::class, 'destroy'])->name('directorio.destroy');

Route::post('/directorios/guardar', [DirectorioController::class, 'store'])->name('directorio.store');

Route::get('/directorios/search/', [DirectorioController::class, 'search'])->name('directorio.search');


//contactosController
Route::get('/contactos/{codigo}', [ContactoController::class, 'index'])->name('contacto.index');
