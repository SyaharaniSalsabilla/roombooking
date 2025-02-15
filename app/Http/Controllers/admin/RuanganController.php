<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\harga_sewa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class RuanganController extends Controller
{

    public function index()
    {
        $ruangan = Ruangan::all();

        return view('admin.master.ruangan.index', compact('ruangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required',
            'kapasitas' => 'required',
            'lokasi' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'deskripsi' => 'required',
            'gambar_ruangan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
        ]);

        $imagePath = null;

        if ($request->hasFile('gambar_ruangan')) {
            $image = $request->file('gambar_ruangan');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('/images/ruangan', $imageName, 'public');
        }

        $harga = str_replace('.', '', $request->harga);

        Ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'kapasitas' => $request->kapasitas,
            'lokasi' => $request->lokasi,
            'panjang_ruangan' => $request->panjang,
            'lebar_ruangan' => $request->lebar,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath,
            'harga' => $harga
        ]);

        return redirect()->route('admin.ruangan')->with('success', 'Room added successfully!');

    }

    public function indexHarga()
    {
        $harga = harga_sewa::all();
        $ruangan = Ruangan::all();

        return view('admin.master.hargaRuangan.index', compact(['harga', 'ruangan']));
    }

    public function storeHarga(Request $request)
    {
        $request->validate([
            'ruangan' => 'required',
            'durasi' => 'required',
            'harga' => 'required',
        ]);

        $harga = str_replace('.', '', $request->harga);

        Ruangan::create([
            'ruangan_id' => $request->ruangan,
            'durasi' => $request->durasi,
            'harga' => $harga
        ]);

        return redirect()->route('admin.ruanganHarga')->with('success', 'Price Room added successfully!');

    }

}
