<?php

namespace App\Http\Controllers\Admin\Pendidikan;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:7770/api/tahun_ajaran');

        if ($response->successful()) {
            $tahun_ajaran = $response->json();
            return view('admin.pendidikan.tahunAjaran.index', compact('tahun_ajaran'));
        } else {
            return back()->with('error', 'Failed to fetch tahunAjaran from API.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pendidikan.tahunAjaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required|int',
        ]);

        $data = [
            'tahun_ajaran' => $request->input('tahun_ajaran'),
        ];

        // Make the HTTP request
        $response = Http::post('http://localhost:7770/api/tahun_ajaran', $data);

        if ($response->successful()) {
            return redirect()->route('admin.pendidikan.tahunAjaran.index')->with('success', 'Data tahunAjaran berhasil ditambahkan.');
        } else {
            // tahunAjaran creation failed
            return back()->withInput()->with('error', 'Failed to create tahunAjaran. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $response = Http::get("http://localhost:7770/api/tahun_ajaran/{$id}");

        if ($response->successful()) {
            $tahun_ajaran = $response->json();
            return view('admin.pendidikan.tahunAjaran.show', compact('tahun_ajaran'));
        } else {
            return back()->with('error', 'Failed to fetch tahunAjaran from API.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = Http::get("http://localhost:7770/api/tahun_ajaran/{$id}");
        $tahun_ajaran = $response->json();

        return view('admin.pendidikan.tahunAjaran.edit', compact('tahun_ajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_ajaran' => 'required|int',
        ]);

        // Prepare the data for the HTTP request
        $data = [
            'tahun_ajaran' => $request->input('tahun_ajaran'),
        ];

        // Make the HTTP request to update the tahunAjaran record
        $response = Http::put("http://localhost:7770/api/tahun_ajaran/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin.pendidikan.tahunAjaran.index')->with('success', 'tahunAjaran updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update tahunAjaran. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = Http::delete("http://localhost:7770/api/tahun_ajaran/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.pendidikan.tahunAjaran.index')->with('success', 'tahunAjaran deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete tahunAjaran. Please try again.');
        }
    }
}
