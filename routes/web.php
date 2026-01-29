<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

// Rutas temporales de prueba (deben ir ANTES de las rutas de recursos)
Route::get('posts/nuevoPrueba', [PostController::class, 'nuevoPrueba'])->name('posts.nuevoPrueba');
Route::get('posts/editarPrueba/{id}', [PostController::class, 'editarPrueba'])->name('posts.editarPrueba');

// Rutas de recursos para posts
Route::resource('posts', PostController::class);
