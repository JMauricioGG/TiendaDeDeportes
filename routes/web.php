<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;


// Rutas CRUD para categorías
Route::resource('categorias', CategoriaController::class);

// Página principal apunta al index de categorías
Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index');

// Rutas CRUD para productos

Route::resource('productos', ProductoController::class);

