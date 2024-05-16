<?php

namespace App\Http\Controllers\Admin\Pendidikan;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjaranList = TahunAjaran::orderBy('tahun_ajaran', 'asc')->paginate(7);
        return view('admin.pendidikan.tahunAjaran.index', compact('tahunAjaranList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pendidikan.tahunAjaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string',
        ]);

        TahunAjaran::create([
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()->route('tahunAjaran.index')->with('success', 'Tahun Ajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);
        return view('admin.pendidikan.tahunAjaran.show', compact('tahunAjaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);
        return view('admin.pendidikan.tahunAjaran.edit', compact('tahunAjaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_ajaran' => 'required|string',
        ]);

        $tahunAjaran = TahunAjaran::findOrFail($id);
        $tahunAjaran->update([
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);

        return redirect()->route('tahunAjaran.index')->with('success', 'Tahun Ajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tahunAjaran = TahunAjaran::findOrFail($id);
        $tahunAjaran->delete();

        return redirect()->route('tahunAjaran.index')->with('success', 'Tahun Ajaran berhasil dihapus.');
    }
}
