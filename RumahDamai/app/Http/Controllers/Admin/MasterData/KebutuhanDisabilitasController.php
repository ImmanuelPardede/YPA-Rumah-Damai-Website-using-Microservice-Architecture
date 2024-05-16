<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\KebutuhanDisabilitas;
use Illuminate\Http\Request;

class KebutuhanDisabilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kebutuhanDisabilitasList = KebutuhanDisabilitas::orderBy('jenis_kebutuhan_disabilitas', 'asc')->paginate(7);
        return view('admin.masterdata.kebutuhanDisabilitas.index', compact('kebutuhanDisabilitasList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.kebutuhanDisabilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_kebutuhan_disabilitas' => 'required|string',
        ]);

        KebutuhanDisabilitas::create($request->all());

        return redirect()->route('kebutuhanDisabilitas.index')->with('success', 'Jenis Kebutuhan Disabilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $kebutuhanDisabilitas = KebutuhanDisabilitas::find($id);
        return view('admin.masterdata.kebutuhanDisabilitas.show', compact('kebutuhanDisabilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisKebutuhanDisabilitas = KebutuhanDisabilitas::findOrFail($id);
        return view('admin.masterdata.kebutuhanDisabilitas.edit', compact('jenisKebutuhanDisabilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_kebutuhan_disabilitas' => 'required|string',
        ]);

        $jenisKebutuhanDisabilitas = KebutuhanDisabilitas::find($id);
        $jenisKebutuhanDisabilitas->update($request->all());

        return redirect()->route('kebutuhanDisabilitas.index')->with('success', 'Jenis Kebutuhan Disabilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisKebutuhanDisabilitas = KebutuhanDisabilitas::findOrFail($id);
        $jenisKebutuhanDisabilitas->delete();

        return redirect()->route('kebutuhanDisabilitas.index')->with('success', 'Jenis Kebutuhan Disabilitas berhasil dihapus.');
    }
}
