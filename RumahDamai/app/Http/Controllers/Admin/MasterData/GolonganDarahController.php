<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\GolonganDarah;
use Illuminate\Http\Request;

class GolonganDarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golonganDarahList = GolonganDarah::orderBy('golongan_darah', 'asc')->paginate(7);
        return view('admin.masterdata.golonganDarah.index', compact('golonganDarahList'));

    }
    /**
     *
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.golonganDarah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'golongan_darah' => 'required|string',
        ]);

        GolonganDarah::create($request->all());

        return redirect()->route('golonganDarah.index')->with('success', 'Golongan Darah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $darah = GolonganDarah::find($id);
        return view('admin.masterdata.golonganDarah.show', compact('darah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $golonganDarah = GolonganDarah::findOrFail($id);
        return view('admin.masterdata.golonganDarah.edit', compact('golonganDarah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'golongan_darah' => 'required|string',
        ]);

        $golonganDarah = GolonganDarah::find($id);
        $golonganDarah->update($request->all());

        return redirect()->route('golonganDarah.index')->with('success', 'Golongan Darah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $golonganDarah = GolonganDarah::findOrFail($id);
        $golonganDarah->delete();

        return redirect()->route('golonganDarah.index')->with('success', 'Golongan Darah berhasil dihapus.');
    }
}
