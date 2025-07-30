<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterSpace;
use App\Models\Ruangan;
use App\Models\trx_sewa;
use App\Notifications\ProfileUpdated;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\fasilitas;
use App\Models\fasilitasRuangan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Mail\InvoiceMail;
use App\Models\Profil;
use App\Models\harga_sewa;
use App\Models\sewa_fasilitas;

class LoginsController extends Controller
{

    public function about()
    {
        return view('.front.about');
    }

    public function promo()
    {
        $datas = \App\Models\Ruangan::where('active',true)->where('diskon','>',0)->orderBy('id','ASC')->get();
        $fasilitas_umum = Ruangan::where('active',true)->with('cn_fasilitas')->get();
        $Ruangan = \App\Models\Ruangan::where('active',true)->orderBy('id','ASC')->first();
        return view('.front.promo')->with(['datas' => $datas, 'fasilitas_umum'=>$fasilitas_umum,'Ruangan' => $Ruangan]);
    }

    public function room()
    {
        $rooms = Ruangan::where('active',true)->orderBy('id','ASC')->get();
        $fasilitas_umum = Ruangan::where('active',true)->with('cn_fasilitas')->get();
        return view('.front.room',['rooms' => $rooms, 'fasilitas_umum'=> $fasilitas_umum]);
    }

    public function search_room(Request $request)
    {

        $rooms = Ruangan::where('active',true)->with('booked');
        $keyword = strtolower($request->get('cari')) ?? '';
        $arryaDate = explode(' ', $request->get('tanggal'));
         $fasilitas_umum = Ruangan::where('active',true)->with('cn_fasilitas')->get();

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

        return view('front.hasil_cari', ['Ruangan' => $rooms, 'dates' => $request->get('tanggal'),'cari' => $request->get('cari'), 'fasilitas_umum' =>$fasilitas_umum]);
    }

    public function hasil_cari()
    {
        $datas = Ruangan::where('active',true)->orderBy('id', 'ASC')->get();

        return view('.front.hasil_cari')->with('datas',$datas);
    }

    public function contact()
    {
        return view('.front.contact');
    }

    public function kirim(Request $request)
    {
        $request->validate([
        'nama' => 'required|string|max:100',
        'email' => 'required|email',
        'pesan' => 'required|string|max:1000',
        ]);

        $data = $request->only(['nama', 'email', 'pesan']);

        // Kirim email ke pengelola
        Mail::raw("Pesan dari: {$data['nama']} ({$data['email']})\n\n{$data['pesan']}", function ($message) use ($data) {
            $message->to('ninspacecenter@gmail.com')
                    ->subject('Pesan dari Form Kontak NinSpace');
        });

        return redirect()->back()->with('success', 'Pesan berhasil dikirim. Terima kasih telah menghubungi kami! 
        Kami akan membalas pesan Anda maksimal dalam 1×24 jam.');
    }

    public function login_email()
    {
        return view('.front.login_email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Proses kirim reset link via Laravel built-in
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'repassword'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login.email')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
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
        $profile->save();

        return back()->with('success', 'Kata sandi berhasil diperbarui.');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        // Validasi (untuk semua perubahan profil, bukan hanya password)
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        // Update data profil
        $profile->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        // Kirim notifikasi email bahwa profil telah diubah
        $user->notify(new ProfileUpdated($user));


        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function riwayat_transaksi()
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Ambil semua data yang dibutuhkan
        $fasilitas = fasilitas::all();
        $profil = profil::all();
        $ruangan = Ruangan::all();
        $harga = harga_sewa::all();

        // Ambil transaksi hanya milik user yang sedang login
        $transaksi = trx_sewa::with(['ruangan', 'sewaFasilitas', 'sewaFasilitas.fasilitas', 'user'])
                        ->where('mst_profil_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();

        // Group berdasarkan kode_transaksi agar bisa ditampilkan sebagai 1 baris per transaksi
        $transaksi = $transaksi->groupBy('kode_transaksi')->map(function ($items, $kode) {
            $last = $items->last();

            // Gabungkan semua nama ruangan unik
            $nama_ruangan = $items->pluck('ruangan.nama_ruangan')->unique()->implode(', ');
            $last->gabungan_nama_ruangan = $nama_ruangan;

            return $last;
        });

        return view('front.riwayat_transaksi', compact(['ruangan', 'harga', 'fasilitas', 'profil', 'transaksi']));
    }


    public function statusFasilitas($kode, $status)
    {
        if ($status == 4) {
            $this->sendInvoice($kode);
            return redirect()->back()->with('success', 'Status fasilitas berhasil diperbarui dan invoice telah dikirim.');
        }
        $updated = trx_sewa::where('kode_transaksi', $kode)->update(['status' => $status]);

        return redirect()->back()->with('success', 'Status fasilitas berhasil diperbarui.');
    }
    
    protected function sendInvoice($kode)
    {
        $user = auth()->user();

        // Ambil data profil user berdasarkan email
        $profil = \App\Models\profil::where('email', $user->email)->first();

        $transaksi = trx_sewa::with(['ruangan', 'sewaFasilitas', 'sewaFasilitas.fasilitas'])
        ->where('kode_transaksi', $kode)
        ->where('mst_profil_id', $profil->id) // hanya ambil transaksi milik user login
        ->get();

        $ruangan = [];
        $fasilitas = null;
        $email = '';
        $harga_total = 0;
        $note = '';
        $tanggal_awal = '';
        $tanggal_akhir = '';
        $status = '';
        $waktu = 0;
        foreach ($transaksi as $trx) {
            $ruangan[] = Ruangan::where('id', $trx->mst_ruangan_id)->first();
            $fasilitas = sewa_fasilitas::where('trx_sewa_id', $trx->id)->get();
            $email = $trx->user->email;
            $harga_total = $trx->mst_harga_sewa_id;
            $note = $trx->keperluan;
            $tanggal_awal = $trx->tanggal_awal;
            $tanggal_akhir = $trx->tanggal_akhir;
            if ($trx->status == 0) {
                $status = 'Menunggu pembayaran';
            } else if ($trx->status == 1) {
                $status = 'Pembayaran diterima';
            } else if ($trx->status == 2) {
                $status = 'Selesai';
            } else if ($trx->status == 3) {
                $status = 'Dibatalkan';
            }
            $tanggalAwal = \Carbon\Carbon::parse($trx->tanggal_awal);
            $tanggalAkhir = \Carbon\Carbon::parse($trx->tanggal_akhir);
            $waktu = ceil($tanggalAwal->diffInHours($tanggalAkhir));
        }

        $data = [
            'kode_transaksi' => $kode,
            'ruangan' => $ruangan,
            'fasilitas' => $fasilitas,
            'email' => $email,
            'harga_t' => $harga_total,
            'note' => $note,
            'tanggal_awal' => $tanggal_awal,
            'tanggal_akhir' => $tanggal_akhir,
            'status' => $status,
            'waktu' => $waktu,
        ];

        Mail::send('admin.transaction.invoice', $data, function ($message) use ($email) {
            $message->to($email)
                ->subject('Invoice Pemesanan - Nin Space');
        });

        return redirect()->back()->with('success', 'Invoice berhasil dikirim ke email Anda.');
    }


    public function pesan1($id)
    {
        $datas = Ruangan::where('active',true)->orderBy('id','ASC')->get();
        $fasilitas = fasilitas::where('is_umum', false)->where('active', true)->orderBy('id','ASC')->get();
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

        // Cek pesanan
        $trx_ruangan = null;
        if(is_array($returnsVal['ruangans'])){
            foreach ($returnsVal['ruangans'] as $ruangan) {
                if ($this->checkPesanan($ruangan['id'], [$returnsVal['tgl_mulai'], $returnsVal['tgl_selesai']])) {
                    $namaRuangan = Ruangan::find($ruangan['id'])->nama_ruangan;
                    return back()
                        ->withErrors(['message' => "Ruangan $namaRuangan sudah dipesan pada tanggal {$returnsVal['tgl_mulai']} - {$returnsVal['tgl_selesai']}"])
                        ->withInput();
                }
            }

        }


        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

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
            if($datas){
                return view('.front.pesan4',$datas);
            }
        }

        $data_ruangan = json_decode($request->input('data_ruangan'), true);
        $data_tambahan = json_decode($request->input('data_tambahan'), true);
        $data_total = json_decode($request->input('data_total'), true);


        $tgl_mulai = $request->input('data_tgl_mulai');
        $tgl_sampai = $request->input('data_tgl_sampai');
        $note = $request->input('data_note');

        $id_transaksi = "TRX" . date('YmdHis') . rand(1000, 9999);


        if(is_array($data_ruangan)){



            foreach ($data_ruangan as $ruangan) {
                if ($this->checkPesanan($ruangan['id'], [$tgl_mulai, $tgl_sampai])) {
                    $namaRuangan = Ruangan::find($ruangan['id'])->nama_ruangan;
                    return back()
                        ->withErrors(['message' => "Ruangan $namaRuangan sudah dipesan pada tanggal $tgl_mulai - $tgl_sampai"])
                        ->withInput();
                }

                // Proses penyimpanan
                $trx_ruangan = $this->savePesanan([
                    "id"=> $ruangan["id"],
                    "totalHarga" => $data_total,
                ], $tgl_mulai, $tgl_sampai, $note, null, $id_transaksi);
            }

            // Menyimpan data tambahan jika ada
            if (!empty($data_tambahan)) {
                foreach ($data_tambahan as $item) {
                    $trx_stat =$trx_ruangan->sewaFasilitas()->create([
                        'trx_sewa_id' => $trx_ruangan->id,
                        'mst_fasilitas_id' => $item['id'],
                        'kuantitas' => $item['jumlah'],
                        'satuan' => 0,
                    ]);
                }
            }
        }

        $returnsVal = [
            'ruangans' => $data_ruangan,
            'tambahans' => $data_tambahan,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_sampai,
            'totalHarga' => $data_total,
            'notes' => $note,
            'kode' => $id_transaksi,
        ];

        session()->put('pesan4', $returnsVal);

        return view('.front.pesan4',$returnsVal);
    }

    public function transfer(Request $request)
    {
        if($request->method() == 'GET'){
            $datas = session()->get('transfer');
            if($datas){
                return view('.front.transfer',$datas);
            }
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

        // if(is_array($returnsVal['ruangans'])){



        //     foreach ($returnsVal['ruangans'] as $ruangan) {
        //         if ($this->checkPesanan($ruangan['id'], [$returnsVal['tgl_mulai'], $returnsVal['tgl_selesai']])) {
        //             $namaRuangan = Ruangan::find($ruangan['id'])->nama_ruangan;
        //             return back()
        //                 ->withErrors(['message' => "Ruangan $namaRuangan sudah dipesan pada tanggal {$returnsVal['tgl_mulai']} - {$returnsVal['tgl_selesai']}"])
        //                 ->withInput();
        //         }

        //         // Proses penyimpanan
        //         $trx_ruangan = $this->savePesanan([
        //             "id"=> $ruangan["id"],
        //             "totalHarga" => $returnsVal["totalHarga"],
        //         ], $tgl_mulai, $tgl_sampai, $note, $metode_bayar);

        //         // Simpan fasilitas tambahan
        //         // if (!empty($data_tambahan)) {
        //         //     foreach ($data_tambahan as $item) {
        //         //         $trx_ruangan->sewaFasilitas()->create([
        //         //             'trx_sewa_id' => $trx_ruangan->id,
        //         //             'mst_fasilitas_id' => $item['id'],
        //         //             'kuantitas' => $item['jumlah'],
        //         //             'satuan' => $item['satuan'] ?? 0,
        //         //         ]);
        //         //     }
        //         // }
        //     }

        //     // Menyimpan data tambahan jika ada
        //     if (!empty($data_tambahan)) {
        //         foreach ($data_tambahan as $item) {
        //             $trx_stat =$trx_ruangan->sewaFasilitas()->create([
        //                 'trx_sewa_id' => $trx_ruangan->id,
        //                 'mst_fasilitas_id' => $item['id'],
        //                 'kuantitas' => $item['jumlah'],
        //                 'satuan' => 0,
        //             ]);
        //         }
        //     }

        //     session()->put('transfer', $returnsVal);
        //     return view('.front.transfer',$returnsVal);
        // }

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


        $updated_bayar = trx_sewa::where('kode_transaksi', $kode)->update(['status' => '1']);
        session()->put('transfer', $returnsVal);
        return view('.front.transfer',$returnsVal);
    }

    public function checkPesanan($ruanganId, $tanggalRange)
    {
        return trx_sewa::where('mst_ruangan_id', $ruanganId)
            ->where('status','1')
            ->where(function ($query) use ($tanggalRange) {
                $query->whereBetween('tanggal_awal', $tanggalRange)
                    ->orWhereBetween('tanggal_akhir', $tanggalRange)
                    ->orWhere(function ($subQuery) use ($tanggalRange) {
                        $subQuery->where('tanggal_awal', '<=', $tanggalRange[0])
                                ->where('tanggal_akhir', '>=', $tanggalRange[1]);
                    });
            })->exists();
    }


    protected function savePesanan($data, $tgl_mulai, $tgl_sampai, $note, $metode_bayar, $id_transaksi = null) {
        $diskon = Ruangan::find($data['id'])->diskon ?? 0;
        return trx_sewa::create([
            'mst_ruangan_id' => $data['id'],
            'mst_harga_sewa_id' => $data['totalHarga'],
            'mst_profil_id' => auth()->user()->id,
            'tanggal_awal' => $tgl_mulai,
            'tanggal_akhir' => $tgl_sampai,
            'keperluan' => $note,
            'diskon' => $diskon,
            'deskripsi' => $metode_bayar,
            'kode_transaksi' => $id_transaksi,
            'status' => '0',
        ]);
    }

    public function showLinkRequestForm(){
        return view('front.find_user');
    }

    public function konfirmasiPembayaran($id)
    {
        $pemesanan = Pemesanan::with(['ruangan', 'fasilitas.fs'])->findOrFail($id);
        $pemesanan->status = 'Pembayaran diterima';
        $pemesanan->save();

        // === 1. Buat data invoice
        $data = [
            'kode_transaksi' => $pemesanan->kode_transaksi,
            'tanggal_awal' => $pemesanan->tgl_mulai,
            'tanggal_akhir' => $pemesanan->tgl_selesai,
            'status' => $pemesanan->status,
            'ruangan' => $pemesanan->ruangan,
            'fasilitas' => $pemesanan->fasilitas,
            'waktu' => $pemesanan->durasi_jam,
            'harga_t' => $pemesanan->total_harga,
            'note' => $pemesanan->catatan,
        ];

        // === 2. Generate dan simpan PDF
        $filename = 'invoice_' . $pemesanan->kode_transaksi . '.pdf';
        $pdf = Pdf::loadView('invoice-pdf', $data); // atau 'invoice' jika kamu pakai view yg sama
        Storage::put('public/invoices/' . $filename, $pdf->output());

        // === 3. Buat link download
        $downloadLink = asset('storage/invoices/' . $filename);

        // === 4. Kirim email
        Mail::to($pemesanan->user->email)->send(new InvoiceMail($pemesanan, $downloadLink));

        return redirect()->back()->with('success', 'Pembayaran dikonfirmasi dan invoice dikirim.');
    }

    public function getSnapToken(Request $request)
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;

        $orderId = 'TRX-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $request->total, // pastikan 'total' dikirim dari JS
            ],
            'customer_details' => [
                'first_name' => Auth::user()->profile->nama ?? 'User',
                'email' => Auth::user()->email,
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
