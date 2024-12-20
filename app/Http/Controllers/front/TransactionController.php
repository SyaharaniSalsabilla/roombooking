<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index(){
        return view('front.pesan1');
    }
}