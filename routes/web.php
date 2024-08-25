<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationPathController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//First endpoint
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user/dashboard', fn() => Inertia::render('User/Dashboard'))->name('dashboard.user');
    Route::get('/admin/dashboard', [DashboardController::class, 'dataCount'])->name('dashboard.admin');
});

Route::prefix('/admin/registration-paths')->middleware(['auth'])->group(function() {
    Route::get('/create', [RegistrationPathController::class, 'create'])->name('registration-path.create');
    Route::get('/', [RegistrationPathController::class, 'index'])->name('registration-path.index');
    Route::post('/', [RegistrationPathController::class, 'store'])->name('registration-path.store');
    Route::get('/show/{id}', [RegistrationPathController::class, 'show'])->name('registration-path.show');
});

require __DIR__.'/auth.php';