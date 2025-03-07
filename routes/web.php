<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'index'])->name('dashboard.admin');
});

Route::middleware(['auth:anggota'])->group(function () {
    Route::get('/dashboard/anggota', [DashboardController::class, 'index'])->name('dashboard.anggota');
});

Route::middleware(['auth'])->group(function () {
    // Rute khusus admin jika diperlukan
});
