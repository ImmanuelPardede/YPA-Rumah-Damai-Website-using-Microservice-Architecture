<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Anak;
use App\Models\AnakDisabilitas;
use App\Models\AnakNonDisabilitas;
use App\Models\Berita;
use App\Models\CarouselItem;
use App\Models\DetailGaleri;
use App\Models\DetailProgram;
use App\Models\Fasilitas;
use App\Models\FoundationHistory;
use App\Models\Galeri;
use App\Models\KategoriBerita;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class VisitorsController extends Controller
{

       

    public function home()
    {
        $carousel = [];
        $history = [];
        $category = [];
        $berita = [];

        $carouselError = false;
        $historyError = false;
        $categoryError = false;
        $newsError = false;
        
        // Fetch carousel data
    try {
        $response = Http::get("http://localhost:9001/api/carousel");
        if ($response->successful()) {
            $carousel = $response->json();
        } else {
            $carouselError = true;
        }
    } catch (\Exception $e) {
        $carouselError = true;
    }

    // Fetch history data
    try {
        $response = Http::get('http://localhost:9002/api/history');
        if ($response->successful()) {
            $history = $response->json();
        } else {
            $historyError = true;
        }
    } catch (\Exception $e) {
        $historyError = true;
    }

    // Fetch category data
    try {
        $response = Http::get("http://localhost:9003/api/category");
        if ($response->successful()) {
            $category = $response->json();
        } else {
            $categoryError = true;
        }
    } catch (\Exception $e) {
        $categoryError = true;
    }

    // Fetch news data
    try {
        $response = Http::get("http://localhost:9004/api/news");
        if ($response->successful()) {
            $berita = $response->json();
        } else {
            $newsError = true;
        }
    } catch (\Exception $e) {
        $newsError = true;
    }

        $totalProgram = DetailProgram::count();
        $kategori = KategoriBerita::all();
        $anaktepi = AnakDisabilitas::count();
        $anakdisabilitas = AnakNonDisabilitas::count();
        return view('visitor.home', compact('carousel', 'history', 'berita', 'totalProgram', 'category', 'anaktepi', 'anakdisabilitas', 'newsError', 'carouselError', 'historyError','categoryError'));
    }

    public function aboutUs()
    {
        $abouts = About::all();
        return view('visitor.about', compact('abouts'));
    }

    public function programrm()
    {
        $programs = Program::all();
        $detailPrograms = DetailProgram::all();
        $totalProgram = DetailProgram::count();
        return view('visitor.program', compact('programs', 'detailPrograms', 'totalProgram'));
    }

    public function fasilitasi()
    {
        $fasilitas = Fasilitas::all();
        $detailfasilitas = Fasilitas::all();
        return view('visitor.fasilitas', compact('fasilitas', 'detailfasilitas'));
    }

    public function news()
    {
        $category = [];
        $berita = [];

        $categoryError = false;
        $newsError = false;


        try {
            $response = Http::get("http://localhost:9003/api/category");
            if ($response->successful()) {
                $category = $response->json();
            } else {
                $categoryError = true;
            }
        } catch (\Exception $e) {
            $categoryError = true;
        }

        try {
            $response = Http::get("http://localhost:9004/api/news");
            if ($response->successful()) {
                $berita = $response->json();
            } else {
                $beritaError = true;
            }
        } catch (\Exception $e) {
            $beritaError = true;
        }


        return view('visitor.berita', compact('berita', 'category', 'categoryError', 'newsError'));
    }

    public function show($id)
    {

        $category = [];
        $berita = [];
        $recentNews = [];
       
        $categoryError = false;
        $newsError = false;
        $recentNewsError = false;


        try {
            $response = Http::get("http://localhost:9003/api/category");
            $category = $response->json();
        } catch (\Exception $e) {
            $category = [];
        }

        try {
            $response = Http::get("http://localhost:9004/api/news/{$id}");
            if ($response->successful()) {
                $berita = $response->json();
            } else {
                $beritaError = true;
            }
        } catch (\Exception $e) {
            $beritaError = true;
        }


        try {
            $response = Http::get("http://localhost:9004/api/news");
            if ($response->successful()) {
                $recentNews = $response->json();
            } else {
                $recentNewsError = true;
            }
        } catch (\Exception $e) {
            $recentNewsError = true;
        }


        // Mengirim data berita dan recent news ke halaman detail berita
        return view('visitor.detailberita', compact('berita', 'recentNews', 'category', 'categoryError', 'newsError', 'recentNewsError'));
    }


    public function gallery()
    {
        $galeri = Galeri::all();
        $detailgaleriCounts = DetailGaleri::groupBy('galeri_id')->pluck(DB::raw('count(*) as total'), 'galeri_id');
        return view('visitor.galeri', compact('galeri', 'detailgaleriCounts'));
    }

    public function detailgallery($id)
    {
        $galeri = Galeri::find($id);
        $detailgaleriCounts = DetailGaleri::groupBy('galeri_id')->pluck(DB::raw('count(*) as total'), 'galeri_id');
        return view('visitor.detailgaleri', compact('galeri', 'detailgaleriCounts'));
    }




    public function contact()
    {
        return view('visitor.contact');
    }
}
