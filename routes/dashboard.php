<?php

use App\Http\Controllers\Dashboard\CkEditorController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\ArticleNoteCategoryController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\BankController;
use App\Http\Controllers\Dashboard\NotificationController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SectionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'platform-access'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('index');

    Route::resource('banks', BankController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('products/ajax/by-bank', [ProductController::class, 'getBankProducts'])->name('products.by-bank');
    Route::resource('products', ProductController::class);

    Route::get('sections/ajax/by-product', [SectionController::class, 'getProductSections'])->name('sections.by-product');
    Route::resource('sections', SectionController::class);

    Route::resource('articles', ArticleController::class);
    Route::resource('article-note-categories', ArticleNoteCategoryController::class);
    Route::resource('notifications', NotificationController::class);

    Route::post('ckeditor/upload', [CkEditorController::class, 'upload'])->name('ckeditor.upload');
});
