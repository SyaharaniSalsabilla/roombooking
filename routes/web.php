<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\front\LoginsController;
use App\Http\Controllers\front\TransactionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\TransaksiController;

// Redirect root URL ke home
Route::redirect('/', '/home');

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', [LoginsController::class, 'about'])->name('about');
Route::get('/profil', [LoginsController::class, 'profile'])->name('profil');
Route::get('/promo', [LoginsController::class, 'promo'])->name('promo');
Route::get('/room', [LoginsController::class, 'room'])->name('room');
Route::post('/room/search', [LoginsController::class, 'search_room'])->name('room.search');
Route::get('/hasil/cari', [LoginsController::class, 'hasil_cari'])->name('hasil_cari'); // Halaman hasil cari
Route::get('/contact', [LoginsController::class, 'contact'])->name('contact'); // Halaman contact
Route::get('/login/email', [LoginsController::class, 'login_email'])->name('login.email'); // Halaman login dengan email
Route::get('/pesan1', [LoginsController::class, 'pesan1'])->name('pesan1'); // Halaman pesan1
Route::post('/pesan2', [LoginsController::class, 'pesan2'])->name('pesan2');
Route::get('/pesan2', [LoginsController::class, 'pesan2'])->name('pesan2'); // Halaman pesan2
Route::post('/pesan3', [LoginsController::class, 'pesan3'])->name('pesan3');
Route::get('/pesan3', [LoginsController::class, 'pesan3'])->name('pesan3');
Route::post('/pesan3/login', [LoginsController::class, 'pesan3_login'])->name('pesan3.login'); // Halaman pesan3
Route::post('/pesan4', [LoginsController::class, 'pesan4'])->name('pesan4');
Route::get('/pesan4', [LoginsController::class, 'pesan4'])->name('pesan4');
Route::post('/transfer', [LoginsController::class, 'transfer'])->name('transfer');
Route::get('/transfer', [LoginsController::class, 'transfer'])->name('transfer');
Route::resource('transaksi', TransactionController::class);
Route::post('transaksi/pesan', [TransactionController::class, 'pesan'])->name('transaksi.pesan');

// Login
Route::get('/login', [UsersController::class, 'index'])->name('login'); // Halaman login
Route::get('/login/customer', [UsersController::class, 'customer_login'])->name('login.customer'); // Halaman login
Route::post('/login/post', [UsersController::class, 'login'])->name('login.post');
Route::post('/login/customer', [UsersController::class, 'login_customer'])->name('login.post.customer');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout'); // Halaman login

// Register
Route::get('/register', [UsersController::class, 'register'])->name('register'); // Halaman register
Route::post('/register', [UsersController::class, 'create'])->name('register.post'); // Proses registrasi

// Admin Dashboard
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/ruangan', [RuanganController::class, 'index'])->name('admin.ruangan');
Route::post('/admin/ruangan', [RuanganController::class, 'store'])->name('admin.ruanganAdd');

Route::get('/admin/hargaRuangan', [RuanganController::class, 'indexHarga'])->name('admin.ruanganHarga');
Route::post('/admin/hargaRuangan', [RuanganController::class, 'storeHarga'])->name('admin.ruanganHargaAdd');

Route::get('/admin/fasilitas', [fasilitasController::class, 'index'])->name('admin.fasilitas');
Route::post('/admin/fasilitas', [fasilitasController::class, 'store'])->name('admin.fasilitasAdd');

Route::get('/admin/transaksiRuangan', [TransaksiController::class, 'indexRuangan'])->name('admin.transaksiRuangan');

Route::get('/admin/transaksiFasilitas', [TransaksiController::class, 'indexFasilitas'])->name('admin.transaksiFasilitas');
