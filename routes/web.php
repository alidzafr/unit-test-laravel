<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Api\ProductController as ApiProductCtr;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticatedSessionController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'login']);
Route::post('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
Route::get('register', function () {
    return view('auth.register');
})->name('register');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('role:owner');
    // Route::get('categories/{category:slug}', [ProductController::class, 'category'])->name('products.category');

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create')->middleware('role:owner');
    Route::get('products/detail/{products}', [ProductController::class, 'show'])->name('products.show')->middleware('role:owner');
    Route::post('products', [ProductController::class, 'store'])->name('products.store')->middleware('role:owner');
    Route::get('products/edit/{products}', [ProductController::class, 'edit'])->name('products.edit')->middleware('role:owner');
    Route::put('products/update/{products}', [ProductController::class, 'update'])->name('products.update')->middleware('role:owner');
    Route::delete('products/{products}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('role:owner');
});

Route::get('/api/products/', [ApiProductCtr::class, 'index']);
Route::post('/api/products/', [ApiProductCtr::class, 'store']);

// Route::resource('products', ProductController::class)->middleware('auth');
