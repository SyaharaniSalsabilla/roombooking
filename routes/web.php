<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\front\AboutController;

// Redirect root URL ke home
Route::redirect('/', '/home');

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/promo', [AboutController::class, 'promo'])->name('promo');
Route::get('/room', [AboutController::class, 'room'])->name('room');
Route::get('/contact', [AboutController::class, 'contact'])->name('contact');

// Space Booking
Route::get('/spaceBooking', [SpaceController::class, 'booking'])->name('spaceBooking');

// Space Detail
Route::get('/spaceDetail/{id}', [SpaceController::class, 'detail'])->name('spaceDetail');

// Admin Dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Login
Route::get('/login', [UsersController::class, 'index'])->name('login'); // Halaman login
Route::post('/login', [UsersController::class, 'login'])->name('login.post'); // Proses login

// Register
Route::get('/register', [UsersController::class, 'register'])->name('register'); // Halaman register
Route::post('/register', [UsersController::class, 'create'])->name('register.post'); // Proses registrasi




