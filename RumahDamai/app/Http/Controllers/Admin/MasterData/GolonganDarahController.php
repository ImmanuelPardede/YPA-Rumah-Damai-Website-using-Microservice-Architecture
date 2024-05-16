<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GolonganDarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://localhost:9999/api/golongan_darah');

        if ($response->successful()) {
            $golongan_darah = $response->json();
            return view('admin.masterdata.golonganDarah.index', compact('golongan_darah'));
        } else {
            return back()->with('error', 'Failed to fetch golongan_darah from API.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterdata.golonganDarah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'golongan_darah' => 'required|string',
        ]);

        $data = [
            'golongan_darah' => $request->input('golongan_darah'),
        ];

        $response = Http::post('http://localhost:9999/api/golongan_darah', $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.golonganDarah.index')->with('success', 'Data golongan_darah berhasil ditambahkan.');
        } else {
            return back()->withInput()->with('error', 'Failed to create golongan_darah. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $response = Http::get("http://localhost:9999/api/golongan_darah/{$id}");

        if ($response->successful()) {
            $golonganDarah = $response->json();
            return view('admin.masterdata.golonganDarah.show', compact('golonganDarah'));
        } else {
            return back()->with('error', 'Failed to fetch golongan_darah details from API.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = Http::get("http://localhost:9999/api/golongan_darah/{$id}");

        if ($response->successful()) {
            $golonganDarah = $response->json();
            return view('admin.masterdata.golonganDarah.edit', compact('golonganDarah'));
        } else {
            return back()->with('error', 'Failed to fetch golongan_darah for editing from API.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'golongan_darah' => 'required|string',
        ]);

        $data = [
            'golongan_darah' => $request->input('golongan_darah'),
        ];

        $response = Http::put("http://localhost:9999/api/golongan_darah/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.golonganDarah.index')->with('success', 'golonganDarah updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update golongan_darah. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = Http::delete("http://localhost:9999/api/golongan_darah/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin.masterdata.golonganDarah.index')->with('success', 'golonganDarah deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete golonganDarah. Please try again.');
        }
    }
}
