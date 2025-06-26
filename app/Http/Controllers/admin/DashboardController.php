<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Models\trx_sewa;
use App\Models\User;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
        $oneWeekAgo = Carbon::now()->subWeek();
        $oneMonth = Carbon::now()->subMonth();
        $customers = User::where('role',2)->get();
        $totalAmount = trx_sewa::sum('mst_harga_sewa_id');
        $totalAmount = number_format($totalAmount, 0, ',', '.');
        $newOrdersCount = trx_sewa::where('created_at', '>=', $oneWeekAgo)->count();
        $newOrdersCount = trx_sewa::where('created_at', '>=', $oneWeekAgo)->count();
        $newUsers = User::where('created_at', '>=', $oneMonth)->count();
        $newOrdersThisWeek = trx_sewa::with(['profile', 'ruangan'])->where('created_at', '>=', $oneWeekAgo)->get();
        
        return view('admin.dashboard', ['customers' => $customers, 'total_amount' => $totalAmount, 'weekly_orders_count' => $newOrdersCount, 
        'recent_monthly_users' => $newUsers,
        'this_week_orders' => $newOrdersThisWeek,
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

