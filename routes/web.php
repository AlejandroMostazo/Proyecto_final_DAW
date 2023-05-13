<?php

use App\Http\Controllers\Auth\PublicacionesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Deporte\DeporteController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UbicacionController;


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
//ruta para añadir deportes como administrador
Route::middleware(['auth'])->group(function () {
    Route::get('/create', [DeporteController::class, 'create'])->name('deporte.create')->middleware(AdminMiddleware::class);
    Route::post('/deportes', [DeporteController::class, 'store'])->name('deportes.store')->middleware(AdminMiddleware::class);
});

//ruta para añadir los deportes que mas te gustan
Route::middleware(['auth'])->group(function () {
    Route::get('/deportes/fav', [App\Http\Controllers\Deporte\DeportesFavController::class, 'create'])->name('deportes.fav');
    Route::post('/deportes/fav', [App\Http\Controllers\Deporte\DeportesFavController::class, 'store'])->name('deportes.fav.store');
});

Route::middleware(['auth'])->group(function () {
//crear nuevas ubicaciones
    Route::get('/ubicaciones/create', [UbicacionController::class, 'create'])->name('ubicaciones.create')->middleware(AdminMiddleware::class);
    Route::post('/ubicaciones', [UbicacionController::class, 'store'])->name('ubicaciones.store')->middleware(AdminMiddleware::class);
});

Route::middleware(['auth'])->group(function () {
// Editar ubicaciones
Route::get('/ubicaciones/{id}/edit', [UbicacionController::class, 'edit'])->name('ubicaciones.edit')->middleware(AdminMiddleware::class);
Route::put('/ubicaciones/{id}', [UbicacionController::class, 'update'])->name('ubicaciones.update')->middleware(AdminMiddleware::class);

// Eliminar ubicaciones 
Route::delete('/ubicaciones/{id}', [UbicacionController::class, 'delete'])->name('ubicaciones.delete')->middleware(AdminMiddleware::class);
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//ruta para ver las ubicaciones
Route::get('/ubicaciones', [UbicacionController::class,"mostrarUbicaciones"])->middleware(['auth'])->name('ubicaciones');

Route::get('/publicaciones', [PublicacionesController::class,"mostrarPublicacionesConBorrado"])->middleware(['auth'])->name('publicaciones');

require __DIR__.'/auth.php';
