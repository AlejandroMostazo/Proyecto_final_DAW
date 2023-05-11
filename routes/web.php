<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Deporte\DeporteController;
use App\Http\Controllers\Deporte\DeportesFavController;
use App\Http\Middleware\AdminMiddleware;


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
Route::prefix('deportes')->group(function () {
    Route::get('/create', [DeporteController::class, 'create'])->name('deporte.create')->middleware(AdminMiddleware::class);
    Route::post('/deportes', [DeporteController::class, 'store'])->name('deportes.store')->middleware(AdminMiddleware::class);
});

//ruta para añadir los deportes que mas te gustan
Route::middleware(['auth'])->group(function () {
    Route::get('/deportes/fav', [App\Http\Controllers\Deporte\DeportesFavController::class, 'create'])->name('deportes.fav');
    Route::post('/deportes/fav', [App\Http\Controllers\Deporte\DeportesFavController::class, 'store'])->name('deportes.fav.store');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
