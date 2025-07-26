<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $customers = User::with(['profile', 'pemesanan']) // pastikan relasi benar
            ->withCount('pemesanan') // ini yang penting untuk menghitung jumlah pesanan
            ->orderByDesc('pemesanan_count')
            ->take(3) // atau semua jika ingin semua user
            ->get();

        return view('admin.dashboard', compact('customers'));
    }
}
