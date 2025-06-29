<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\harga_sewa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::where('active', true)->get();
        return view('admin.master.ruangan.index', compact('ruangans'));
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
            'diskon' => 'nullable|numeric|min:0|max:100',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar_ruangan')) {
            $image = $request->file('gambar_ruangan');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/front/image'), $imageName);
        }

        $harga = str_replace('.', '', $request->harga);

        $ruangan = Ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'kapasitas' => $request->kapasitas,
            'lokasi' => $request->lokasi,
            'panjang_ruangan' => $request->panjang,
            'lebar_ruangan' => $request->lebar,
            'deskripsi' => $request->deskripsi,
            'image' => $imageName,
            'harga' => $harga,
            'active' => true, // Set active to true by default
            'diskon' => $request->diskon ?? 0, // Default to 0 if not provided
        ]);

        return redirect()->route('admin.ruangan')->with('success', 'Ruangan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ruangans = Ruangan::findOrFail($id);
        return view('admin.master.ruangan.edit', compact('ruangans'));
    }

    public function update(Request $request, $id)
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
            'diskon' => 'nullable|numeric|min:0|max:100',
        ]);

        $ruangan = Ruangan::findOrFail($id);
        $harga = str_replace('.', '', $request->harga);

        if ($request->hasFile('gambar_ruangan')) {
            // Optional: hapus gambar lama jika ada
            if ($ruangan->image && file_exists(public_path('assets/front/image/' . $ruangan->image))) {
                unlink(public_path('assets/front/image/' . $ruangan->image));
            }
            $image = $request->file('gambar_ruangan');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/front/image'), $imageName);
            $ruangan->image = $imageName; // Update the image name
        }
        $ruangan->update([
            'nama_ruangan' => $request->nama_ruangan,
            'kapasitas' => $request->kapasitas,
            'lokasi' => $request->lokasi,
            'panjang_ruangan' => $request->panjang,
            'lebar_ruangan' => $request->lebar,
            'deskripsi' => $request->deskripsi,
            'harga' => $harga,
            'diskon' => $request->diskon ?? 0, // Default to 0 if not provided
        ]);

        return redirect()->route('admin.ruangan')->with('success', 'Ruangan berhasil diperbarui!');
    }

    // public function destroy($id)
    // {
    //     $ruangan = Ruangan::findOrFail($id);


    //     if ($ruangan->gambar && Storage::disk('public')->exists($ruangan->gambar)) {
    //         Storage::disk('public')->delete($ruangan->gambar);
    //     }

    //     $ruangan->update(["active" => false]);

    //     return redirect()->route('admin.ruangan')->with('success', 'Ruangan berhasil dihapus!');
    // }

    public function destroy($id)
    {
        $ruangan = Ruangan::findOrFail($id);

        // Optional: hapus gambar juga
        if ($ruangan->image && file_exists(public_path('assets/front/image/' . $ruangan->image))) {
            unlink(public_path('assets/front/image/' . $ruangan->image));
        }
        // Set active to false instead of deleting
        $ruangan->update(['active' => false]);

        return redirect()->route('admin.ruangan')->with('success', 'Ruangan berhasil dihapus.');
    }

    // harga
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

        harga_sewa::create([
            'ruangan_id' => $request->ruangan,
            'durasi' => $request->durasi,
            'harga' => $harga
        ]);

        return redirect()->route('admin.ruanganHarga')->with('success', 'Harga sewa berhasil ditambahkan!');
    }
}
