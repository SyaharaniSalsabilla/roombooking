<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ruangan;
use App\Models\Informasi;

class HomeController extends Controller
{
    public function index()
    {
        $data = Ruangan::where('active', true)->orderBy('id', 'ASC')->get();
        $informasi = Informasi::orderBy('id','ASC')->get();
        $fasilitas_umum = Ruangan::with('cn_fasilitas')->get();
        return view('.front.home')->with(["data" => $data, "informasi" => $informasi, "fasilitas_umum"=> $fasilitas_umum]);
        
    }
}
