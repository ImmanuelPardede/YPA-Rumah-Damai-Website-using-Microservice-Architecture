<?php

namespace App\Http\Controllers\Admin\Pendidikan;

use App\Http\Controllers\Controller;
use App\Models\TahunKurikulum;
use Illuminate\Http\Request;

class TahunKurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunKurikulumList = TahunKurikulum::orderBy('tahun_kurikulum', 'asc')->paginate(7);
        return view('admin.pendidikan.tahunKurikulum.index', compact('tahunKurikulumList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pendidikan.tahunKurikulum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_kurikulum' => 'required|string',
        ]);

        TahunKurikulum::create([
            'tahun_kurikulum' => $request->tahun_kurikulum,
        ]);

        return redirect()->route('tahunKurikulum.index')->with('success', 'Tahun Kurikulum berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tahunKurikulum = TahunKurikulum::findOrFail($id);
        return view('admin.pendidikan.tahunKurikulum.show', compact('tahunKurikulum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tahunKurikulum = TahunKurikulum::findOrFail($id);
        return view('admin.pendidikan.tahunKurikulum.edit', compact('tahunKurikulum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_kurikulum' => 'required|string',
        ]);

        $tahunKurikulum = TahunKurikulum::findOrFail($id);
        $tahunKurikulum->update([
            'tahun_kurikulum' => $request->tahun_kurikulum,
        ]);

        return redirect()->route('tahunKurikulum.index')->with('success', 'Tahun Kurikulum berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tahunKurikulum = TahunKurikulum::findOrFail($id);
        $tahunKurikulum->delete();

        return redirect()->route('tahunKurikulum.index')->with('success', 'Tahun Kurikulum berhasil dihapus.');
    }
}
