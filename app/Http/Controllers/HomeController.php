<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ruangan;

class HomeController extends Controller
{
    public function index()
    {
        $data = Ruangan::all();
        // dd($space);
        return view('.front.home')->with("data", $data);
    }
}
