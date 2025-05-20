<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MessageController;

Route::prefix('admin')->group(function () {

        // Lista de chats (usuarios)
        Route::get('/chat', [MessageController::class, 'index'])->name('admin.chat.index');

        // Mostrar chat con usuario específico
        Route::get('/chat/{usuario}', [MessageController::class, 'show'])->name('admin.chat.show');

        // Obtener mensajes nuevos vía AJAX
        Route::get('/chat/{usuario}/messages', [MessageController::class, 'getMessages'])->name('admin.chat.getMessages');

        // Enviar mensaje vía AJAX
        Route::post('/chat/{usuario}/send', [MessageController::class, 'sendMessage'])->name('admin.chat.sendMessage');
    });
Route::get('/catalogo', [ProductoController::class, 'catalogo'])->name('productos.catalogo');
Route::resource('productos', ProductoController::class);
Route::post('/productos/{id}/restore', [ProductoController::class, 'restore'])->name('productos.restore');

Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'verCarrito'])->name('carrito.ver');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');

Route::get('/orden', [OrderController::class, 'index']);
Route::get('/ordenes/{id}', [OrderController::class, 'show'])->name('ordenes.show');

// Cambiado aquí:
Route::get('/', [MessageController::class, 'index'])->name('welcome');
