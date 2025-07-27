<?php

use Illuminate\Support\Facades\Route;

Route::get('login', function () {
    return view('admin.auth.login');
})->name('auth.login');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('dashboard');
});
