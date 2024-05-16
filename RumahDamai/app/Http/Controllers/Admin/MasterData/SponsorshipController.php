<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Http;



class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:6660/api/jenis_sponsorship');

        if ($response->successful()) {
            $jenis_sponsorship = $response->json();
            return view('admin.masterdata.sponsorship.index', compact('jenis_sponsorship'));
        } else {
            return back()->with('error', 'Failed to fetch sponsorship from API.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.sponsorship.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_sponsorship' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $data = [
            'jenis_sponsorship' => $request->input('jenis_sponsorship'),
            'deskripsi' => $request->input('deskripsi'),
        ];

        // Make the HTTP request
        $response = Http::post('http://localhost:6660/api/jenis_sponsorship', $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.sponsorship.index')->with('success', 'Data sponsorship berhasil ditambahkan.');
        } else {
            // sponsorship creation failed
            return back()->withInput()->with('error', 'Failed to create sponsorship. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get("http://localhost:6660/api/jenis_sponsorship/{$id}");

        if ($response->successful()) {
            $jenis_sponsorship = $response->json();
            return view('admin.masterdata.sponsorship.show', compact('jenis_sponsorship'));
        } else {
            return back()->with('error', 'Failed to fetch sponsorship from API.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $response = Http::get("http://localhost:6660/api/jenis_sponsorship/{$id}");
    $jenis_sponsorship = $response->json();

    return view('admin.masterdata.sponsorship.edit', compact('jenis_sponsorship'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_sponsorship' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // Prepare the data for the HTTP request
        $data = [
            'jenis_sponsorship' => $request->input('jenis_sponsorship'),
            'deskripsi' => $request->input('deskripsi'),

        ];

        // Make the HTTP request to update the sponsorship record
        $response = Http::put("http://localhost:6660/api/jenis_sponsorship/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.sponsorship.index')->with('success', 'sponsorship updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update sponsorship. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::delete("http://localhost:6660/api/jenis_sponsorship/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.sponsorship.index')->with('success', 'sponsorship deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete sponsorship. Please try again.');
        }
    }
}
