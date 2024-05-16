<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agama;
use Illuminate\Support\Facades\Http;


class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:2222/api/agama');

        if ($response->successful()) {
            $agama = $response->json();
            return view('admin.masterdata.agama.index', compact('agama'));
        } else {
            return back()->with('error', 'Failed to fetch agama from API.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.agama.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'agama' => 'required|string',
        ]);

        $data = [
            'agama' => $request->input('agama'), // Assuming 'agama' is the correct field name
            // 'image' => $imagePath ?? null, // Assuming the API accepts 'image'
        ];

        // Make the HTTP request
        $response = Http::post('http://localhost:2222/api/agama', $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.agama.index')->with('success', 'Data agama berhasil ditambahkan.');
        } else {
            // Agama creation failed
            return back()->withInput()->with('error', 'Failed to create agama. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $agama = Agama::find($id);
        return view('admin.masterdata.agama.show', compact('agama'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get("http://localhost:2222/api/agama/{$id}");
        $agama = $response->json();

        return view('admin.masterdata.agama.edit', compact('agama'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'agama' => 'required|string',
            // Add more validation rules for other fields if needed
        ]);

        // Prepare the data for the HTTP request
        $data = [
            'agama' => $request->input('agama'),
        ];

        // Make the HTTP request to update the Agama record
        $response = Http::put("http://localhost:2222/api/agama/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.agama.index')->with('success', 'Agama updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update Agama. Please try again.');
        }
    }


    public function destroy($id)
    {
        // Make the HTTP request to delete the brand
        $response = Http::delete("http://localhost:2222/api/agama/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.agama.index')->with('success', 'Brand deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete brand. Please try again.');
        }
    }
}
