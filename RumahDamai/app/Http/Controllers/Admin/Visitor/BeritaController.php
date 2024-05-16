<?php

namespace App\Http\Controllers\Admin\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage; // Import the Storage facade


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try {

        $response = Http::get('http://localhost:9003/api/category');
        $categories = collect($response->json())->map(function ($category) {
            return [
                'id' => $category['ID'],
                'name' => $category['name'] // Menggunakan kunci 'name' dari respons JSON
            ];
        })->toArray();

    } catch (\Exception $e) {
        $categories = [];
    }
    

            try {
                $response = Http::get("http://localhost:9004/api/news");
                $berita = $response->json();
            } catch (\Exception $e) {
                $berita = [];
            }
            return view('admin.visitor.berita.index', compact('categories', 'berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Http::get('http://localhost:9003/api/category');
        $category = collect($response->json())->map(function ($category) {
            return [
                'id' => $category['ID'],
                'name' => $category['name']
            ];
        })->toArray();

        return view('admin.visitor.berita.create', compact('category'));

       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
    
        $category_id = (int) $request->input('category_id');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Get the sanitized brand name
            $brandName = preg_replace('/[^a-zA-Z0-9]/', '', $request->input('name'));
            // Generate a unique filename using brand name and timestamp
            $imageName = $brandName . '_' . time() . '.' . $image->getClientOriginalExtension();
            // Store the image with the generated filename
            $imagePath = $image->storeAs('news', $imageName, 'public');
        }

        // Prepare the data for the HTTP request
        $data = [
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'category_id' => $category_id,
            'image' => $imagePath ?? null,
        ];

        $response = Http::post('http://localhost:9004/api/news', $data);

        if ($response->successful()) {
            return redirect()->route('berita.index')->with('success', 'Product created successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to create product. Please try again.');
        }

        
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get('http://localhost:9003/api/category');
        $categories = collect($response->json())->map(function ($category) {
            return [
                'id' => $category['ID'],
                'name' => $category['name'] // Menggunakan kunci 'name' dari respons JSON
            ];
        })->toArray();

        $response = Http::get("http://localhost:9004/api/news/{$id}");
        if ($response->successful()) {
            $berita = $response->json();

            return view('admin.visitor.berita.show', compact('berita', 'categories'));
        } else {
            return back()->with('error', 'Failed to fetch products from API.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = Http::get('http://localhost:9003/api/category');
        $categories = collect($response->json())->map(function ($category) {
            return [
                'id' => $category['ID'],
                'name' => $category['name'] // Menggunakan kunci 'name' dari respons JSON
            ];
        })->toArray();
        
        $response = Http::get("http://localhost:9004/api/news/{$id}");
    
        if ($response->successful()) {
            $berita = $response->json();
            return view('admin.visitor.berita.edit', compact('berita', 'categories'));
        } else {
            return back()->with('error', 'Failed to fetch products from API.');
        }

        }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
    
 // Retrieve the existing product to get the current image path
 $existingNewsResponse = Http::get("http://localhost:9004/api/news/{$id}");
 $existingNews = $existingNewsResponse->json();


        // Temukan berita berdasarkan ID
       // Handle the image upload
    $imagePath = $existingNews['image'] ?? null;
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $image->storeAs('news', $imageName, 'public');
    }

    $category_id = (int) $request->input('category_id');

    // Prepare the data for the HTTP request
    $data = [
        'judul' => $request->input('judul'),
        'deskripsi' => $request->input('deskripsi'),
        'category_id' => $category_id,
        'image' => $request->hasFile('image') ? $imagePath : $existingNews['image'],
    ];

    $response = Http::put("http://localhost:9004/api/news/{$id}", $data);

    if ($response->successful()) {
        return redirect()->route('berita.index')->with('success', 'Product updated successfully.');
    } else {
        // Delete the uploaded image if the request failed
        if ($request->hasFile('image') && $imagePath) {
            Storage::disk('public')->delete($imagePath);
        }
        return back()->withInput()->with('error', 'Failed to update product. Please try again.');
    }

        
    }
    

    public function destroy($id)
    {
   // Retrieve the existing promoted to get the image path
   $existingnewsResponse = Http::get("http://localhost:9004/api/news/{$id}");
   $existingnews = $existingnewsResponse->json();

   // Get the image path from the existing news data
   $imagePath = $existingnews['image'] ?? null;

   // If the image path exists and the image file exists in storage, delete it
   if ($imagePath && Storage::disk('public')->exists($imagePath)) {
       Storage::disk('public')->delete($imagePath);
   }

   // Make the HTTP request to delete the news
   $response = Http::delete("http://localhost:9004/api/news/{$id}");

   if ($response->successful()) {
       return redirect()->route('berita.index')->with('success', 'news deleted successfully.');
   } else {
       return back()->with('error', 'Failed to delete news. Please try again.');
   }
   }
    
    
    }
