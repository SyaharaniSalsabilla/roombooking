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
                return view('admin.dashboard');
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
}
