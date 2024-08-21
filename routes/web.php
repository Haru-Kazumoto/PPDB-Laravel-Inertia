<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect()->route('login');
});

//First endpoint
Route::middleware(['auth', 'check.role', 'verified'])->group(function () {
    Route::inertia('/user/dashboard', 'User/Dashboard')->name('dashboard.user');
    Route::inertia('/admin/dashboard', 'Admin/Dashboard')->name('dashboard.admin');
});

require __DIR__.'/auth.php';