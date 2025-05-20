<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MessageController;

Route::post('/mensajes', [MessageController::class, 'sendMessage']);
Route::get('/chat/messages/{guest_id}', [MessageController::class, 'getMessages']);
Route::get('/messages/latest', [MessageController::class, 'getLatestMessages']);
Route::post('/clientes', [ClienteController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
