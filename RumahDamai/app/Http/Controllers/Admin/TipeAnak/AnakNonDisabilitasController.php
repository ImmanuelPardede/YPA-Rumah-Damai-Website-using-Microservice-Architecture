<?php

namespace App\Http\Controllers\Admin\TipeAnak;

use App\Models\AnakDisabilitas;
use App\Models\AnakNonDisabilitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnakNonDisabilitasController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anakNonDisabilitasList = AnakNonDisabilitas::with('anak')->orderBy('jenis_anak_non_disabilitas', 'asc')->paginate(7);
        return view('admin.DataAnak.tipeAnak.anakNonDisabilitas.index', compact('anakNonDisabilitasList'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.DataAnak.tipeAnak.anakNonDisabilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_anak_non_disabilitas' => 'required|string',
        ]);

        AnakNonDisabilitas::create($request->all());

        return redirect()->route('anakNonDisabilitas.index')->with('success', 'Jenis Anak Non Disabilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $anakNonDisabilitas = AnakNonDisabilitas::find($id);
        return view('admin.DataAnak.tipeAnak.anakNonDisabilitas.show', compact('anakNonDisabilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisAnakNonDisabilitas = AnakNonDisabilitas::findOrFail($id);
        return view('admin.DataAnak.tipeAnak.anakNonDisabilitas.edit', compact('jenisAnakNonDisabilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_anak_non_disabilitas' => 'required|string',
        ]);

        $jenisAnakNonDisabilitas = AnakNonDisabilitas::find($id);
        $jenisAnakNonDisabilitas->update($request->all());

        return redirect()->route('anakNonDisabilitas.index')->with('success', 'Jenis Anak Non Disabilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $jenisAnakNonDisabilitas = AnakNonDisabilitas::findOrFail($id);
    //     $jenisAnakNonDisabilitas->delete();

    //     return redirect()->route('anakNonDisabilitas.index')->with('success', 'Jenis Anak Non Disabilitas berhasil dihapus.');
    // }
}
