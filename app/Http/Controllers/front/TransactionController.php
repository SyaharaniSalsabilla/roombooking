<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;

class TransactionController extends Controller
{
    public function index(){
        return view('front.pesan1');
    }

    public function pesan(Request $request){
        $datas = \App\Models\Ruangan::orderBy('id','ASC')->get();
        return view('front.pesan1', ['datas' => $datas]);
    }
}