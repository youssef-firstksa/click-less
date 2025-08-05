<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BankController;
use Illuminate\Support\Facades\Route;


// Route::middleware(['guest:admin'])->group(function () {
//     Route::get('login', [AuthController::class, 'loginView'])->name('auth.login');
//     Route::post('login', [AuthController::class, 'login']);
// });

Route::middleware(['auth'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/', function () {
        return view('admin.index');
    })->name('dashboard');


    Route::resource('users', UserController::class);
    Route::resource('banks', BankController::class);
});
