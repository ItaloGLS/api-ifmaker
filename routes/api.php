<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

Route::post('reservas', [ReservaController::class, 'store']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::get('reservas', [ReservaController::class, 'index']);
    Route::get('reservas/{reserva}', [ReservaController::class, 'show']);
    Route::put('reservas/{reserva}', [ReservaController::class, 'update']);
    Route::delete('reservas/{reserva}', [ReservaController::class, 'destroy']);
});
