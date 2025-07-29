<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Models\trx_sewa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $oneWeekAgo = Carbon::now()->subWeek();
        $oneMonth = Carbon::now()->subMonth();
        // $customers = User::where('role', 2)
        //             ->withCount(['trx_sewa']) // hitung jumlah pemesanan
        //             ->orderByDesc('trx_sewa_count') // urutkan dari terbanyak
        //             ->take(3) // ambil 3 teratas
        //             ->get();
        $totalAmount = trx_sewa::whereMonth('created_at', Carbon::now()->month)
                       ->whereYear('created_at', Carbon::now()->year)
                       ->sum('mst_harga_sewa_id');
        $totalAmount = number_format($totalAmount, 0, ',', '.');
        $newOrdersCount = trx_sewa::where('created_at', '>=', $oneWeekAgo)->count();
        $newOrdersCount = trx_sewa::where('created_at', '>=', $oneWeekAgo)->count();
        $newUsers = User::where('created_at', '>=', $oneMonth)->count();
        $totalCust = DB::table('master_profil_customer')->count();
        $totalPesananBulanIni = trx_sewa::whereMonth('created_at', Carbon::now()->month)
                         ->whereYear('created_at', Carbon::now()->year)
                         ->count();
        $newOrdersThisWeek = trx_sewa::with(['profile', 'ruangan'])->where('created_at', '>=', $oneWeekAgo)->get();
        $customers = DB::table('trx_sewa')
            ->select(
                'master_profil_customer.nama',
                'master_profil_customer.email',
                DB::raw('COUNT(trx_sewa.id) as total_pemesanan')
            )
            ->join('master_profil_customer', DB::raw('CAST(trx_sewa.mst_profil_id AS BIGINT)'), '=', 'master_profil_customer.id')
            ->groupBy('master_profil_customer.id', 'master_profil_customer.nama', 'master_profil_customer.email')
            ->orderByDesc('total_pemesanan')
            ->limit(3)
            ->get();
        $topRooms = DB::table('trx_sewa')
            ->join('mst_harga_sewa', 'trx_sewa.mst_harga_sewa_id', '=', 'mst_harga_sewa.id')
            ->join('mst_ruangan', DB::raw('CAST(mst_harga_sewa.ruangan_id AS BIGINT)'), '=', DB::raw('mst_ruangan.id'))
            ->select('mst_ruangan.nama_ruangan', DB::raw('COUNT(trx_sewa.id) as jumlah_pemesanan'))
            ->whereMonth('trx_sewa.created_at', Carbon::now()->month)
            ->whereYear('trx_sewa.created_at', Carbon::now()->year)
            ->groupBy('mst_ruangan.id', 'mst_ruangan.nama_ruangan')
            ->orderByDesc('jumlah_pemesanan')
            ->limit(3)
            ->get();



        return view('admin.dashboard', 
            ['customers' => $customers, 
            'total_amount' => $totalAmount, 
            'weekly_orders_count' => $newOrdersCount, 
            'recent_monthly_users' => $newUsers,
            'this_week_orders' => $newOrdersThisWeek,
            'total_users' => $totalCust,
            'topRooms' => $topRooms,
            'totalPesananBulanIni' => $totalPesananBulanIni,
        ]);
    }

    // public function dashboard()
    // {
    //     $user = Auth::user();
    //     $trx_sewa = trx_sewa::where('id', $user->id)->first();
    //     $mst_harga_sewa_id = $trx_sewa ? $trx_sewa->mst_harga_sewa_id : 0;

    //     return view('dashboard', compact('mst_harga_sewa_id'));
    // }
}

