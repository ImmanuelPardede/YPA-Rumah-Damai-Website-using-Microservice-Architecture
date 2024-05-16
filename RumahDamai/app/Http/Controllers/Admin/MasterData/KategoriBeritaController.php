<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $response = Http::get('http://localhost:9003/api/category');
        $categories = $response->json();

        return view('admin.masterdata.kategoriBerita.index', compact('categories'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.kategoriBerita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255', // Contoh validasi untuk nama kategori
            // Tambahkan validasi untuk field lain jika ada
        ]);
    
        // Kirim data ke API untuk membuat kategori baru
        $response = Http::post('http://localhost:9003/api/category', [
            'name' => $request->input('name'),
            // Tambahkan field lain sesuai kebutuhan
        ]);

        if ($response->successful()) {
            // Jika sukses, redirect ke halaman daftar kategori dengan pesan sukses
            return redirect()->route('kategoriBerita.index')->with('success', 'Category created successfully.');
        } else {
            // Jika gagal, kembalikan ke halaman pembuatan kategori dengan pesan error
            return back()->withInput()->with('error', 'Failed to create category. Please try again.');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     /*    $kategoriList = KategoriBerita::find($id);
        return view('admin.masterdata.kategoriBerita.show', compact('kategoriList')); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get("http://localhost:9003/api/category/{$id}");
        $categories = $response->json();

        return view('admin.masterdata.kategoriBerita.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Contoh validasi untuk nama kategori
            // Tambahkan validasi untuk field lain jika ada
        ]);
    
        // Kirim data ke API untuk mengupdate kategori
        $response = Http::put("http://localhost:9003/api/category/{$id}", [
            'name' => $request->input('name'),
            // Tambahkan field lain sesuai kebutuhan
        ]);

         // Periksa jika respons dari API adalah sukses atau tidak
         if ($response->successful()) {
            // Jika sukses, redirect ke halaman daftar kategori dengan pesan sukses
            return redirect()->route('kategoriBerita.index')->with('success', 'Category updated successfully.');
        } else {
            // Jika gagal, kembalikan ke halaman pembuatan kategori dengan pesan error
            return back()->withInput()->with('error', 'Failed to update category. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:9003/api/category/{$id}");
    
        // Periksa jika respons dari API adalah sukses atau tidak
        if ($response->successful()) {
            // Jika sukses, redirect ke halaman daftar kategori dengan pesan sukses
            return redirect()->route('kategoriBerita.index')->with('success', 'Category deleted successfully.');
        } else {
            // Jika gagal, kembalikan ke halaman daftar kategori dengan pesan error
            return back()->with('error', 'Failed to delete category. Please try again.');
        }
    
    }
}
