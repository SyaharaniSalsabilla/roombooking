<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MasterSpace;
use App\Models\MasterSpaceImage;
use App\Models\MasterSpacePrice;

class SpaceController extends Controller
{
    public function index()
    {
        $data = MasterSpace::all();

        return view('.front.space')->with("data", $data);
    }

    public function detail($id)
    {
        $data = MasterSpace::find($id);

        return view('.front.spacedetail')->with("data", $data);
    }

    public function booking()
    {
        return view('admin.spacebooking');
    }
}
