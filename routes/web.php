<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seguridad\LoginController;
use App\Http\Controllers\Seguridad\UsuarioController;

Route::get('/', function () {
    return redirect('/seguridad/auth/login');
});

/**SEGURIDAD */
Route::prefix('seguridad')->group(function () {


    Route::prefix('auth')->group(function () {

        Route::get('/login', [LoginController::class, 'login'])->name('login');




        Route::post('/acceso', [
            LoginController::class,
            'acceso'
        ])->name('login.acceso');

        Route::get('/olvide-contrasena', [
            PasswordController::class,
            'index'
        ])->name('password.request');

        Route::post('/crear-codigo-recuperacion', [
            PasswordController::class,
            'store'
        ])->name('password.update');

        Route::get('/ingresar-codigo-recuperacion', [
            PasswordController::class,
            'show'
        ])->name('password.verify');

        Route::post('/verificar-codigo-recuperacion', [
            PasswordController::class,
            'edit'
        ])->name('password.edit');

        Route::get('/ingresar-nueva-contrasena/{codigo}', [
            PasswordController::class,
            'destroy'
        ])->name('password.reset-form');

        Route::post('/guardar-nueva-contrasena', [
            PasswordController::class,
            'update'
        ])->name('password.reset');
    });

    /**USUARIO */

    Route::middleware('auth')->group(function () {

        Route::post('/logout', [
            LoginController::class,
            'logout'
        ])->name('logout');


        Route::prefix('usuario')->group(function () {

            Route::get('{id}/editar', [
                UsuarioController::class,
                'edit'
            ])->name('usuarios.edit');

            Route::put('{id}/actualizar', [
                UsuarioController::class,
                'update'
            ])->name('usuarios.update');

            Route::get('/crear', [
                UsuarioController::class,
                'create'
            ])->name('usuarios.create');

            Route::post('/guardar', [
                UsuarioController::class,
                'store'
            ])->name('usuarios.store');

            Route::get('/catalogo', [
                UsuarioController::class,
                'catalogo'
            ])->name('usuarios.catalogo');

            Route::get('/{id}', [
                UsuarioController::class,
                'show'
            ])->name('usuarios.show');

            Route::get('{id}/imagen', [
                ImagenController::class,
                'index'
            ])->name('usuarios.edit-image');

            Route::post('{id}/imagen', [
                ImagenController::class,
                'store'
            ])->name('usuarios.updateImage');
        });
    });
});
