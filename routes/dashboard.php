<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BankController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');


    Route::resource('users', UserController::class);
    Route::resource('banks', BankController::class);
});
