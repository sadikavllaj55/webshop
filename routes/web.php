<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/cart', [ProductController::class, 'updateCart'])->name('updateCart');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/cart-items', [ProductController::class, 'getCartItems']);
Route::get('/category/{name}', [ProductController::class, 'category'])->name('products.category');

Route::get('/checkout', [OrderController::class, 'index'])->name('checkout.index');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::post('/order/saveAddress', [OrderController::class, 'storeAddress'])->name('save.address');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');



