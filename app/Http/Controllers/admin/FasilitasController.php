<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\fasilitas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $fasilitas = fasilitas::where('is_umum', false)->where('active',true)->get();
        return view('admin.master.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required',
            'kuantitas' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'waktu_produksi' => 'required|integer|min:0', // Validasi waktu_produksi harus integer dan tidak negatif
        ]);


        $harga = str_replace('.', '', $request->harga);

        fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'kuantitas' => $request->kuantitas,
            'deskripsi' => $request->deskripsi,
            'harga_satuan' => $harga,
            'is_umum' => false,
            'image' => '',
            'waktu_produksi' => $request->waktu_produksi,
        ]);

        return redirect()->route('admin.fasilitas')->with('success', 'Fasility added successfully!');

    }

    public function update(Request $request, $id){
        $fasilitas = fasilitas::findOrFail($id);

        $request->validate([
            'nama_fasilitas' => 'required',
            'kuantitas' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'waktu_produksi' => 'required|integer|min:0',
        ]);


        $harga = str_replace('.', '', $request->harga);

        $fasilitas->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'kuantitas' => $request->kuantitas,
            'deskripsi' => $request->deskripsi,
            'harga_satuan' => $harga,
            'waktu_produksi' => $request->waktu_produksi,
        ]);

        return redirect()->route('admin.fasilitas')->with('success', 'Fasility updated successfully!');
    }

    public function destroy($id){
        // fasilitas::where('id',$id)->delete();
        fasilitas::where('id',$id)->update([
            'active' => false
        ]);
        return redirect()->route('admin.fasilitas')->with('success', 'Fasility deleted successfully!');
    }



}
