<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;

class PekerjaanController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaanList = Pekerjaan::orderBy('jenis_pekerjaan', 'asc')->paginate(7);
        return view('admin.masterdata.pekerjaan.index', compact('pekerjaanList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_pekerjaan' => 'required|string',
        ]);

        Pekerjaan::create($request->all());

        return redirect()->route('pekerjaan.index')->with('success', 'Jenis Pekerjaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $pekerjaan = Pekerjaan::find($id);
        return view('admin.masterdata.pekerjaan.show', compact('pekerjaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisPekerjaan = Pekerjaan::findOrFail($id);
        return view('admin.masterdata.pekerjaan.edit', compact('jenisPekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_pekerjaan' => 'required|string',
        ]);

        $jenisPekerjaan = Pekerjaan::find($id);
        $jenisPekerjaan->update($request->all());

        return redirect()->route('pekerjaan.index')->with('success', 'Jenis Pekerjaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisPekerjaan = Pekerjaan::findOrFail($id);
        $jenisPekerjaan->delete();

        return redirect()->route('pekerjaan.index')->with('success', 'Jenis Pekerjaan berhasil dihapus.');
    }
}
