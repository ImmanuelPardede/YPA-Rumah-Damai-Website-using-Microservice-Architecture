<?php

namespace App\Http\Controllers\Admin\Visitor;

use App\Http\Controllers\Controller;
use App\Models\FoundationHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            try {
                $response = Http::get("http://localhost:9002/api/history");
                $hitory = $response->json();
            } catch (\Exception $e) {
                $history = [];
            }
            return view('admin.visitor.history.index', compact('history'));
  
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Visitor.history.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi input form
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'sejarah' => 'required|string',
        'tujuan' => 'required|string',
        'dibangun' => 'required|string',
    ]);

    if ($request->hasFile('image')) {
        $gambar = $request->file('image');
        // Menggunakan Str::slug untuk membuat slug dari nama file
        $slug = Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME));
        // Membuat nama file unik dengan timestamp dan slug
        $new_gambar = time() . '_' . $slug . '.' . $gambar->getClientOriginalExtension();
        // Menyimpan gambar dengan nama file baru
        $imagePath = $gambar->storeAs('history', $new_gambar, 'public');
    }

    // Prepare the data for the HTTP request
    $data = [
        'sejarah' => $request->input('sejarah'),
        'tujuan' => $request->input('tujuan'),
        'dibangun' => $request->input('dibangun'),
        'image' => $imagePath ?? null, // Assuming the API accepts 'i'
    ];

    $response = Http::post('http://localhost:9002/api/history', $data);

    if ($response->successful()) {
        return redirect()->route('history.index')->with('success', 'promoted created successfully.');
    } else {
        // Delete the uploaded image if the request failed
        if (isset($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        return back()->withInput()->with('error', 'Failed to create promoted. Please try again.');
    }
}

    /**
     * Display the specified resource.
     */
   /*  public function show(string $id)
    {
        $history = FoundationHistory::find($id);

        return view('admin.visitor.history.show', compact('history'));

    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::get("http://localhost:9002/api/history/{$id}");
        $history = $response->json();
        return view('admin.Visitor.history.edit', compact('history'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sejarah' => 'required|string',
            'tujuan' => 'required|string',
            'dibangun' => 'required|string',
        ]);
    
        $history = FoundationHistory::find($id);
    
        $existingHistoryResponse = Http::get("http://localhost:9002/api/history/{$id}");
        $existingHistory = $existingHistoryResponse->json();
    
    
        // Update gambar jika ada perubahan
        $imagePath = $existingHistory['image'] ?? null;
        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
    
            // Upload the new image
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('history', $imageName, 'public');
        }

        $data = [
            'sejarah' => $request->input('sejarah'),
            'tujuan' => $request->input('tujuan'),
            'dibangun' => $request->input('dibangun'),
            'image' => $imagePath ?? $existingHistory['image'], // Assuming the API accepts 'i'
        ];

        // Send the updated data via HTTP request
        $response = Http::put("http://localhost:9002/api/history/{$id}", $data);
    
        if ($response->successful()) {
            return redirect()->route('history.index')->with('success', 'Carousel updated successfully.');
        } else {
            // If the request failed, delete the uploaded image
            if ($request->hasFile('image') && $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            return back()->withInput()->with('error', 'Failed to update carousel. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         // Retrieve the existing promoted to get the image path
         $existinghistoryResponse = Http::get("http://localhost:9002/api/history/{$id}");
         $existinghistory = $existinghistoryResponse->json();

         // Get the image path from the existing history data
         $imagePath = $existinghistory['image'] ?? null;

         // If the image path exists and the image file exists in storage, delete it
         if ($imagePath && Storage::disk('public')->exists($imagePath)) {
             Storage::disk('public')->delete($imagePath);
         }

         // Make the HTTP request to delete the history
         $response = Http::delete("http://localhost:9002/api/history/{$id}");

         if ($response->successful()) {
             return redirect()->route('history.index')->with('success', 'history deleted successfully.');
         } else {
             return back()->with('error', 'Failed to delete history. Please try again.');
         }
         }


        
}




