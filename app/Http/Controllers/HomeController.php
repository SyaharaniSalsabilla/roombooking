<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ruangan;
use App\Models\Informasi;

class HomeController extends Controller
{
    public function index()
    {
        $data = Ruangan::orderBy('id','ASC')->get();
        $informasi = Informasi::orderBy('id','ASC')->get();
        return view('.front.home')->with(["data" => $data, "informasi" => $informasi]);
    }
}
