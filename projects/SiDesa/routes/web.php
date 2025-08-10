<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\ComplaintController;

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);


Route::get('/dashboard', fn() => view('pages.dashboard'))
    ->middleware('role:Admin,User');

Route::controller(ResidentController::class)->middleware(['role:Admin'])->group(function () {
    Route::get('/resident', 'index');
    Route::get('/resident/create', 'create');
    Route::get('/resident/{resident:id}/edit', 'edit');
    Route::post('/resident', 'store');
    Route::put('/resident/{resident:id}', 'update');
    Route::delete('/resident/{resident:id}', 'destroy');
});

Route::controller(UserController::class)->middleware(['role:Admin'])->group(function () {
    Route::get('/account-list', 'account_list_view');
    Route::get('/account-request', 'account_request_view');
    Route::post('/account-request/approval/{user:id}', 'account_approval');
    Route::get('/profile', 'profile_view');
    Route::post('/profile/{user:id}', 'update_profile');
    Route::get('/change-password', 'change_password_view');
    Route::post('/change-password/{user:id}', 'change_password');
});

Route::controller(ComplaintController::class)->middleware(['role:User'])->group(function () {
    Route::get('/complaint', 'index')->middleware(['role: Admin,User']);
    Route::get('/complaint/create', 'create');
    Route::get('/complaint/{complaint:id}/edit', 'edit');
    Route::post('/complaint', 'store');
    Route::put('/complaint/{complaint:id}', 'update');
    Route::delete('/complaint/{complaint:id}', 'destroy');
});

