<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Http;


class PekerjaanController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:3330/api/jenis_pekerjaan');

        if ($response->successful()) {
            $jenis_pekerjaan = $response->json();
            return view('admin.masterdata.pekerjaan.index', compact('jenis_pekerjaan'));
        } else {
            return back()->with('error', 'Failed to fetch pekerjaan from API.');
        }
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

        $data = [
            'jenis_pekerjaan' => $request->input('jenis_pekerjaan'), // Assuming 'pekerjaan' is the correct field name
            // 'image' => $imagePath ?? null, // Assuming the API accepts 'image'
        ];

        // Make the HTTP request
        $response = Http::post('http://localhost:3330/api/jenis_pekerjaan', $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.pekerjaan.index')->with('success', 'Data pekerjaan berhasil ditambahkan.');
        } else {
            // pekerjaan creation failed
            return back()->withInput()->with('error', 'Failed to create pekerjaan. Please try again.');
        }
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
        $response = Http::get("http://localhost:3330/api/jenis_pekerjaan/{$id}");
        $jenis_pekerjaan = $response->json();

        return view('admin.masterdata.pekerjaan.edit', compact('jenis_pekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_pekerjaan' => 'required|string',
            // Add more validation rules for other fields if needed
        ]);

        // Prepare the data for the HTTP request
        $data = [
            'jenis_pekerjaan' => $request->input('jenis_pekerjaan'),
        ];

        // Make the HTTP request to update the pekerjaan record
        $response = Http::put("http://localhost:3330/api/jenis_pekerjaan/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.pekerjaan.index')->with('success', 'pekerjaan updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update pekerjaan. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:3330/api/jenis_pekerjaan/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.pekerjaan.index')->with('success', 'pekerjaan deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete brapekerjaannd. Please try again.');
        }
    }
}
