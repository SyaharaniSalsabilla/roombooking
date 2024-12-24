<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterSpace;
use App\Models\Ruangan;
use App\Models\trx_sewa;

class LoginsController extends Controller
{
    public function about()
    {
        return view('.front.about');
    }

    public function promo()
    {
        $datas = \App\Models\Ruangan::orderBy('id','ASC')->get();
        return view('.front.promo')->with('datas', $datas);
    }

    public function room()
    {
        $rooms = Ruangan::orderBy('id','ASC')->get();
        return view('.front.room',['rooms' => $rooms]);
    }

    public function search_room(Request $request)
    {
        
        $rooms = Ruangan::with('booked');
        $keyword = $request->get('cari') ?? '';
        $arryaDate = explode(' ', $request->get('tanggal'));

        $arryaDate = array_filter($arryaDate, fn($item) => $item !== 'to');
        if (count($arryaDate) === 2) {
            $startDate = $arryaDate[0];
            $endDate = $arryaDate[2];

            $rooms = $rooms->whereDoesntHave('booked', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal_awal', [$startDate, $endDate])
                    ->orWhereBetween('tanggal_akhir', [$startDate, $endDate]);
            });
        }

        if ($keyword) {
            $rooms->where('nama_ruangan', 'LIKE', "%{$keyword}%");
        }

        $rooms = $rooms->get();

        return view('front.room', ['rooms' => $rooms]);
    }

    public function hasil_cari()
    {
        $datas = Ruangan::orderBy('id', 'ASC')->get();
        
        return view('.front.hasil_cari')->with('datas',$datas);
    }

    public function contact()
    {
        return view('.front.contact');
    }

    public function login_email()
    {
        return view('.front.login_email');
    }

    public function pesan1()
    {
        $datas = Ruangan::orderBy('id','ASC')->get();
        
        return view('front.pesan1', ['datas' => $datas]);
    }

    public function pesan2(Request $request)
    {
        $data = json_decode($request->input('data_json'), true);

        // Pastikan data diteruskan dengan struktur yang sesuai
        return view('.front.pesan2', [
            'ruangan' => $data['ruangan'] ?? [],
            'itemTambahan' => $data['itemTambahan'] ?? null,
            'totalHarga' => $data['totalHarga'] ?? 0
        ]);
    }

    public function pesan3(Request $request)
    {
        dd($request->all());
        return view('.front.pesan3');
    }
}
