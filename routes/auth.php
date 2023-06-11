<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\PublicacionesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

// cosas que puede hacer en publicaciones solo alguien logeado 
Route::middleware('auth')->group(function () {
    Route::get('/publicacion/create', [PublicacionesController::class, 'create'])->name('auth.publicacion.create');
    Route::post('/publicacion', [PublicacionesController::class, 'store'])->name('publicacion.store');
    Route::post('/publicaciones/{id}/apuntarse', [PublicacionesController::class, 'apuntarsePublicacion'])->name('publicacion.apuntarse');
    Route::get('/publicacion/desapuntarse', [PublicacionesController::class, 'desapuntarsePublicacion'])->name('publicacion.desapuntarse');
    Route::get('/publicacion/apuntados{id}', [PublicacionesController::class,"mostrarApuntados"])->name('apuntados');
    Route::delete('/publicacion/delete', [PublicacionesController::class, 'deletePublicacion'])->name('publicacion.delete');
    Route::post('/publicaciones/filtro', [PublicacionesController::class, 'publicacionesConFiltro'])->name('publicaciones.filtrar');
});

Route::middleware(['auth'])->group(function () {
    Route::put('/editarfoto/{id}', [UserController::class, 'nuevaFoto'])->name('subirFoto');
    Route::get('/editarusuario', [UserController::class, 'edit'])->name('editarusuario');
    Route::delete('/eliminarusuario/{id}', [UserController::class, 'delete'])->name('eliminarusuario');
    Route::put('/editarusuario/{id}', [UserController::class, 'update'])->name('actualizarusuario');
});


