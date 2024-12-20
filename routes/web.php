<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\front\LoginsController;
use App\Http\Controllers\front\TransactionController;

// Redirect root URL ke home
Route::redirect('/', '/home');

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home'); // Halaman home
Route::get('/about', [LoginsController::class, 'about'])->name('about'); // Halaman about
Route::get('/promo', [LoginsController::class, 'promo'])->name('promo'); // Halaman promo
Route::get('/room', [LoginsController::class, 'room'])->name('room'); // Halaman room
Route::get('/contact', [LoginsController::class, 'contact'])->name('contact'); // Halaman contact
Route::post('/login/email', [LoginsController::class, 'login_email'])->name('login.email'); // Halaman contact
Route::resource('transaksi', TransactionController::class);

// Login
Route::get('/login', [UsersController::class, 'index'])->name('login'); // Halaman login
Route::post('/login', [UsersController::class, 'login'])->name('login.post'); // Proses login

// Register
Route::get('/register', [UsersController::class, 'register'])->name('register'); // Halaman register
Route::post('/register', [UsersController::class, 'create'])->name('register.post'); // Proses registrasi


// Space Booking
Route::get('/spaceBooking', [SpaceController::class, 'booking'])->name('spaceBooking');

// Space Detail
Route::get('/spaceDetail/{id}', [SpaceController::class, 'detail'])->name('spaceDetail');

// Admin Dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

