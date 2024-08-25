<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->is_admin) {
            return redirect()->route('dashboard.admin');
        } else {
            return redirect()->route('dashboard.user');
        }
    }
    return redirect()->route('login');
});

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