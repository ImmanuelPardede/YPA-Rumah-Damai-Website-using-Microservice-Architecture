<?php

namespace App\Http\Controllers\Admin\TipeAnak;

use App\Models\AnakDisabilitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnakDisabilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anakDisabilitasList = AnakDisabilitas::with('anak')->orderBy('jenis_anak_disabilitas', 'asc')->paginate(7);
        return view('admin.DataAnak.tipeAnak.anakDisabilitas.index', compact('anakDisabilitasList'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.DataAnak.tipeAnak.anakDisabilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_anak_disabilitas' => 'required|string',
        ]);

        AnakDisabilitas::create($request->all());

        return redirect()->route('anakDisabilitas.index')->with('success', 'Jenis Anak Disabilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $anakDisabilitas = AnakDisabilitas::find($id);
        return view('admin.DataAnak.tipeAnak.anakDisabilitas.show', compact('anakDisabilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisAnakDisabilitas = AnakDisabilitas::findOrFail($id);
        return view('admin.DataAnak.tipeAnak.anakDisabilitas.edit', compact('jenisAnakDisabilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_anak_disabilitas' => 'required|string',
        ]);

        $jenisAnakDisabilitas = AnakDisabilitas::find($id);
        $jenisAnakDisabilitas->update($request->all());

        return redirect()->route('anakDisabilitas.index')->with('success', 'Jenis Anak Disabilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     $jenisAnakDisabilitas = AnakDisabilitas::findOrFail($id);
    //     $jenisAnakDisabilitas->delete();

    //     return redirect()->route('anakDisabilitas.index')->with('success', 'Jenis Anak Disabilitas berhasil dihapus.');
    // }
}
