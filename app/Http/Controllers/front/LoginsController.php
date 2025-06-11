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
use App\Models\fasilitasRuangan;
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
        $fasilitas_umum = Ruangan::with('cn_fasilitas')->get();
        $Ruangan = \App\Models\Ruangan::orderBy('id','ASC')->first();
        return view('.front.promo')->with(['datas' => $datas, 'fasilitas_umum'=>$fasilitas_umum,'Ruangan' => $Ruangan]);
    }

    public function room()
    {
        $rooms = Ruangan::orderBy('id','ASC')->get();
        $fasilitas_umum = Ruangan::with('cn_fasilitas')->get();
        return view('.front.room',['rooms' => $rooms, 'fasilitas_umum'=> $fasilitas_umum]);
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


    
    public function pesan1($id)
    {
        $datas = Ruangan::orderBy('id','ASC')->get();
        $fasilitas = fasilitas::where('is_umum', false)->orderBy('id','ASC')->get();
        $fasilitas_umum = Ruangan::with('cn_fasilitas')->get();
        $pesanan = Ruangan::findOrFail($id);
        return view('front.pesan1', ['datas' => $datas, 'fasilitas' => $fasilitas, 'fasilitas_umum' => $fasilitas_umum, 'pesanan' => $pesanan ]);
    }

    public function getFasilitasUmum($id){
        $ruangan = Ruangan::with(['cn_fasilitas' => function($query) {
            $query->where('is_umum', true);
        }])->findOrFail($id);
        return $ruangan;
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
            'totalHarga' => $data['totalHarga'] ?? 0,
            'pesanan' => $pesanan = $data['ruangan'][0]
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
        
        // $validator = Validator::make($request->all(), [
        $validator = Validator::make($returnsVal, [
            'tgl_mulai' => 'required|date|before:tgl_selesai',
            'tgl_selesai' => 'required|date|after:tgl_mulai',
        ], [
            'tgl_mulai.required' => 'Tanggal mulai harus diisi.',
            'tgl_mulai.date' => 'Tanggal / jam mulai harus berupa tanggal yang valid.',
            'tgl_mulai.before' => 'Tanggal / jam mulai harus lebih kecil dari tanggal selesai.',
            'tgl_selesai.required' => 'Tanggal selesai harus diisi.',
            'tgl_selesai.date' => 'Tanggal / jam selesai harus berupa tanggal yang valid.',
            'tgl_selesai.after' => 'Tanggal / jam selesai harus lebih besar dari tanggal mulai.',
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
        $trx_ruangan = null;
        if(is_array($returnsVal['ruangans'])){
            foreach ($returnsVal['ruangans'] as $ruangan) {
                if ($this->checkPesanan($ruangan['id'], [$returnsVal['tgl_mulai'], $returnsVal['tgl_selesai']])) {
                    $namaRuangan = Ruangan::find($ruangan['id'])->nama_ruangan;
                    return back()
                        ->withErrors(['message' => "Ruangan $namaRuangan sudah dipesan pada tanggal {$returnsVal['tgl_mulai']} - {$returnsVal['tgl_selesai']}"])
                        ->withInput();
                }
            
                // Proses penyimpanan
                $trx_ruangan = $this->savePesanan([
                    "id"=> $ruangan["id"],
                    "totalHarga" => $returnsVal["totalHarga"],
                ], $tgl_mulai, $tgl_sampai, $note, $metode_bayar);
            
                // Simpan fasilitas tambahan
                // if (!empty($data_tambahan)) {
                //     foreach ($data_tambahan as $item) {
                //         $trx_ruangan->sewaFasilitas()->create([
                //             'trx_sewa_id' => $trx_ruangan->id,
                //             'mst_fasilitas_id' => $item['id'],
                //             'kuantitas' => $item['jumlah'],
                //             'satuan' => $item['satuan'] ?? 0,
                //         ]);
                //     }
                // }
            }            

            // Menyimpan data tambahan jika ada
            if (!empty($data_tambahan)) {
                foreach ($data_tambahan as $item) {
                    $trx_ruangan->sewaFasilitas()->create([
                        'trx_sewa_id' => $trx_ruangan->id,
                        'mst_fasilitas_id' => $item['id'],
                        'kuantitas' => $item['jumlah'],
                        'satuan' => 0,
                    ]);
                }
            }

            session()->put('transfer', $returnsVal);
            return view('.front.transfer',$returnsVal);
        }

        // Menyimpan data tambahan jika ada
        // if (!empty($data_tambahan)) {
        //     foreach ($data_tambahan as $item) {
        //         $trx_ruangan->sewaFasilitas()->create([
        //             'trx_sewa_id' => $trx_ruangan->id,
        //             'mst_fasilitas_id' => $item['id'],
        //             'kuantitas' => $item['jumlah'],
        //             'satuan',
        //         ]);
        //     }
        // }

        session()->put('transfer', $returnsVal);
        return view('.front.transfer',$returnsVal);
    }

    public function checkPesanan($ruanganId, $tanggalRange)
    {
        return trx_sewa::where('mst_ruangan_id', $ruanganId)
            ->where(function ($query) use ($tanggalRange) {
                $query->whereBetween('tanggal_awal', $tanggalRange)
                    ->orWhereBetween('tanggal_akhir', $tanggalRange)
                    ->orWhere(function ($subQuery) use ($tanggalRange) {
                        $subQuery->where('tanggal_awal', '<=', $tanggalRange[0])
                                ->where('tanggal_akhir', '>=', $tanggalRange[1]);
                    });
            })->exists();
    }


    protected function savePesanan($data, $tgl_mulai, $tgl_sampai, $note, $metode_bayar) {
        return trx_sewa::create([
            'mst_ruangan_id' => $data['id'],
            'mst_harga_sewa_id' => $data['totalHarga'],
            'mst_profil_id' => auth()->user()->id,
            'tanggal_awal' => $tgl_mulai,
            'tanggal_akhir' => $tgl_sampai,
            'keperluan' => $note,
            'diskon' => 0,
            'deskripsi' => $metode_bayar,
        ]);
    }
}