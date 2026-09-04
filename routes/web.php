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
    // Categories
    Route::get('categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('categories/{category:slug}', [CategoryController::class, 'show'])
        ->name('categories.show');

    Route::middleware(['permission:categories.create'])
        ->get('categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');
        
    Route::middleware(['permission:categories.create'])
        ->post('categories', [CategoryController::class, 'store'])
        ->name('categories.store');
    
    Route::middleware(['permission:categories.edit'])
        ->get('categories/{category:slug}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::middleware(['permission:categories.edit'])
        ->put('categories/{category}/update', [CategoryController::class, 'update'])
        ->name('categories.update');
    
    // Products
    Route::get('products', [ProductController::class, 'index'])
    ->name('products.index');

    Route::get('products/{product}/detail', [ProductController::class, 'show'])
    ->name('products.show');

    Route::middleware(['permission:products.create'])
        ->get('products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::middleware(['permission:products.create'])
        ->post('products', [ProductController::class, 'store'])
        ->name('products.store');
    
    Route::middleware(['permission:products.edit'])
        ->get('products/{product}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::middleware(['permission:products.edit'])
        ->put('products/{product}/update', [ProductController::class, 'update'])
        ->name('products.update');

    Route::middleware(['permission:products.delete'])
        ->delete('products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
        
    // Warehouse
    Route::get('warehouses', [WarehouseController::class, 'index'])
        ->name('warehouse.index');
        
    Route::get('warehouses/{warehouse:slug}', [WarehouseController::class, 'show'])
        ->name('warehouse.show');

    Route::middleware(['permission:warehouses.create'])
        ->get('warehouses/create', [WarehouseController::class, 'create'])
        ->name('warehouse.create');

    Route::middleware(['permission:warehouses.create'])
        ->post('warehouses', [WarehouseController::class, 'store'])
        ->name('warehouse.store');
    
    Route::middleware(['permission:warehouses.edit'])
        ->get('warehouses/{warehouse:slug}/edit', [WarehouseController::class, 'edit'])
        ->name('warehouse.edit');

    Route::middleware(['permission:warehouses.edit'])
        ->put('warehouses/{warehouse}/update', [WarehouseController::class, 'update'])
        ->name('warehouse.update');

    Route::middleware(['permission:warehouses.delete'])
        ->delete('warehouses/{warehouse}', [WarehouseController::class, 'destroy'])
        ->name('warehouse.destroy');
    
    // Customers
    Route::get('customers', [CustomersController::class, 'index'])
        ->name('customers.index');
        
    Route::get('customers/{customer:slug}', [CustomersController::class, 'show'])
        ->name('customers.show');

    Route::middleware(['permission:customers.create'])
        ->get('customers/create', [CustomersController::class, 'create'])
        ->name('customers.create');

    Route::middleware(['permission:customers.create'])
        ->post('customers', [CustomersController::class, 'store'])
        ->name('customers.store');
    
    Route::middleware(['permission:customers.edit'])
        ->get('customers/{customer:slug}/edit', [CustomersController::class, 'edit'])
        ->name('customers.edit');

    Route::middleware(['permission:customers.edit'])
        ->put('customers/{customer}/update', [CustomersController::class, 'update'])
        ->name('customers.update');

    Route::middleware(['permission:customers.delete'])
        ->delete('customers/{customer}', [CustomersController::class, 'destroy'])
        ->name('customers.destroy');
    
    // Users
    Route::get('users', [UserController::class, 'index'])
        ->name('users.index');
        
    Route::post('users', [UserController::class, 'store'])
        ->name('users.store')
        ->can('create', 'user');
        
    Route::get('users/{user}/detail', [UserController::class, 'show'])
        ->name('users.show');
        
    Route::get('users/{user}/edit', [UserController::class, 'edit'])
        ->name('users.edit')
        ->can('update', 'user');
        
    Route::put('users/{user}/update', [UserController::class, 'update'])
        ->name('users.update');
        
    Route::delete('users/{user}', [UserController::class, 'destroy'])
        ->name('users.destroy');
});

Route::get('/api/products/', [ApiProductCtr::class, 'index']);
Route::post('/api/products/', [ApiProductCtr::class, 'store']);

// Route::resource('products', ProductController::class)->middleware('auth');
