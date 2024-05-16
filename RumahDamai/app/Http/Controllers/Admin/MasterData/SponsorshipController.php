<?php

namespace App\Http\Controllers\Admin\MasterData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sponsorship;


class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorshipList = Sponsorship::orderBy('jenis_sponsorship', 'asc')->paginate(7);
        return view('admin.masterdata.sponsorship.index', compact('sponsorshipList'));

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
        ]);

        Sponsorship::create($request->all());

        return redirect()->route('sponsorship.index')->with('success', 'Jenis Sponsorship berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $sponsorship = Sponsorship::find($id);
        return view('admin.masterdata.sponsorship.show', compact('sponsorship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisSponsorship = Sponsorship::findOrFail($id);
        return view('admin.masterdata.sponsorship.edit', compact('jenisSponsorship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jenis_sponsorship' => 'required|string',
        ]);

        $jenisSponsorship = Sponsorship::find($id);
        $jenisSponsorship->update($request->all());

        return redirect()->route('sponsorship.index')->with('success', 'Jenis Sponsorship berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisSponsorship = Sponsorship::findOrFail($id);
        $jenisSponsorship->delete();

        return redirect()->route('sponsorship.index')->with('success', 'Jenis Sponsorship berhasil dihapus.');
    }
}
