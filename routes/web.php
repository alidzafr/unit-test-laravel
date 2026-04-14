<?php

use App\Http\Controllers\AuthenticatedSessionController;
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

Route::resource('products', \App\Http\Controllers\ProductController::class)->middleware('auth');
