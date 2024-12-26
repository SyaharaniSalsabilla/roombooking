<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
            return view('admin.dashboard');
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
        $validator = Validator::make($request->all(), [
            'email'      => 'required|unique:posts|max:255',
            'password'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $validated = $validator->validated();

        $user = [
            'email'         =>$request->input('email'),
            'password'      =>Hash::make($request->input('password')),
        ];

        $newUser = Employee::insertGetId($user);

        if($newUser > 0){
            return redirect("template.front.login");
        } else {
            return redirect("front.register")->withErrors('data tidak masuk');
        }
    }
}
