<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->intended('/login');
})->middleware(['auth']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'login']);

    Route::get('/register', [RegisteredUserController::class, 'createStudent'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'storeStudent']);

    Route::get('/register-admin', [RegisteredUserController::class, 'createAdmin'])->name('register.admin');
    Route::post('/register-admin', [RegisteredUserController::class, 'storeAdmin']);
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});