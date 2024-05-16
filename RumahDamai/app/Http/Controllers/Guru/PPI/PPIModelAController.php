<?php

namespace App\Http\Controllers\Guru\PPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anak;
use App\Models\DetailPPIModelA;
use App\Models\PPI_Model_A;
use App\Models\Tujuan;
use App\Models\TujuanPanjang;

class PPIModelAController extends Controller
{
    public function index()
    {
        $anak = Anak::all();
        return view('guru.PPI.modelA.index', compact('anak'));
    }

    public function show($id)
    {
        $anak = Anak::all();
        $ppiA = PPI_Model_A::where('anak_id', $id)->get();
        return view('guru.PPI.modelA.show', compact('ppiA','anak'));
    }

    public function detail($id)
    {
        $ppiA = PPI_Model_A::findOrFail($id);
        $detailppiA = DetailPPIModelA::where('ppiA_id', $id)->get(); // Mendapatkan detail berdasarkan ppiA_id
        $tujuan = Tujuan::where('detailppiA_id', $id)->get();
            
        return view('guru.PPI.modelA.detail', compact('ppiA', 'detailppiA','tujuan'));
    }
    
    public function create()
    {
        $anak = Anak::all();
    
        return view('guru.PPI.modelA.create', compact('anak'));
    }
    
    

    public function store(Request $request)
    {  
        $request->validate([
            'anak_id' => 'required',
        ]);
    
        $ppiA = new PPI_Model_A;
        $ppiA->anak_id = $request->input('anak_id');
        $ppiA->save();

        $bina_diris = $request->input('bina_diri', []);
        $sosialisasi_dan_komunikasis = $request->input('sosialisasi_dan_komunikasi', []);
        $bekerjas = $request->input('bekerja', []);
        $akademiks = $request->input('akademik', []);
        $jangkas = $request->input('jangka', []);

        // Menentukan jumlah elemen yang akan diiterasi
        $count = max(count($bina_diris), count($sosialisasi_dan_komunikasis), count($bekerjas), count($akademiks),count($jangkas));

        for ($key = 0; $key < $count; $key++) {
            // Mendapatkan nilai default jika input tidak ada atau kosong
            $bina_diri_value = isset($bina_diris[$key]) ? $bina_diris[$key] : null;
            $sosialisasi_dan_komunikasi_value = isset($sosialisasi_dan_komunikasis[$key]) ? $sosialisasi_dan_komunikasis[$key] : null;
            $bekerja_value = isset($bekerjas[$key]) ? $bekerjas[$key] : null;
            $akademik_value = isset($akademiks[$key]) ? $akademiks[$key] : null;
            $jangka_value = isset($jangkas[$key]) ? $jangkas[$key] : null;

        $tujuanData = [
            'detailppiA_id' => $ppiA->id,
            'bina_diri' => $bina_diri_value,
            'sosialisasi_dan_komunikasi' => $sosialisasi_dan_komunikasi_value,
            'bekerja' => $bekerja_value,
            'akademik' => $akademik_value,
            'jangka' => $jangka_value,
        ];
        
    
        $tujuan = Tujuan::create($tujuanData); // Simpan Tujuan dan dapatkan objek $tujuan
        }
        
        $gambaran_sensorys = $request->input('gambaran_sensory', []);
        $data_medis = $request->input('data_medis', []);
        $hal_disukais = $request->input('hal_disukai', []);
        $kondisi_lains = $request->input('kondisi_lain', []);

        // Menentukan jumlah elemen yang akan diiterasi
        $count = max(count($gambaran_sensorys), count($data_medis), count($hal_disukais), count($kondisi_lains));

        for ($key = 0; $key < $count; $key++) {
        // Mendapatkan nilai default jika input tidak ada atau kosong
        $gambaran_sensory = isset($gambaran_sensorys[$key]) ? $gambaran_sensorys[$key] : null;
        $data_medis_value = isset($data_medis[$key]) ? $data_medis[$key] : null;
        $hal_disukai_value = isset($hal_disukais[$key]) ? $hal_disukais[$key] : null;
        $kondisi_lain_value = isset($kondisi_lains[$key]) ? $kondisi_lains[$key] : null;

        // Membuat data untuk disimpan
        $data2 = [
            'ppiA_id' => $ppiA->id,
            'tujuan_id' => $tujuan->id, // Gunakan ID tujuan yang baru dibuat
            'gambaran_sensory' => $gambaran_sensory,
            'data_medis' => $data_medis_value,
            'hal_disukai' => $hal_disukai_value,
            'kondisi_lain' => $kondisi_lain_value,
        ];

    // Membuat record DetailPPIModelA
        DetailPPIModelA::create($data2);
    }


    
        $anakId = $request->input('anak_id');
    
        return redirect()->route('PPI.ModelA.show', ['id' => $anakId])->with('success', 'PPI A created successfully.');
    
    }

    



}

