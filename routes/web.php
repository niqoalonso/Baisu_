<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesPermisosController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/administracionWeb', function () {
    return view('backend.administracion.index');
});

Route::resource('gestion-usuario', UserController::class);
Route::resource('roles-permisos', RolesPermisosController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
