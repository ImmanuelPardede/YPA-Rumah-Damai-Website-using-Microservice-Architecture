<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penyakit;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyakitList = Penyakit::orderBy('jenis_penyakit', 'asc')->paginate(7);
        return view('admin.masterdata.penyakit.index', compact('penyakitList'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.penyakit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_penyakit' => 'required|string',
        ]);

        Penyakit::create($request->all());

        return redirect()->route('penyakit.index')->with('success', 'Jenis Penyakit berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $penyakit = Penyakit::find($id);
        return view('admin.masterdata.penyakit.show', compact('penyakit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisPenyakit = Penyakit::findOrFail($id);
        return view('admin.masterdata.penyakit.edit', compact('jenisPenyakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_penyakit' => 'required|string',
        ]);

        $jenisPenyakit = Penyakit::find($id);
        $jenisPenyakit->update($request->all());

        return redirect()->route('penyakit.index')->with('success', 'Jenis Penyakit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisPenyakit = Penyakit::findOrFail($id);
        $jenisPenyakit->delete();

        return redirect()->route('penyakit.index')->with('success', 'Jenis Penyakit berhasil dihapus.');
    }
}
