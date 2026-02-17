<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

// Public Routes
Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/about', [HomeController::class , 'about'])->name('about');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class , 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class , 'register']);
    Route::get('/login', [AuthController::class , 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class , 'login']);
});

Route::post('/logout', [AuthController::class , 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');

    // Category Management
    Route::resource('categories', CategoryController::class);

    // Product Management
    Route::resource('products', \App\Http\Controllers\ProductController::class);
});
