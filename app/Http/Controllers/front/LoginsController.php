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
use Illuminate\Support\Facades\Validator;

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
                'email' => 'required'
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
        if($request->method() == 'GET'){
            $datas = session()->get('datas');
            
            if($datas){
                return view('.front.pesan3_login',$datas);
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
        
        $validator = Validator::make($request->all(), [
            'data_tgl_mulai' => 'required|date|before:data_tgl_sampai',
            'data_tgl_sampai' => 'required|date|after:data_tgl_mulai',
        ], [
            'data_tgl_mulai.required' => 'Tanggal mulai harus diisi.',
            'data_tgl_mulai.date' => 'Tanggal mulai harus berupa tanggal yang valid.',
            'data_tgl_mulai.before' => 'Tanggal mulai harus lebih kecil dari tanggal selesai.',
            'data_tgl_sampai.required' => 'Tanggal selesai harus diisi.',
            'data_tgl_sampai.date' => 'Tanggal selesai harus berupa tanggal yang valid.',
            'data_tgl_sampai.after' => 'Tanggal selesai harus lebih besar dari tanggal mulai.',
        ]);
        

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

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
        $valid = Validator::make($returnsVal,[
            'ruangans' => 'required',
            'tambahans' => 'nullable',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'totalHarga' => 'required',
            'notes' => 'nullable',
            'kode' => 'required',
            'metode_bayar' => 'required'
        ],[
            'ruangans.required' => 'Silahkan memilih ruangan',
            'tambahans.required' => '',
            'tgl_mulai.required' => 'Tanggal dan waktu mulai harus terisi',
            'tgl_selesai.required' => 'Tanggal dan waktu akhir harus terisi',
            'totalHarga.required' => '',
            'notes.required' => '',
            'kode.required' => 'Silahkan memilih metode pembayaran',
            'metode_bayar.required' => 'Silahkan memilih metode pembayaran'
        ]);
        if ($valid->fails()) {
            return back()
                        ->withErrors($valid)
                        ->withInput();
        }
        
        
        // Menyimpan data trx_ruangan
        $trx_ruangan = trx_sewa::create([
            'mst_ruangan_id' => $data_ruangan[0]['id'], // Mengambil ID ruangan pertama
            'mst_harga_sewa_id' => $data_total, // Menggunakan total harga
            'mst_profil_id' => auth()->user()->id, // Profil user yang login
            'tanggal_awal' => $tgl_mulai,
            'tanggal_akhir' => $tgl_sampai,
            'keperluan' => $note,
            'diskon' => 0, // Jika ada diskon, Anda bisa menambahkannya di sini
            'deskripsi' => $metode_bayar, // Deskripsi bisa menggunakan metode pembayaran
        ]);

        // Menyimpan data tambahan jika ada
        if (!empty($data_tambahan)) {
            foreach ($data_tambahan as $item) {
                $trx_ruangan->sewaFasilitas()->create([
                    'trx_sewa_id' => $trx_ruangan->id,
                    'mst_fasilitas_id' => $item['id'],
                    'kuantitas' => $item['jumlah'],
                    'satuan',
                ]);
            }
        }


        session()->put('transfer', $returnsVal);
        return view('.front.transfer',$returnsVal);
    }
}
