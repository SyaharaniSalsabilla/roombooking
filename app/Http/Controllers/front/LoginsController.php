<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterSpace;
use App\Models\Ruangan;
use App\Models\trx_sewa;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\fasilitas;

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
        $keyword = strtolower($request->get('cari')) ?? '';
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
            $rooms->whereRaw("lower(nama_ruangan) LIKE '%{$keyword}%'");
        }
        $rooms = $rooms->get();
        
        return view('front.hasil_cari', ['rooms' => $rooms, 'dates' => $request->get('tanggal'),'cari' => $request->get('cari')]);
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function profile(Request $request)
    {
        return view('front.profil');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        if ( $request->has('password_baru') && $request->password_baru != null ){
            $valid = $request->validate([
                'password_baru' => 'required',
            ]);
            $user->password = Hash::make($request->input('password_baru'));
            $user->save();

            $request['password'] = $request->input('password_baru');
        }else{
            unset($request['password_baru']);
        }

        unset($request['_token']);
        $profile = $user->profile;
        $datas = $request->all();
        
        foreach($datas as $key=>$val){
            if($key == 'email' && $user->email != $val){
                $user->email = $val;
                $user->save();
            }
            $profile->$key  = $val;
        }
        // dd($profile);
        $profile->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }


    
    public function pesan1()
    {
        $datas = Ruangan::orderBy('id','ASC')->get();
        $fasilitas = fasilitas::orderBy('id','ASC')->get();
        
        return view('front.pesan1', ['datas' => $datas, 'fasilitas' => $fasilitas]);
    }
    
    public function pesan2(Request $request)
    {
        if($request->method() == 'GET'){
            $datas = session()->get('pesan2');
            return view('.front.pesan2',$datas);
        }

        $data = json_decode($request->input('data_json'), true);
        $datas = [
            'ruangan' => $data['ruangan'] ?? [],
            'itemTambahan' => $data['itemTambahan'] ?? null,
            'totalHarga' => $data['totalHarga'] ?? 0
        ];

        session()->put('pesan2', $datas);
        return view('.front.pesan2',$datas);
    }

    public function pesan3(Request $request)
    {
        if($request->method() == 'GET'){
            $datas = session()->get('datas');
            
            if($datas){
                return view('.front.pesan3',$datas);
            }
        }

        $data_ruangan = json_decode($request->input('data_ruangan'), true);
        $data_tambahan = json_decode($request->input('data_tambahan'), true);
        $data_total = json_decode($request->input('data_total'), true);

        $tgl_mulai = $request->input('data_tgl_mulai');
        $tgl_sampai = $request->input('data_tgl_sampai');
        $jam_mulai = $request->input('data_jam_mulai');
        $jam_Sampai = $request->input('data_jam_sampai');
        $tgl_jam_mulai =(String) $tgl_mulai . ' ' . $jam_mulai;
        $tgl_jam_selesai = $tgl_sampai . ' '. $jam_Sampai;
        $returnsVal = [
            'ruangans' => $data_ruangan,
            'tambahans' => $data_tambahan,
            'tgl_mulai' => $tgl_jam_mulai,
            'tgl_selesai' => $tgl_jam_selesai,
            'totalHarga' => $data_total
        ];

        session()->put('pesan3', $returnsVal);
        
        return view('.front.pesan3',$returnsVal);
    }

    public function pesan3_login(Request $request)
    {
        $data_ruangan = json_decode($request->input('data_ruangan'), true);
        $data_tambahan = json_decode($request->input('data_tambahan'), true);
        $data_total = json_decode($request->input('data_total'), true);

        $tgl_mulai = $request->input('data_tgl_mulai');
        $tgl_sampai = $request->input('data_tgl_sampai');
        $jam_mulai = $request->input('data_jam_mulai');
        $jam_Sampai = $request->input('data_jam_sampai');
        $tgl_jam_mulai =(String) $tgl_mulai . ' ' . $jam_mulai;
        $tgl_jam_selesai = $tgl_sampai . ' '. $jam_Sampai;
        $returnsVal = [
            'ruangans' => $data_ruangan,
            'tambahans' => $data_tambahan,
            'tgl_mulai' => $tgl_jam_mulai,
            'tgl_selesai' => $tgl_jam_selesai,
            'totalHarga' => $data_total
        ];
        $request->session()->put('datas', $returnsVal);

        return view('.front.pesan3_login',$returnsVal);
    }

    public function pesan4(Request $request)
    {
        if($request->method() == 'GET'){
            $datas = session()->get('pesan4');
            return view('.front.pesan4',$datas);
        }

        $data_ruangan = json_decode($request->input('data_ruangan'), true);
        $data_tambahan = json_decode($request->input('data_tambahan'), true);
        $data_total = json_decode($request->input('data_total'), true);

        $tgl_mulai = $request->input('data_tgl_mulai');
        $tgl_sampai = $request->input('data_tgl_sampai');
        $note = $request->input('data_note');
        
        $returnsVal = [
            'ruangans' => $data_ruangan,
            'tambahans' => $data_tambahan,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_sampai,
            'totalHarga' => $data_total,
            'notes' => $note
        ];

        session()->put('pesan4', $returnsVal);
        
        return view('.front.pesan4',$returnsVal);
    }

    public function transfer(Request $request)
    {
        if($request->method() == 'GET'){
            $datas = session()->get('transfer');
            return view('.front.transfer',$datas);
        }

        $data_ruangan = json_decode($request->input('data_ruangan'), true);
        $data_tambahan = json_decode($request->input('data_tambahan'), true);
        $data_total = json_decode($request->input('data_total'), true);

        $tgl_mulai = $request->input('data_tgl_mulai');
        $tgl_sampai = $request->input('data_tgl_sampai');
        $note = $request->input('data_note');
        $kode = $request->input('data_kode');
        $metode_bayar = $request->input('data_metode_bayar');
        
        $returnsVal = [
            'ruangans' => $data_ruangan,
            'tambahans' => $data_tambahan,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_sampai,
            'totalHarga' => $data_total,
            'notes' => $note,
            'kode' => $kode,
            'metode_bayar' => $metode_bayar
        ];

        session()->put('transfer', $returnsVal);
        return view('.front.transfer',$returnsVal);
    }
}
