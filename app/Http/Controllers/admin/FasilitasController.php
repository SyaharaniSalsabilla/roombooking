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
        $fasilitas = fasilitas::where('is_umum', false)->get();
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
            'gambar_fasilitas' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
        ]);

        $imagePath = null;

        if ($request->hasFile('gambar_fasilitas')) {
            $image = $request->file('gambar_fasilitas');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('/images/fasilitas', $imageName, 'public');
        }

        $harga = str_replace('.', '', $request->harga);

        fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'kuantita' => $request->kuantitas,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath,
            'harga_satuan' => $harga
                
        ]);

        return redirect()->route('admin.fasilitas')->with('success', 'Fasility added successfully!');

    }

    public function update(Request $request, $id){
        $fasilitas = fasilitas::findOrFail($request->id);

        $request->validate([
            'nama_fasilitas' => 'required',
            'kuantitas' => 'required',
            'deskripsi' => 'required',
            'gambar_fasilitas' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
        ]);

        $imagePath = $fasilitas->image;

        if ($request->hasFile('gambar_fasilitas')) {
            $image = $request->file('gambar_fasilitas');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('/images/fasilitas', $imageName, 'public');

            if ($fasilitas->image) {
                Storage::delete('/public/' . $fasilitas->image);
            }
        }

        $harga = str_replace('.', '', $request->harga);

        $fasilitas->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'kuantita' => $request->kuantitas,
            'deskripsi' => $request->deskripsi,
            'image' => $imagePath,
            'harga_satuan' => $harga
        ]);

        return redirect()->route('admin.fasilitas')->with('success', 'Fasility updated successfully!');
    }

    

}
