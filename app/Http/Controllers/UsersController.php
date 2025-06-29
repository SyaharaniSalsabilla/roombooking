<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
// use Midtrans\Snap;
// use Midtrans\Config;
// use Illuminate\Support\Str;


class UsersController extends Controller
{
    public function index()
    {
        \Log::info('Memuat halaman login');
        return view("front.login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $login = [
            'email'     =>$request->email,
            'password'  =>$request->password,
            // 'active'    =>1,
        ];

        $userFromDB = User::where('email', $request->email)->get();

        if(Auth::attempt($login)){
            if(Auth::user()->role == 1){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('home');
            }

        } else {
            return redirect('login')->withErrors('Email dan Password tidak valid');
        }
    }

    public function register()
    {
        return view('front.register');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function create(Request $request)
    {
        if($request->input('password') != $request->input('password_konfirmasi')){
            return back()->withErrors(['message' => 'Konfirmasi password tidak sesuai']);
        }

        $validator = Validator::make($request->all(), [
            'email'      => 'required|unique:users|max:255',
            'password'   => 'required',
        ],[
            'email.required' => 'Email sudah terpakai',
            'password.required' => 'Email sudah terpakai',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();

        $user = [
            'email'         =>$request->input('email'),
            'password'      =>Hash::make($request->input('password')),
            'status'        => true,
        ];

        $newUser = User::insertGetId($user);

        $data_profile = [
            'email' => $request->input('email'),
            'nama' => $request->input('nama_depan') . ' ' . $request->input('nama_belakang'),
            'password' => $request->input('password'),
        ];
        if($newUser ){
            profil::create($data_profile);
            $usr = User::find($newUser)->first();

            $login = [
                'email'     =>$request->email,
                'password'  =>$request->password,
            ];

            if(Auth::attempt($login)){
                if(Auth::user()->role == 1){
                    return view('admin.dashboard');
                }else{
                    return redirect()->route('home');
                }

            }
            // if($usr->role != 1){
            //     return redirect()->route("home");
            // }else{
            //     return redirect()->route("admin.dashboard");
            // }
        } else {
            return redirect("front.register")->withErrors('data tidak masuk');
        }
    }

    public function customer_login()
    {
        \Log::info('Memuat halaman login');
        return view("front.login_customer");
    }

    public function login_customer(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $login = [
            'email'     =>$request->email,
            'password'  =>$request->password,
            // 'active'    =>1,
        ];

        $userFromDB = User::where('email', $request->email)->get();

        if(Auth::attempt($login)){
            return redirect()->route('pesan3');
        } else {
            return redirect('login')->withErrors('Email dan Password tidak valid');
        }
    }

    // public function __construct()
    // {
    //     Config::$serverKey = config('midtrans.server_key');
    //     Config::$isProduction = config('midtrans.is_production');
    //     Config::$isSanitized = config('midtrans.is_sanitized', true);
    //     Config::$is3ds = config('midtrans.is_3ds', true);
    // }


    // public function bayar(Request $request)
    // {

    //     $items = $request->items;
    //     $total = collect($items)->sum(fn($item) => $item['price'] * $item['quantity']);

    //     $params = [
    //         'transaction_details' => [
    //             'order_id' => 'ORDER-' . Str::uuid(),
    //             'gross_amount' => $total,
    //         ],
    //         'item_details' => $items,
    //         'customer_details' => [
    //             'first_name' => $request->nama ?? 'Pembeli',
    //             'email' => $request->email ?? 'pembeli@email.com',
    //         ],
    //     ];

    //     $snapToken = Snap::getSnapToken($params);

    //     return response()->json(['snap_token' => $snapToken]);
    // }

    // public function callback(Request $request)
    // {
    //     $notif = new Notification();

    //     $transaction = $notif->transaction_status;
    //     $orderId = $notif->order_id;
    //     $grossAmount = $notif->gross_amount;
    //     $customerName = $notif->customer_details->first_name ?? 'Pembeli';

    //     if ($transaction == 'capture' || $transaction == 'settlement') {
    //         // Cek apakah order sudah ada agar tidak duplikat
    //         $order = Order::where('invoice', $orderId)->first();

    //         if (!$order) {
    //             Order::create([
    //                 'invoice' => $orderId,
    //                 'nama_pemesan' => $customerName,
    //                 'grand_total' => $grossAmount,
    //                 'id_user' => 0, // karena pemesan tidak login
    //                 'id_lokasi' => 0, // isi sesuai kebutuhan atau kirim via custom field
    //                 'id_status' => 1, // contoh status 'paid' atau 'baru'
    //             ]);
    //         }
    //     }

    //     return response()->json(['success' => true]);
    // }
    // public function getSnapToken(Request $request)
    // {
    //     Config::$serverKey = config('midtrans.server_key');
    //     Config::$isSanitized = true;
    //     Config::$is3ds = true;

    //     $params = [
    //         'transaction_details' => [
    //             'order_id' => uniqid(),
    //             'gross_amount' => $request->amount,
    //         ],
    //         // Tambahkan detail customer, item, dll sesuai kebutuhan
    //     ];

    //     try {
    //         $snapToken = Snap::getSnapToken($params);
    //         return response()->json(['token' => $snapToken]);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    public function findUser(Request $request){
        $email = '';
        if ($request){
            $email = $request->get('email');
        }
        $user = User::where('email',$email)->first();
        $dtreturn = json_decode($user, true);

        if(!$user){
            return back()->withErrors(['message' => 'Email tidak ditemukan']);
        }
        session(['email' => $user->email]);
        return redirect()->route('reset.page')->with(['email' => $user->email]);
    }

    public function resetPage(Request $request){

        $email = session('email');
        if (!$email){
             return back()->withErrors(['message' => 'Email tidak ditemukan']);
        }

        $user = User::where('email',$email)->first();
        $dtreturn = json_decode($user, true);

        if(!$user){
            return back()->withErrors(['message' => 'Email tidak ditemukan']);
        }

        return view('front.reset_password')->with(['user' => $user]);
    }

    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(),
        [
            'email' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ],[
            'email.required' => 'email harus diisi',
            'password.min' => 'password minimal 8 karakter',
            'password.required' => 'password harus diisi',
            'password_confirmation.required' => 'password konfirmasi harus diisi',
            'password-confirmation.same' => 'password tidak sama',
        ]);
        if ($validator->fails()) {
            return redirect()->route('reset.page')
                            ->with(['email' => $request->get('email')])
                            ->withErrors($validator)
                            ->withInput();
        }


        // Simpan password baru jika valid
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->passsword = Hash::make($request->password);
            $user->save();

            return redirect()->route('login')->with('status', 'Password berhasil direset');
        }

        return back()->withErrors(['email' => 'Email tidak ditemukan.']);
    }

    public function showResetForm(Request $request, $token)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

}
