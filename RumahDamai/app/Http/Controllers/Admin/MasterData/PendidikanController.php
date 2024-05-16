<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendidikanList = Pendidikan::orderBy('tingkat_pendidikan', 'asc')->paginate(7);
        return view('admin.masterdata.pendidikan.index', compact('pendidikanList'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tingkat_pendidikan' => 'required|string',
        ]);

        Pendidikan::create($request->all());

        return redirect()->route('pendidikan.index')->with('success', 'Tingkat Pendidikan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $pendidikan = Pendidikan::find($id);
        return view('admin.masterdata.pendidikan.show', compact('pendidikan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tingkatPendidikan = Pendidikan::findOrFail($id);
        return view('admin.masterdata.pendidikan.edit', compact('tingkatPendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tingkat_pendidikan' => 'required|string',
        ]);

        $tingkatPendidikan = Pendidikan::find($id);
        $tingkatPendidikan->update($request->all());

        return redirect()->route('pendidikan.index')->with('success', 'Tingkat Pendidikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tingkatPendidikan = Pendidikan::findOrFail($id);
        $tingkatPendidikan->delete();

        return redirect()->route('pendidikan.index')->with('success', 'Tingkat Pendidikan berhasil dihapus.');
    }
}
