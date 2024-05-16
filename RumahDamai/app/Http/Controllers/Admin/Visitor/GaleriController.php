<?php

namespace App\Http\Controllers\Admin\Visitor;

use App\Http\Controllers\Controller;
use App\Models\DetailGaleri;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::all();
        $detailgaleri = DetailGaleri::all();
        return view('admin.Visitor.galeri.index', compact('galeri','detailgaleri'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Visitor.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'img_galeri.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi setiap file img_fasilitas
            'judul' => 'required|string',
            'waktu' => 'required|date',
            'lokasi' => 'required|string',

        ]);
    
        // Buat instance Fasilitas dan simpan data fasilitas
        $galeri = new Galeri;
        $galeri->judul = $request->input('judul'); 
        $galeri->waktu = $request->input('waktu'); 
        $galeri->lokasi = $request->input('lokasi'); 
        $galeri->save();
    
        // Proses untuk setiap file img_galeri yang diunggah
        if ($request->hasFile('img_galeri')) {
            foreach ($request->file('img_galeri') as $img_galeri) {
                $slug = Str::slug(pathinfo($img_galeri->getClientOriginalName(), PATHINFO_FILENAME));
                $new_gambar = time() . '_' . $slug . '.' . $img_galeri->getClientOriginalExtension();
        
                // Pindahkan img_galeri ke direktori yang diinginkan
                $img_galeri->move('uploads/visitor/galeri/', $new_gambar);
        
                // Buat instance Detailgaleri dan simpan data terkait
                $detailgaleri = new DetailGaleri;
                $detailgaleri->galeri_id = $galeri->id;
                $detailgaleri->img_galeri = 'uploads/visitor/galeri/' . $new_gambar;
                $detailgaleri->save();
            }
        }
    
        return redirect()->route('galeri.index')->with('success', 'galeri created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        $detailgaleri = DetailGaleri::where('galeri_id', $id)->get();

    
        // Kembalikan view 'carousel.show' dengan data CarouselItem yang ditemukan
        return view('admin.visitor.galeri.show', compact('galeri','detailgaleri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        $detailgaleri = DetailGaleri::where('galeri_id', $id)->get();

    
        // Kembalikan view 'carousel.show' dengan data CarouselItem yang ditemukan
        return view('admin.visitor.galeri.edit', compact('galeri','detailgaleri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'img_galeri.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ubah required menjadi opsional
        'judul' => 'required|string',
        'waktu' => 'required|date',
        'lokasi' => 'required|string',
    ]);

    $galeri = Galeri::findOrFail($id);
    $galeri->judul = $request->input('judul'); 
    $galeri->waktu = $request->input('waktu'); 
    $galeri->lokasi = $request->input('lokasi'); 
    $galeri->save();

    // Proses untuk setiap file img_galeri yang diunggah
    if ($request->hasFile('img_galeri')) {
        foreach ($request->file('img_galeri') as $index => $img_galeri) {
            if ($img_galeri->isValid()) {
                $slug = Str::slug(pathinfo($img_galeri->getClientOriginalName(), PATHINFO_FILENAME));
                $new_gambar = time() . '_' . $slug . '.' . $img_galeri->getClientOriginalExtension();

                // Pindahkan img_galeri ke direktori yang diinginkan
                $img_galeri->move('uploads/visitor/galeri/', $new_gambar);

                // Ambil detailgaleri yang sesuai dengan index
                if ($galeri->detailgaleri[$index]) {
                    $detailgaleri = $galeri->detailgaleri[$index];
                    $detailgaleri->img_galeri = 'uploads/visitor/galeri/' . $new_gambar;
                    $detailgaleri->save();
                }
            }
        }
    }

    // Proses untuk setiap file new_img_galeri yang diunggah
    if ($request->hasFile('new_img_galeri')) {
        foreach ($request->file('new_img_galeri') as $img_galeri) {
            if ($img_galeri->isValid()) {
                $slug = Str::slug(pathinfo($img_galeri->getClientOriginalName(), PATHINFO_FILENAME));
                $new_gambar = time() . '_' . $slug . '.' . $img_galeri->getClientOriginalExtension();

                // Pindahkan new_img_galeri ke direktori yang diinginkan
                $img_galeri->move('uploads/visitor/galeri/', $new_gambar);

                // Buat instance Detailgaleri dan simpan data terkait
                $detailgaleri = new DetailGaleri;
                $detailgaleri->galeri_id = $galeri->id;
                $detailgaleri->img_galeri = 'uploads/visitor/galeri/' . $new_gambar;
                $detailgaleri->save();
            }
        }
    }

    return redirect()->route('galeri.index')->with('success', 'Galeri updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        DetailGaleri::where('galeri_id', $id)->delete();

                // Kemudian hapus Raport
                $galeri = Galeri::findOrFail($id);
                $galeri->delete();
            
        return redirect()->route('galeri.index')->with('success', 'galeri deleted successfully.');

    }



    public function deleteImage($id)
{
    $detailgaleri = DetailGaleri::findOrFail($id);
    $detailgaleri->delete();

    return redirect()->back()->with('success', 'Gambar berhasil dihapus');
}

    
}
