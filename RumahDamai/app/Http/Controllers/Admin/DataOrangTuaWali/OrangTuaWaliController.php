<?php

namespace App\Http\Controllers\Admin\DataOrangTuaWali;

use App\Http\Controllers\Controller;
use App\Models\OrangTuaWali;
use App\Models\Agama;
use App\Models\Anak;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class OrangTuaWaliController extends Controller
{
    public function index()
    {
        $orangtuawaliList = OrangTuaWali::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.OrangTuaWali.index', compact('orangtuawaliList'));
    }

    public function create()
    {
        $anak = Anak::all();
        $agama = Agama::all();
        $pekerjaan = Pekerjaan::all();
        $pendidikan = Pendidikan::all();
        return view('admin.OrangTuaWali.create', compact('anak', 'agama', 'pekerjaan', 'pendidikan'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'anak_id' => 'required',
            'agama_id' => 'nullable',
            'nama_ibu' => 'nullable|string',
            'nama_ayah' => 'nullable|string',
            'nik_ayah' => 'nullable|numeric',
            'nik_ibu' => 'nullable|numeric',
            'tanggal_lahir_ayah' => 'nullable|date',
            'tanggal_lahir_ibu' => 'nullable|date',
            'alamat_orangtua' => 'nullable|string',
            'pendidikan_ayah_id' => 'nullable|string',
            'pekerjaan_ayah_id' => 'nullable',
            'no_hp_ayah' => 'nullable|numeric',
            'pendidikan_ibu_id' => 'nullable|string',
            'pekerjaan_ibu_id' => 'nullable',
            'no_hp_ibu' => 'nullable|numeric',
            'nama_wali' => 'nullable|string',
            'alamat_wali' => 'nullable|string',
            'pekerjaan_wali_id' => 'nullable',
            'tanggal_lahir_wali' => 'nullable|date',
            'no_hp_wali' => 'nullable|numeric',
        ]);

        OrangTuaWali::create($validatedData);

        return redirect()->route('orangTuaWali.index')->with('success', 'Data Orang Tua/Wali berhasil ditambahkan.');
    }

    public function show($id)
    {
        $orangtuawali = OrangTuaWali::with('anak', 'agama')->find($id);
        return view('admin.OrangTuaWali.show', compact('orangtuawali'));
    }

    public function edit($id)
    {
        $anak = Anak::all();
        $agama = Agama::all();
        $orangtuawali = OrangTuaWali::find($id);
        $pekerjaan = Pekerjaan::all();
        $pendidikan = Pendidikan::all();
        return view('admin.OrangTuaWali.edit', compact('orangtuawali', 'anak', 'agama', 'pekerjaan','pendidikan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'anak_id' => 'required',
            'agama_id' => 'nullable',
            'nama_ibu' => 'nullable|string',
            'nama_ayah' => 'nullable|string',
            'nik_ayah' => 'nullable|numeric',
            'nik_ibu' => 'nullable|numeric',
            'tanggal_lahir_ayah' => 'nullable|date',
            'tanggal_lahir_ibu' => 'nullable|date',
            'alamat_orangtua' => 'nullable|string',
            'pendidikan_ayah_id' => 'nullable|string',
            'pekerjaan_ayah_id' => 'nullable',
            'no_hp_ayah' => 'nullable|numeric',
            'pendidikan_ibu_id' => 'nullable|string',
            'pekerjaan_ibu_id' => 'nullable',
            'no_hp_ibu' => 'nullable|numeric',
            'nama_wali' => 'nullable|string',
            'alamat_wali' => 'nullable|string',
            'pekerjaan_wali_id' => 'nullable',
            'tanggal_lahir_wali' => 'nullable|date',
            'no_hp_wali' => 'nullable|numeric',
        ]);

        $orangtuawali = OrangTuaWali::find($id);
        $orangtuawali->update($validatedData);

        return redirect()->route('orangTuaWali.index')->with('success', 'Data Orang Tua/Wali berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $orangtuawali = OrangTuaWali::find($id);
        $orangtuawali->delete();

        return redirect()->route('orangTuaWali.index')->with('success', 'Data Orang Tua/Wali berhasil dihapus.');
    }
}
