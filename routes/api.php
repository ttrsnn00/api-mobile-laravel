<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PlantController;
use App\Http\Controllers\Api\OrderController;

// Rute Publik (Tidak butuh token)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rute yang Dilindungi (Butuh token Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    // Ambil data user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/checkout', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Data Katalog Tanaman
    Route::get('/plants', [PlantController::class, 'index']);
});
