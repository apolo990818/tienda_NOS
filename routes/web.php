<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;

Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');


Route::get('/catalogo', [ProductoController::class, 'catalogo'])->name('productos.catalogo');
Route::resource('productos', ProductoController::class);
Route::post('/productos/{id}/restore', [ProductoController::class, 'restore'])->name('productos.restore');



Route::get('/', function () {
    return view('welcome');
});
