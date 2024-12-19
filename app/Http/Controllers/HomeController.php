<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterSpace;

class HomeController extends Controller
{
    public function index()
    {
        $data = MasterSpace::all();
        // dd($space);
        return view('.front.home')->with("data", $data);
    }
}
