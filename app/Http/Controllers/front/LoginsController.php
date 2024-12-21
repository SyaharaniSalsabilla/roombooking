<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterSpace;
use App\Models\Ruangan;

class LoginsController extends Controller
{
    public function about()
    {
        return view('.front.about');
    }

    public function promo()
    {
        return view('.front.promo');
    }

    public function room()
    {
        $rooms = Ruangan::all();
        return view('.front.room',['rooms' => $rooms]);
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
        return view('.front.pesan1');
    }

    public function pesan2()
    {
        return view('.front.pesan2');
    }
}
