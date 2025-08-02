<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);


Route::get('/dashboard', fn() => view('pages.dashboard'));

Route::controller(ResidentController::class)->group(function () {
    Route::get('/resident', 'index');
    Route::get('/resident/create', 'create');
    Route::get('/resident/{resident:id}/edit', 'edit');
    Route::post('/resident', 'store');
    Route::put('/resident/{resident:id}', 'update');
    Route::delete('/resident/{resident:id}', 'destroy');
});
