<?php

namespace App\Http\Controllers\Guru\Raport;

use App\Http\Controllers\Controller;
use App\Models\Raport;
use App\Models\Anak;
use App\Models\DetailRaport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB; // Tambahkan ini di atas class controller Anda


class RaportController extends Controller
{
    public function index()
    {
        $anak = Anak::all();
        return view('guru.raport.index', compact('anak'));
    }

    public function show($id)
    {
        $anak = Anak::all();
        $raports = Raport::where('anak_id', $id)->get();
        return view('guru.raport.show', compact('raports','anak'));
    }

    public function create()
    {
        $anak = Anak::all();
        return view('guru.raport.create', compact('anak'));    }

        public function detail($id)
        {
            $raport = Raport::findOrFail($id);
            $detailraports = DetailRaport::where('raport_id', $id)->get(); // Pastikan variabel ini terdefinisi
            return view('guru.raport.detail', compact('raport', 'detailraports'));
        }
        
        
    public function store(Request $request)
{  
    $request->validate([
        'anak_id' => 'required',
        'periode_awal' => 'required',
        'periode_akhir' => 'required',
        'tahun' => 'required',
        'area' => 'required',
        'kemampuan' => 'required',
        'kelas_kemampuan' => 'required',
        'naratif' => 'required',
    ]);

    $periode_bulan = $request->input('periode_awal') . ' - ' . $request->input('periode_akhir');

    $raport = new Raport;
    $raport->anak_id = $request->input('anak_id');
    $raport->periode_bulan = $periode_bulan;
    $raport->tahun = $request->input('tahun'); 
    $raport->save();

    $areas = $request->input('area');
    $kemampuans = $request->input('kemampuan');
    $kelas_kemampuans = $request->input('kelas_kemampuan');
    $naratifs = $request->input('naratif');

    foreach ($areas as $key => $area) {
        $data2 = [
            'raport_id' => $raport->id,
            'area' => $area,
            'kemampuan' => $kemampuans[$key],
            'kelas_kemampuan' => $kelas_kemampuans[$key],
            'naratif' => $naratifs[$key],
        ];

        DetailRaport::create($data2);
    }

    $anakId = $request->input('anak_id');

return redirect()->route('raport.show', ['id' => $anakId])->with('success', 'Raport created successfully.');

}

    

public function edit($id)
{
    $anak = Anak::all();
    $raport = Raport::findOrFail($id);
    $periode_bulan = explode(' - ', $raport->periode_bulan);
    $periode_awal = $periode_bulan[0];
    $periode_akhir = $periode_bulan[1];
    $detailraports = DetailRaport::where('raport_id', $id)->get(); // Mendapatkan detail raport berdasarkan ID raport
    return view('guru.raport.edit', compact('raport', 'anak', 'periode_awal', 'periode_akhir', 'detailraports'));
}


    public function update(Request $request, $id)
{  
    $request->validate([
        'anak_id' => 'required',
        'tahun' => 'required',
        'periode_awal' => 'required',
        'periode_akhir' => 'required',
        'area' => 'required',
        'kemampuan' => 'required',
        'kelas_kemampuan' => 'required',
        'naratif' => 'required',
    ]);
    
    // Gabungkan 'periode_awal' dan 'periode_akhir' menjadi 'periode_bulan'
    $periode_bulan = $request->input('periode_awal') . ' - ' . $request->input('periode_akhir');

    // Simpan data Raport
    $raport = Raport::findOrFail($id);
    $raport->anak_id = $request->input('anak_id');
    $raport->periode_bulan = $periode_bulan;
    $raport->save();

    // Hapus terlebih dahulu semua detailraports terkait
    DetailRaport::where('raport_id', $id)->delete();

    // Simpan data DetailRaport yang baru
    $areas = $request->input('area');
    $kemampuans = $request->input('kemampuan');
    $kelas_kemampuans = $request->input('kelas_kemampuan');
    $naratifs = $request->input('naratif');

    foreach ($areas as $key => $area) {
        $data = [
            'raport_id' => $raport->id,
            'area' => $area,
            'kemampuan' => $kemampuans[$key],
            'kelas_kemampuan' => $kelas_kemampuans[$key],
            'naratif' => $naratifs[$key],
        ];

        DetailRaport::create($data);
    }

    $raport = Raport::findOrFail($id);
    $anakId = $raport->anak_id;
    
    return redirect()->route('raport.show', ['id' => $anakId])->with('success', 'Raport updated successfully.');}


public function destroy($id)
{
    // Hapus terlebih dahulu semua detailraports terkait
    DetailRaport::where('raport_id', $id)->delete();

    // Kemudian hapus Raport
    $raport = Raport::findOrFail($id);
    $raport->delete();

    return redirect()->route('raport.index')->with('success', 'Raport deleted successfully.');
}


public function pdf($id)
{
    $raport = Raport::findOrFail($id);
    $anak = $raport->anak;
    $detailraports = DetailRaport::where('raport_id', $id)->get(); // Change variable name here
    $namaFile = 'raport_' . str_replace(' ', '_', $raport->anak->nama_lengkap) . '_' . str_replace(' ', '', $raport->periode_bulan) . '.pdf';
    $pdf = PDF::loadview('guru.raport.pdf', compact('raport', 'detailraports','anak'));
    return $pdf->download($namaFile);
    
}




    
    
}
