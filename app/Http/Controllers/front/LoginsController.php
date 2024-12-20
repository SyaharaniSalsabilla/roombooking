<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterSpace;

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
        return view('.front.room');
    }

    public function contact()
    {
        return view('.front.contact');
    }

    public function login_email()
    {
        return view('.front.login_email');
    }
}
