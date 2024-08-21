<?php

use App\Http\Controllers\RegistrationPathController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function() {
    return Inertia::render('Test');
});

//First endpoint
Route::middleware(['auth', 'check.role', 'verified'])->group(function () {
    Route::inertia('/user/dashboard', 'User/Dashboard')->name('dashboard.user');
    Route::inertia('/admin/dashboard', 'Admin/Dashboard')->name('dashboard.admin');
});

Route::prefix('/admin/registration-paths')->middleware(['auth'])->group(function() {
    Route::get('/', [RegistrationPathController::class, 'index'])->name('registration-path.index');
    Route::get('/create', [RegistrationPathController::class, 'create'])->name('registration-path.create');
});

require __DIR__.'/auth.php';