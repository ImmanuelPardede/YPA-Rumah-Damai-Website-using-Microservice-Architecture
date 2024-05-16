<?php

namespace App\Http\Controllers\Admin\Visitor;

use App\Http\Controllers\Controller;
use App\Models\DetailFasilitas;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FasilitasController extends Controller
{

    public function index()
    {
        $fasilitas = Fasilitas::all();
        $detailfasilitas = DetailFasilitas::all();
        return view('admin.Visitor.fasilitas.index', compact('fasilitas','detailfasilitas'));

    }
    
    public function create()
    {
        return view('admin.Visitor.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        'img_fasilitas.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi setiap file img_fasilitas
        'fasilitas' => 'required|string',
    ]);

    // Buat instance Fasilitas dan simpan data fasilitas
    $fasilitas = new Fasilitas;
    $fasilitas->fasilitas = $request->input('fasilitas'); 
    $fasilitas->save();

    // Proses untuk setiap file img_fasilitas yang diunggah
    if ($request->hasFile('img_fasilitas')) {
        foreach ($request->file('img_fasilitas') as $img_fasilitas) {
            $slug = Str::slug(pathinfo($img_fasilitas->getClientOriginalName(), PATHINFO_FILENAME));
            $new_gambar = time() . '_' . $slug . '.' . $img_fasilitas->getClientOriginalExtension();
    
            // Pindahkan img_fasilitas ke direktori yang diinginkan
            $img_fasilitas->move('uploads/visitor/fasilitas/', $new_gambar);
    
            // Buat instance DetailFasilitas dan simpan data terkait
            $detailFasilitas = new DetailFasilitas;
            $detailFasilitas->fasilitas_id = $fasilitas->id;
            $detailFasilitas->img_fasilitas = 'uploads/visitor/fasilitas/' . $new_gambar;
            $detailFasilitas->save();
        }
    }

    return redirect()->route('fasilitas.index')->with('success', 'Fasilitas created successfully.');
}

    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Temukan CarouselItem berdasarkan ID
        $fasilitas = Fasilitas::findOrFail($id);
        $detailFasilitas = DetailFasilitas::where('fasilitas_id', $id)->get();

    
        // Kembalikan view 'carousel.show' dengan data CarouselItem yang ditemukan
        return view('admin.visitor.fasilitas.show', compact('fasilitas','detailFasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $detailFasilitas = DetailFasilitas::where('fasilitas_id', $id)->get();
        
        return view('admin.Visitor.fasilitas.edit', compact('fasilitas', 'detailFasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'img_fasilitas.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi setiap file img_fasilitas
        'fasilitas' => 'required|string',
    ]);

    $fasilitas = Fasilitas::findOrFail($id);
    $fasilitas->fasilitas = $request->input('fasilitas');
    $fasilitas->save();

    // Proses untuk setiap file img_fasilitas yang diunggah
    if ($request->hasFile('img_fasilitas')) {
        foreach ($request->file('img_fasilitas') as $index => $img_fasilitas) {
            $slug = Str::slug(pathinfo($img_fasilitas->getClientOriginalName(), PATHINFO_FILENAME));
            $new_gambar = time() . '_' . $slug . '.' . $img_fasilitas->getClientOriginalExtension();

            // Pindahkan img_fasilitas ke direktori yang diinginkan
            $img_fasilitas->move('uploads/visitor/fasilitas/', $new_gambar);

            // Ambil detailFasilitas yang sesuai dengan index
            if ($fasilitas->detailFasilitas[$index]) {
                $detailFasilitas = $fasilitas->detailFasilitas[$index];
                $detailFasilitas->img_fasilitas = 'uploads/visitor/fasilitas/' . $new_gambar;
                $detailFasilitas->save();
            }
        }
    }
        // Proses untuk setiap file new_img_galeri yang diunggah
        if ($request->hasFile('new_img_fasilitas')) {
            foreach ($request->file('new_img_fasilitas') as $img_fasilitas) {
                if ($img_fasilitas->isValid()) {
                    $slug = Str::slug(pathinfo($img_fasilitas->getClientOriginalName(), PATHINFO_FILENAME));
                    $new_gambar = time() . '_' . $slug . '.' . $img_fasilitas->getClientOriginalExtension();
    
                    // Pindahkan new_img_fasilitas ke direktori yang diinginkan
                    $img_fasilitas->move('uploads/visitor/fasilitas/', $new_gambar);
    
                    // Buat instance Detailfasilitas dan simpan data terkait
                    $detailfasilitas = new DetailFasilitas;
                    $detailfasilitas->fasilitas_id = $fasilitas->id;
                    $detailfasilitas->img_fasilitas = 'uploads/visitor/fasilitas/' . $new_gambar;
                    $detailfasilitas->save();
                }
            }
        }

    return redirect()->route('fasilitas.index')->with('success', 'Fasilitas updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DetailFasilitas::where('fasilitas_id', $id)->delete();

                // Kemudian hapus Raport
                $fasilitas = Fasilitas::findOrFail($id);
                $fasilitas->delete();
        
        return redirect()->route('fasilitas.index')->with('success', 'fasilitas deleted successfully.');

    }

    public function deleteImage($id)
    {
        $detailFasilitas = DetailFasilitas::findOrFail($id);
        $detailFasilitas->delete();
    
        return redirect()->back()->with('success', 'Gambar berhasil dihapus');
    }




}
