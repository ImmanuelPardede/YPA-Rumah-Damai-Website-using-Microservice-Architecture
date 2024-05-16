<?php

namespace App\Http\Controllers\Admin\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousel = [];
        $serverError = false;
    
        try {
            $response = Http::get("http://localhost:9001/api/carousel");
    
            if ($response->successful()) {
                $carousel = $response->json();
            } else {
                $serverError = true;
            }
        } catch (\Exception $e) {
            $serverError = true;
        }
    
        return view('admin.visitor.carousel.index', compact('carousel', 'serverError'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Visitor.carousel.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validasi data yang diterima dari form
         $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);


        if ($request->hasFile('image')) {
            $gambar = $request->file('image');
            // Menggunakan Str::slug untuk membuat slug dari nama file
            $slug = Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME));
            // Membuat nama file unik dengan timestamp dan slug
            $new_gambar = time() . '_' . $slug . '.' . $gambar->getClientOriginalExtension();
            // Menyimpan gambar dengan nama file baru
            $imagePath = $gambar->storeAs('carousel', $new_gambar, 'public');
        }
        

        // Prepare the data for the HTTP request
        $data = [
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'image' => $imagePath ?? null, // Assuming the API accepts 'i'
        ];
    
    
        $response = Http::post('http://localhost:9001/api/carousel', $data);

    
        if ($response->successful()) {
            return redirect()->route('carousel.index')->with('success', 'promoted created successfully.');
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
    public function show($id)
    {
   /*      // Temukan CarouselItem berdasarkan ID
        $carouselItem = CarouselItem::findOrFail($id);
    
        // Kembalikan view 'carousel.show' dengan data CarouselItem yang ditemukan
        return view('admin.visitor.carousel.show', compact('carouselItem')); */
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = Http::get("http://localhost:9001/api/carousel/{$id}");
        $carousel = $response->json();
        return view('admin.Visitor.carousel.edit', compact('carousel'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);
    
        // Retrieve the existing carousel data
        $existingCarouselResponse = Http::get("http://localhost:9001/api/carousel/{$id}");
        $existingCarousel = $existingCarouselResponse->json();
    
        // Handle the image upload
        $imagePath = $existingCarousel['image'] ?? null;
        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
    
            // Upload the new image
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('carousel', $imageName, 'public');
        }
    
        // Prepare the data for the HTTP request
        $data = [
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'image' => $imagePath ?? $existingCarousel['image'], // Use the existing image path if no new image is uploaded
        ];
    
        // Send the updated data via HTTP request
        $response = Http::put("http://localhost:9001/api/carousel/{$id}", $data);
    
        // Check if the request was successful
        if ($response->successful()) {
            return redirect()->route('carousel.index')->with('success', 'Carousel updated successfully.');
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
            $existingcarouselResponse = Http::get("http://localhost:9001/api/carousel/{$id}");
            $existingcarousel = $existingcarouselResponse->json();

            // Get the image path from the existing carousel data
            $imagePath = $existingcarousel['image'] ?? null;

            // If the image path exists and the image file exists in storage, delete it
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Make the HTTP request to delete the carousel
            $response = Http::delete("http://localhost:9001/api/carousel/{$id}");

            if ($response->successful()) {
                return redirect()->route('carousel.index')->with('success', 'carousel deleted successfully.');
            } else {
                return back()->with('error', 'Failed to delete carousel. Please try again.');
            }
            }
    }
