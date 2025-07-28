<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest:admin'])->group(function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('auth.login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});
