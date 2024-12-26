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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [LoginsController::class, 'about'])->name('about');
Route::get('/promo', [LoginsController::class, 'promo'])->name('promo');
Route::get('/room', [LoginsController::class, 'room'])->name('room');
Route::post('/room/search', [LoginsController::class, 'search_room'])->name('room.search');
Route::get('/hasil/cari', [LoginsController::class, 'hasil_cari'])->name('hasil_cari'); // Halaman hasil cari
Route::get('/contact', [LoginsController::class, 'contact'])->name('contact'); // Halaman contact
Route::get('/login/email', [LoginsController::class, 'login_email'])->name('login.email'); // Halaman login dengan email
Route::get('/pesan1', [LoginsController::class, 'pesan1'])->name('pesan1'); // Halaman pesan1
Route::post('/pesan2', [LoginsController::class, 'pesan2'])->name('pesan2'); // Halaman pesan2
Route::post('/pesan3', [LoginsController::class, 'pesan3'])->name('pesan3');
Route::post('/pesan3/login', [LoginsController::class, 'pesan3_login'])->name('pesan3.login'); // Halaman pesan3
Route::post('/pesan4', [LoginsController::class, 'pesan4'])->name('pesan4');
Route::post('/transfer', [LoginsController::class, 'transfer'])->name('transfer');
Route::resource('transaksi', TransactionController::class);
Route::post('transaksi/pesan', [TransactionController::class, 'pesan'])->name('transaksi.pesan');

// Login
Route::get('/login', [UsersController::class, 'index'])->name('login'); // Halaman login
Route::post('/login/post', [UsersController::class, 'login'])->name('login.post'); // Proses login
Route::get('/logout', [UsersController::class, 'logout'])->name('logout'); // Halaman login

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

