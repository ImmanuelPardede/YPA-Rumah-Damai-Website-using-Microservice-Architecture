<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\LokasiTugas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LokasiTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasiList = LokasiTugas::orderBy('wilayah', 'asc')->paginate(7);
        return view('admin.masterdata.lokasiTugas.index', compact('lokasiList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.lokasiTugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => 'required|string',
            'wilayah' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        LokasiTugas::create($request->all());

        return redirect()->route('lokasiTugas.index')->with('success', 'Lokasi Tugas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    try {
        $lokasi = LokasiTugas::findOrFail($id);
        return view('admin.masterdata.lokasiTugas.show', compact('lokasi'));
    } catch (ModelNotFoundException $e) {
        abort(404);
    }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    try {
        $lokasiPenugasan = LokasiTugas::findOrFail($id);
        return view('admin.masterdata.lokasiTugas.edit', compact('lokasiPenugasan'));
    } catch (ModelNotFoundException $e) {
        abort(404);
    }
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'lokasi' => 'required|string',
        'wilayah' => 'required|string',
        'deskripsi' => 'required|string',
    ]);

    try {
        $lokasiPenugasan = LokasiTugas::findOrFail($id);
        $lokasiPenugasan->update($request->all());
        return redirect()->route('lokasiTugas.index')->with('success', 'Lokasi Tugas berhasil diperbarui.');
    } catch (ModelNotFoundException $e) {
        abort(404);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
{
    try {
        $lokasiPenugasan = LokasiTugas::findOrFail($id);
        $lokasiPenugasan->delete();
        return redirect()->route('lokasiTugas.index')->with('success', 'Lokasi Tugas berhasil dihapus.');
    } catch (ModelNotFoundException $e) {
        abort(404);
    }
}
}
