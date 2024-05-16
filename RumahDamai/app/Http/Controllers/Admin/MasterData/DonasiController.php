<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Support\Facades\Http;


class DonasiController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:4444/api/donasi');

        if ($response->successful()) {
            $donasi = $response->json();
            return view('admin.masterdata.donasi.index', compact('donasi'));
        } else {
            return back()->with('error', 'Failed to fetch donasi from API.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.donasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'donasi' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $data = [
            'donasi' => $request->input('donasi'),
            'deskripsi' => $request->input('deskripsi'),
        ];

        // Make the HTTP request
        $response = Http::post('http://localhost:4444/api/donasi', $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.donasi.index')->with('success', 'Data donasi berhasil ditambahkan.');
        } else {
            // donasi creation failed
            return back()->withInput()->with('error', 'Failed to create donasi. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get("http://localhost:4444/api/donasi/{$id}");

        if ($response->successful()) {
            $donasi = $response->json();
            return view('admin.masterdata.donasi.show', compact('donasi'));
        } else {
            return back()->with('error', 'Failed to fetch donasi from API.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get("http://localhost:4444/api/donasi/{$id}");
        $donasi = $response->json();

        return view('admin.masterdata.donasi.edit', compact('donasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'donasi' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // Prepare the data for the HTTP request
        $data = [
            'donasi' => $request->input('donasi'),
            'deskripsi' => $request->input('deskripsi'),

        ];

        // Make the HTTP request to update the donasi record
        $response = Http::put("http://localhost:4444/api/donasi/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.donasi.index')->with('success', 'donasi updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update donasi. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:4444/api/donasi/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.donasi.index')->with('success', 'donasi deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete donasi. Please try again.');
        }
    }
}
