<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Models\Disabilitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DisabilitasController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $disabilitasList = Disabilitas::orderBy('jenis_disabilitas', 'asc')->paginate(7);
        return view('admin.masterdata.disabilitas.index', compact('disabilitasList'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.disabilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_disabilitas' => 'required|string',
        ]);

        Disabilitas::create($request->all());

        return redirect()->route('disabilitas.index')->with('success', 'Jenis Disabilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $disabilitas = Disabilitas::find($id);
        return view('admin.masterdata.disabilitas.show', compact('disabilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisDisabilitas = Disabilitas::findOrFail($id);
        return view('admin.masterdata.disabilitas.edit', compact('jenisDisabilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_disabilitas' => 'required|string',
        ]);

        $jenisDisabilitas = Disabilitas::find($id);
        $jenisDisabilitas->update($request->all());

        return redirect()->route('disabilitas.index')->with('success', 'Jenis Disabilitas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisDisabilitas = Disabilitas::findOrFail($id);
        $jenisDisabilitas->delete();

        return redirect()->route('disabilitas.index')->with('success', 'Jenis Disabilitas berhasil dihapus.');
    }
}
