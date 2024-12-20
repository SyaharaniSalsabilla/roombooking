<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterSpace;

class AboutController extends Controller
{
    public function about()
    {
        $data = MasterSpace::all();
        // dd($space);
        return view('.front.about')->with("data", $data);
    }

    public function promo()
    {
        $data = MasterSpace::all();
        // dd($space);
        return view('.front.about')->with("data", $data);
    }
}
