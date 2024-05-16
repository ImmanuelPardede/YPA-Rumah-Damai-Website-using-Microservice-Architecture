<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Support\Facades\Http;


class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:5550/api/jenis_penyakit');

        if ($response->successful()) {
            $jenis_penyakit = $response->json();
            return view('admin.masterdata.penyakit.index', compact('jenis_penyakit'));
        } else {
            return back()->with('error', 'Failed to fetch penyakit from API.');
        }

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
            'deskripsi' => 'required|string',
        ]);

        $data = [
            'jenis_penyakit' => $request->input('jenis_penyakit'),
            'deskripsi' => $request->input('deskripsi'),
        ];

        // Make the HTTP request
        $response = Http::post('http://localhost:5550/api/jenis_penyakit', $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.penyakit.index')->with('success', 'Data penyakit berhasil ditambahkan.');
        } else {
            // penyakit creation failed
            return back()->withInput()->with('error', 'Failed to create penyakit. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get("http://localhost:5550/api/jenis_penyakit/{$id}");

        if ($response->successful()) {
            $jenis_penyakit = $response->json();
            return view('admin.masterdata.penyakit.show', compact('jenis_penyakit'));
        } else {
            return back()->with('error', 'Failed to fetch penyakit from API.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get("http://localhost:5550/api/jenis_penyakit/{$id}");
        $jenis_penyakit = $response->json();

        return view('admin.masterdata.penyakit.edit', compact('jenis_penyakit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_penyakit' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // Prepare the data for the HTTP request
        $data = [
            'jenis_penyakit' => $request->input('jenis_penyakit'),
            'deskripsi' => $request->input('deskripsi'),

        ];

        // Make the HTTP request to update the penyakit record
        $response = Http::put("http://localhost:5550/api/jenis_penyakit/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.penyakit.index')->with('success', 'penyakit updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update penyakit. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:5550/api/jenis_penyakit/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.penyakit.index')->with('success', 'penyakit deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete penyakit. Please try again.');
        }
    }
}
