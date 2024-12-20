<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        return view('front.pesan1');
    }

    public function pesan(Request $request){
        // diabil dari data yang di piliih oleh customer
        $ids = [1,2,3];
        return view('front.pesan1', ['pesanan' => $ids]);
    }
}