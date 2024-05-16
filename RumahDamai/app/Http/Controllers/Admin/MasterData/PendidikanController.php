<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\Http;


class PendidikanController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:4440/api/jenis_pendidikan');

        if ($response->successful()) {
            $jenis_pendidikan = $response->json();
            return view('admin.masterdata.pendidikan.index', compact('jenis_pendidikan'));
        } else {
            return back()->with('error', 'Failed to fetch pendidikan from API.');
        }
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
            'jenis_pendidikan' => 'required|string',
        ]);

        $data = [
            'jenis_pendidikan' => $request->input('jenis_pendidikan'), // Assuming 'pendidikan' is the correct field name
            // 'image' => $imagePath ?? null, // Assuming the API accepts 'image'
        ];

        // Make the HTTP request
        $response = Http::post('http://localhost:4440/api/jenis_pendidikan', $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.pendidikan.index')->with('success', 'Data pendidikan berhasil ditambahkan.');
        } else {
            // pendidikan creation failed
            return back()->withInput()->with('error', 'Failed to create pendidikan. Please try again.');
        }
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
        $response = Http::get("http://localhost:4440/api/jenis_pendidikan/{$id}");
        $jenis_pendidikan = $response->json();

        return view('admin.masterdata.pendidikan.edit', compact('jenis_pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_pendidikan' => 'required|string',
            // Add more validation rules for other fields if needed
        ]);

        // Prepare the data for the HTTP request
        $data = [
            'jenis_pendidikan' => $request->input('jenis_pendidikan'),
        ];

        // Make the HTTP request to update the pendidikan record
        $response = Http::put("http://localhost:4440/api/jenis_pendidikan/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.pendidikan.index')->with('success', 'pendidikan updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update pendidikan. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:4440/api/jenis_pendidikan/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.pendidikan.index')->with('success', 'pendidikan deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete pendidikan. Please try again.');
        }
    }
}
