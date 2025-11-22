<?php
// routes/web.php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Home Route - SEDERHANA DULU
Route::get('/', function () {
    return view('');
});

Route::get('/pending', [HomeController::class, 'pending'])->name('pending');

// Auth Routes - nonaktifkan register default
Auth::routes(['register' => false]);

// Register custom
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// LOGOUT route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// TEST ROUTE - coba dulu tanpa middleware
Route::get('/admin/test', function () {
    return "Admin Test Page - Middleware disabled";
});

Route::get('/guru/test', function () {
    return "Guru Test Page - Middleware disabled";
});