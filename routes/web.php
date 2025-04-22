<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Products
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/cart', [ProductController::class, 'updateCart'])->name('updateCart');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Orders
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout.index');
Route::post('/checkout', [OrderController::class, 'create'])->name('orders.create');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
