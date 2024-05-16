<?php

namespace App\Http\Controllers\Admin\Pendidikan;

use App\Http\Controllers\Controller;
use App\Models\SemesterTahunAjaran;
use Illuminate\Http\Request;

class SemesterTahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semesterTahunAjaranList = SemesterTahunAjaran::orderBy('semester_tahun_ajaran', 'asc')->paginate(7);
        return view('admin.pendidikan.semesterTahunAjaran.index', compact('semesterTahunAjaranList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pendidikan.semesterTahunAjaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'semester_tahun_ajaran' => 'required|string',
        ]);

        SemesterTahunAjaran::create([
            'semester_tahun_ajaran' => $request->semester_tahun_ajaran,
        ]);

        return redirect()->route('semesterTahunAjaran.index')->with('success', 'Semester Tahun Ajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $semesterTahunAjaran = SemesterTahunAjaran::findOrFail($id);
        return view('admin.pendidikan.semesterTahunAjaran.show', compact('semesterTahunAjaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $semesterTahunAjaran = SemesterTahunAjaran::findOrFail($id);
        return view('admin.pendidikan.semesterTahunAjaran.edit', compact('semesterTahunAjaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'semester_tahun_ajaran' => 'required|string',
        ]);

        $semesterTahunAjaran = SemesterTahunAjaran::findOrFail($id);
        $semesterTahunAjaran->update([
            'semester_tahun_ajaran' => $request->semester_tahun_ajaran,
        ]);

        return redirect()->route('semesterTahunAjaran.index')->with('success', 'Semester Tahun Ajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $semesterTahunAjaran = SemesterTahunAjaran::findOrFail($id);
        $semesterTahunAjaran->delete();

        return redirect()->route('semesterTahunAjaran.index')->with('success', 'Semester Tahun Ajaran berhasil dihapus.');
    }
}
