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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/cart', [ProductController::class, 'updateCart'])->name('updateCart');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/checkout', [OrderController::class, 'index'])->name('checkout.index');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/thankyou', [OrderController::class, 'thankYou'])->name('checkout.thankyou');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');






