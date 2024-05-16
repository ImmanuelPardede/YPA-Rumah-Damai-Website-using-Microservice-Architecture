<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Models\Disabilitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class DisabilitasController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:1110/api/jenis_disabilitas');

        if ($response->successful()) {
            $jenis_disabilitas = $response->json();
            return view('admin.masterdata.disabilitas.index', compact('jenis_disabilitas'));
        } else {
            return back()->with('error', 'Failed to fetch jenis_disabilitas from API.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.disabilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_disabilitas' => 'required|string',
            'jenis_disabilitas' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $data = [
            'kategori_disabilitas' => $request->input('kategori_disabilitas'),
            'jenis_disabilitas' => $request->input('jenis_disabilitas'),
            'deskripsi' => $request->input('deskripsi'),
        ];

        // Make the HTTP request
        $response = Http::post('http://localhost:1110/api/jenis_disabilitas', $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.disabilitas.index')->with('success', 'Data disabilitas berhasil ditambahkan.');
        } else {
            // disabilitas creation failed
            return back()->withInput()->with('error', 'Failed to create disabilitas. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $response = Http::get("http://localhost:1110/api/jenis_disabilitas/{$id}");

        if ($response->successful()) {
            $jenis_disabilitas = $response->json();
            return view('admin.masterdata.disabilitas.show', compact('jenis_disabilitas'));
        } else {
            return back()->with('error', 'Failed to fetch disabilitas from API.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get("http://localhost:1110/api/jenis_disabilitas/{$id}");
        $jenis_disabilitas = $response->json();

        return view('admin.masterdata.disabilitas.edit', compact('jenis_disabilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kategori_disabilitas' => 'required|string',
            'jenis_disabilitas' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // Prepare the data for the HTTP request
        $data = [
            'kategori_disabilitas' => $request->input('kategori_disabilitas'),
            'jenis_disabilitas' => $request->input('jenis_disabilitas'),
            'deskripsi' => $request->input('deskripsi'),
        ];

        // Make the HTTP request to update the disabilitas record
        $response = Http::put("http://localhost:1110/api/jenis_disabilitas/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.disabilitas.index')->with('success', 'disabilitas updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update disabilitas. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:1110/api/jenis_disabilitas/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.disabilitas.index')->with('success', 'disabilitas deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete disabilitas. Please try again.');
        }
    }
}
