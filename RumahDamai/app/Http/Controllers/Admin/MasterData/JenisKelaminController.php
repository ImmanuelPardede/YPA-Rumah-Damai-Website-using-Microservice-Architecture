<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisKelamin;
use Illuminate\Support\Facades\Http;


class JenisKelaminController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:2220/api/jenis_kelamin');

        if ($response->successful()) {
            $jenis_kelamin = $response->json();
            return view('admin.masterdata.jenisKelamin.index', compact('jenis_kelamin'));
        } else {
            return back()->with('error', 'Failed to fetch jenisKelamin from API.');
        }
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

        $data = [
            'jenis_kelamin' => $request->input('jenis_kelamin'), // Assuming 'agama' is the correct field name
            // 'image' => $imagePath ?? null, // Assuming the API accepts 'image'
        ];

        // Make the HTTP request
        $response = Http::post('http://localhost:2220/api/jenis_kelamin', $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.jenisKelamin.index')->with('success', 'Data jenis_kelamin berhasil ditambahkan.');
        } else {
            // jenis_kelamin creation failed
            return back()->withInput()->with('error', 'Failed to create jenis_kelamin. Please try again.');
        }
    }

    public function edit($id)
    {
        $response = Http::get("http://localhost:2220/api/jenis_kelamin/{$id}");
        $jenis_kelamin = $response->json();

        return view('admin.masterdata.jenisKelamin.edit', compact('jenis_kelamin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_kelamin' => 'required|string',
            // Add more validation rules for other fields if needed
        ]);

        // Prepare the data for the HTTP request
        $data = [
            'jenis_kelamin' => $request->input('jenis_kelamin'),
        ];

        // Make the HTTP request to update the Agama record
        $response = Http::put("http://localhost:2220/api/jenis_kelamin/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.jenisKelamin.index')->with('success', 'jenisKelamin updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update jenisKelamin. Please try again.');
        }
    }

    public function destroy($id)
    {
        $response = Http::delete("http://localhost:2220/api/jenis_kelamin/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.jenisKelamin.index')->with('success', 'jenisKelamin deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete jenisKelamin. Please try again.');
        }
    }
}
