<?php

use App\Http\Controllers\Auth\PublicacionesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Deporte\DeporteController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\LanguageController;

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

//ruta para añadir, mostrar, editar y borrar deportes como administrador
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/deportes/create', [DeporteController::class, 'create'])->name('deporte.create');
    Route::post('/deportes', [DeporteController::class, 'store'])->name('deportes.store');
    Route::get('/deportes/edit/{id}', [DeporteController::class, 'edit'])->name('deportes.edit');
    Route::put('/deportes/update/{id}', [DeporteController::class, 'update'])->name('deportes.update');
    Route::delete('/deportes/delete/{id}', [DeporteController::class, 'delete'])->name('deportes.delete');
});

//ruta para añadir los deportes que mas te gustan
Route::middleware(['auth'])->group(function () {
    Route::get('/deportes/fav', [App\Http\Controllers\Deporte\DeportesFavController::class, 'create'])->name('deportes.fav');
    Route::post('/deportes/fav', [App\Http\Controllers\Deporte\DeportesFavController::class, 'store'])->name('deportes.fav.store');
    Route::delete('/deportes-fav/{deporteId}', [\App\Http\Controllers\Deporte\DeportesFavController::class, 'eliminarDeporteFav'])->name('deportes-fav.delete');
});

// Ubicaciones
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/ubicaciones/create', [UbicacionController::class, 'create'])->name('ubicaciones.create');
    Route::post('/ubicaciones', [UbicacionController::class, 'store'])->name('ubicaciones.store');
    Route::get('/ubicaciones/{id}/edit', [UbicacionController::class, 'edit'])->name('ubicaciones.edit');
    Route::put('/ubicaciones/{id}', [UbicacionController::class, 'update'])->name('ubicaciones.update');
    
    Route::delete('/ubicaciones/{id}', [UbicacionController::class, 'delete'])->name('ubicaciones.delete');
});


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/perfil', function () {
    return view('auth.perfil');
})->middleware(['auth'])->name('perfil');

//(lo puede hacer todo el mundo)
Route::get('/deportes/mostrar', [DeporteController::class, 'mostrar'])->name('deportes.mostrar');
Route::get('/ubicaciones', [UbicacionController::class,"mostrarUbicaciones"])->name('ubicaciones');
Route::get('/publicacion/buscar', [PublicacionesController::class, 'buscar'])->name('publicacion.buscar');
Route::get('/publicaciones', [PublicacionesController::class,"mostrarPublicaciones"])->name('publicaciones');

Route::get('/lang', 'App\Http\Controllers\LanguageController@change')->name('lang.change');


Route::get('/noticias', function () {
    return view('noticias');
})->name('noticias');

require __DIR__.'/auth.php';
