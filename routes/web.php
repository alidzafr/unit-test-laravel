<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Api\ProductController as ApiProductCtr;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
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
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('categories/{category:slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}/update', [CategoryController::class, 'update'])->name('categories.update');

    Route::get('customers', [CustomersController::class, 'index'])->name('customers.index');
    Route::get('customers/create', [CustomersController::class, 'create'])->name('customers.create');
    Route::post('customers', [CustomersController::class, 'store'])->name('customers.store');
    Route::get('customers/{customer:slug}', [CustomersController::class, 'show'])->name('customers.show');
    Route::get('customers/{customer:slug}/edit', [CustomersController::class, 'edit'])->name('customers.edit');
    Route::put('customers/{customer}/update', [CustomersController::class, 'update'])->name('customers.update');
    Route::delete('customers/{customer}', [CustomersController::class, 'destroy'])->name('customers.destroy');

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('products/{product}/detail', [ProductController::class, 'show'])->name('products.show');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{product}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('users/{user}/detail', [UserController::class, 'show'])->name('users.show');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('warehouses', [WarehouseController::class, 'index'])->name('warehouse.index');
    Route::get('warehouses/create', [WarehouseController::class, 'create'])->name('warehouse.create')->middleware('role:owner');
    Route::post('warehouses', [WarehouseController::class, 'store'])->name('warehouse.store')->middleware('role:owner');
    Route::get('warehouses/{warehouse:slug}', [WarehouseController::class, 'show'])->name('warehouse.show')->middleware('role:owner');
    Route::get('warehouses/{warehouse:slug}/edit', [WarehouseController::class, 'edit'])->name('warehouse.edit')->middleware('role:owner');
    Route::put('warehouses/{warehouse}/update', [WarehouseController::class, 'update'])->name('warehouse.update')->middleware('role:owner');
    Route::delete('warehouses/{warehouse}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy')->middleware('role:owner');
});

Route::get('/api/products/', [ApiProductCtr::class, 'index']);
Route::post('/api/products/', [ApiProductCtr::class, 'store']);

// Route::resource('products', ProductController::class)->middleware('auth');
