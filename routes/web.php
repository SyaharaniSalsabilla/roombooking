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
Route::get('/profil', [LoginsController::class, 'profile'])->name('profil');
Route::get('/promo', [LoginsController::class, 'promo'])->name('promo');
Route::get('/room', [LoginsController::class, 'room'])->name('room');
Route::post('/room/search', [LoginsController::class, 'search_room'])->name('room.search');
Route::get('/hasil/cari', [LoginsController::class, 'hasil_cari'])->name('hasil_cari'); 
Route::get('/contact', [LoginsController::class, 'contact'])->name('contact');
Route::get('/login/email', [LoginsController::class, 'login_email'])->name('login.email');
Route::get('/pesan1', [LoginsController::class, 'pesan1'])->name('pesan1'); 
Route::post('/pesan2', [LoginsController::class, 'pesan2'])->name('pesan2');
Route::get('/pesan2', [LoginsController::class, 'pesan2'])->name('pesan2'); 
Route::post('/pesan3', [LoginsController::class, 'pesan3'])->name('pesan3');
Route::get('/pesan3', [LoginsController::class, 'pesan3'])->name('pesan3');
Route::post('/pesan3/login', [LoginsController::class, 'pesan3_login'])->name('pesan3.login');
Route::post('/pesan4', [LoginsController::class, 'pesan4'])->name('pesan4');
Route::get('/pesan4', [LoginsController::class, 'pesan4'])->name('pesan4');
Route::post('/transfer', [LoginsController::class, 'transfer'])->name('transfer');
Route::get('/transfer', [LoginsController::class, 'transfer'])->name('transfer');
Route::resource('transaksi', TransactionController::class);
Route::post('transaksi/pesan', [TransactionController::class, 'pesan'])->name('transaksi.pesan');

// Login
Route::get('/login', [UsersController::class, 'index'])->name('login');
Route::get('/login/customer', [UsersController::class, 'customer_login'])->name('login.customer'); 
Route::post('/login/post', [UsersController::class, 'login'])->name('login.post');
Route::post('/login/customer', [UsersController::class, 'login_customer'])->name('login.post.customer');
Route::get('/logout', [LoginsController::class, 'logout'])->name('logout'); 
Route::post('/profil/update-password', [LoginsController::class, 'updatePassword'])->name('profil.updatePassword');


// Register
Route::get('/register', [UsersController::class, 'register'])->name('register'); 
Route::post('/register', [UsersController::class, 'create'])->name('register.post');


// Space Booking
Route::get('/spaceBooking', [SpaceController::class, 'booking'])->name('spaceBooking');

// Space Detail
Route::get('/spaceDetail/{id}', [SpaceController::class, 'detail'])->name('spaceDetail');

// Admin Dashboard
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

