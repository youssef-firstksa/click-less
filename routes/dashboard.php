<?php

use App\Http\Controllers\Dashboard\ArticleController;
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

    Route::get('products/ajax/by-bank', [ProductController::class, 'getBankProducts'])->name('products.by-bank');
    Route::resource('products', ProductController::class);

    Route::get('sections/ajax/by-product', [SectionController::class, 'getProductSections'])->name('sections.by-product');
    Route::resource('sections', SectionController::class);

    Route::resource('articles', ArticleController::class);
});
