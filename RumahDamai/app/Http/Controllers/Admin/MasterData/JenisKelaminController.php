<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisKelamin;

class JenisKelaminController extends Controller
{
    public function index()
    {
        $jenisKelaminList = JenisKelamin::orderBy('jenis_kelamin', 'asc')->paginate(7);
        return view('admin.masterdata.jenisKelamin.index', compact('jenisKelaminList'));
    }

    public function create()
    {
        return view('admin.masterdata.jenisKelamin.create');
    }

    public function show(string $id)
    {
        $kelamin = JenisKelamin::find($id);
        return view('admin.masterdata.jenisKelamin.show', compact('kelamin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kelamin' => 'required|string',
        ]);

        JenisKelamin::create($request->all());

        return redirect()->route('jenisKelamin.index')->with('success', 'Jenis kelamin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenisKelamin = JenisKelamin::findOrFail($id);
        return view('admin.masterdata.jenisKelamin.edit', compact('jenisKelamin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kelamin' => 'required|string',
        ]);

        $jenisKelamin = JenisKelamin::find($id);
        $jenisKelamin->update($request->all());

        return redirect()->route('jenisKelamin.index')->with('success', 'Jenis kelamin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenisKelamin = JenisKelamin::findOrFail($id);
        $jenisKelamin->delete();

        return redirect()->route('jenisKelamin.index')->with('success', 'Jenis kelamin berhasil dihapus.');
    }
}
