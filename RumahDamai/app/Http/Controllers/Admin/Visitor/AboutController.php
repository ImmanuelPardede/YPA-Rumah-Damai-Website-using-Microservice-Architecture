<?php

namespace App\Http\Controllers\Admin\Visitor;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all(); // Mengambil satu data Foundationabouts terbaru
    
        // Kembalikan view 'carousel.show' dengan data CarouselItem yang ditemukan
        return view('admin.visitor.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.visitor.about.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'img_yayasan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_wilayah1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_wilayah2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latar_belakang' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'wilayah1' => 'nullable|string',
            'wilayah2' => 'nullable|string',
        ]);
    
        // Proses pengunggahan gambar img_yayasan
        if ($request->hasFile('img_yayasan')) {
            $imgYayasan = $request->file('img_yayasan');
            $imgYayasanPath = $this->uploadImage($imgYayasan);
        }
    
        // Proses pengunggahan gambar img_wilayah1
        if ($request->hasFile('img_wilayah1')) {
            $imgWilayah1 = $request->file('img_wilayah1');
            $imgWilayah1Path = $this->uploadImage($imgWilayah1);
        }
    
        // Proses pengunggahan gambar img_wilayah2
        if ($request->hasFile('img_wilayah2')) {
            $imgWilayah2 = $request->file('img_wilayah2');
            $imgWilayah2Path = $this->uploadImage($imgWilayah2);
        }
    
        // Buat instance About dengan data yang disediakan
        $about = new About([
            'img_yayasan' => $imgYayasanPath ?? null,
            'img_wilayah1' => $imgWilayah1Path ?? null,
            'img_wilayah2' => $imgWilayah2Path ?? null,
            'latar_belakang' => $request->input('latar_belakang'),
            'visi' => $request->input('visi'),
            'misi' => $request->input('misi'),
            'wilayah1' => $request->input('wilayah1'),
            'wilayah2' => $request->input('wilayah2'),
        ]);
    
        // Simpan instance About ke dalam database
        $about->save();
    
        return redirect()->route('about.index')->with('success', 'About data created successfully.');
    }

    private function uploadImage($file)
{
    // Generate nama file yang unik
    $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

    // Pindahkan file ke direktori yang diinginkan (misalnya: public/uploads/about/)
    $filePath = $file->move('uploads/visitor/about/', $fileName);

    // Kembalikan path relatif file
    return 'uploads/visitor/about/' . $fileName;
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $abouts = About::find($id);
        return view('admin.visitor.about.show', compact('abouts'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $abouts = About::find($id);
    
        // Kembalikan view 'carousel.show' dengan data CarouselItem yang ditemukan
        return view('admin.visitor.about.edit', compact('abouts'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'img_yayasan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_wilayah1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img_wilayah2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'latar_belakang' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'wilayah1' => 'nullable|string',
            'wilayah2' => 'nullable|string',
        ]);

        $about = About::find($id);

    
        // Proses pengunggahan gambar img_yayasan
        if ($request->hasFile('img_yayasan')) {
            $imgYayasan = $request->file('img_yayasan');
            $imgYayasanPath = $this->uploadImage($imgYayasan);
           
            $about->img_yayasan = $imgYayasanPath;
        }
    
        // Proses pengunggahan gambar img_wilayah1
        if ($request->hasFile('img_wilayah1')) {
            $imgWilayah1 = $request->file('img_wilayah1');
            $imgWilayah1Path = $this->uploadImage($imgWilayah1);

            $about->img_wilayah1 = $imgWilayah1Path;
        }
    
        // Proses pengunggahan gambar img_wilayah2
        if ($request->hasFile('img_wilayah2')) {
            $imgWilayah2 = $request->file('img_wilayah2');
            $imgWilayah2Path = $this->uploadImage($imgWilayah2);

            $about->img_wilayah2 = $imgWilayah2Path;
        }
    
        // Update data About dengan data yang disediakan
        $about->latar_belakang = $request->input('latar_belakang');
        $about->visi = $request->input('visi');
        $about->misi = $request->input('misi');
        $about->wilayah1 = $request->input('wilayah1');
        $about->wilayah2 = $request->input('wilayah2');
    
        // Simpan instance About yang telah diupdate ke dalam database
        $about->save();
    
        return redirect()->route('about.index')->with('success', 'About data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $abouts = About::find($id);

        $abouts->delete();

        return redirect()->route('about.index')
        ->with('success', 'Carousel item deleted successfully.');
    }

   
}
