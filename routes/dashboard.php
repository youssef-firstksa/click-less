<?php

use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\BankController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SectionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('dashboard');


    Route::resource('banks', BankController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sections', SectionController::class);
});
