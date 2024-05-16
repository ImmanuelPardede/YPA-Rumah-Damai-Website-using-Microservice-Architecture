<?php

namespace App\Http\Controllers\Admin\DataAnak;

use App\Exports\ExportAnak;
use App\Http\Controllers\Controller;
use App\Models\AnakDisabilitas;
use App\Models\AnakNonDisabilitas;
use App\Models\Disabilitas;
use App\Models\NonDisabilitas;
use App\Models\KebutuhanDisabilitas;
use Illuminate\Http\Request;
use App\Models\LokasiTugas;
use App\Models\Anak;
use App\Models\Agama;
use App\Models\GolonganDarah;
use App\Models\JenisKelamin;
use App\Models\Penyakit;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Exception;



class AnakController extends Controller
{

    public function index()
    {
        try {
            // Mendapatkan data dari API agama
            $responseAgama = Http::get('http://localhost:2222/api/agama');
            $agama = collect($responseAgama->json())->map(function ($item) {
                return [
                    'id' => $item['ID'],
                    'agama' => $item['agama']
                ];
            })->toArray();
        } catch (\Exception $e) {
            $agama = [];
        }

        try {
            // Mendapatkan data dari API jenis kelamin
            $responseJenisKelamin = Http::get('http://localhost:2220/api/jenis_kelamin');
            $jenis_kelamin = collect($responseJenisKelamin->json())->map(function ($item) {
                return [
                    'id' => $item['ID'],
                    'jenis_kelamin' => $item['jenis_kelamin']
                ];
            })->toArray();
        } catch (\Exception $e) {
            $jenis_kelamin = [];
        }

        try {
            // Mendapatkan data dari API golongan darah
            $responseGolonganDarah = Http::get('http://localhost:9999/api/golongan_darah');
            $golongan_darah = collect($responseGolonganDarah->json())->map(function ($item) {
                return [
                    'id' => $item['ID'],
                    'golongan_darah' => $item['golongan_darah']
                ];
            })->toArray();
        } catch (\Exception $e) {
            $golongan_darah = [];
        }

        try {
            // Mendapatkan data dari API jenis disabilitas
            $responseJenisDisabilitas = Http::get('http://localhost:1110/api/jenis_disabilitas');
            $jenis_disabilitas = collect($responseJenisDisabilitas->json())->map(function ($item) {
                return [
                    'id' => $item['ID'],
                    'jenis_disabilitas' => $item['jenis_disabilitas']
                ];
            })->toArray();
        } catch (\Exception $e) {
            $jenis_disabilitas = [];
        }

        // Mendapatkan data anak dari database
        $anakList = Anak::orderBy('created_at', 'desc')->paginate(7);

        return view('admin.DataAnak.Anak.index', compact('anakList', 'agama', 'jenis_kelamin', 'golongan_darah', 'jenis_disabilitas'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Http::get('http://localhost:2222/api/agama');
        $agama = collect($response->json())->map(function ($agama) {
            return [
                'id' => $agama['ID'],
                'agama' => $agama['agama']
            ];
        })->toArray();

        $response = Http::get('http://localhost:2220/api/jenis_kelamin');
        $jenis_kelamin = collect($response->json())->map(function ($jenis_kelamin) {
            return [
                'id' => $jenis_kelamin['ID'],
                'jenis_kelamin' => $jenis_kelamin['jenis_kelamin']
            ];
        })->toArray();

        $response = Http::get('http://localhost:9999/api/golongan_darah');
        $golongan_darah = collect($response->json())->map(function ($golongan_darah) {
            return [
                'id' => $golongan_darah['ID'],
                'golongan_darah' => $golongan_darah['golongan_darah']
            ];
        })->toArray();

        $response = Http::get('http://localhost:1110/api/jenis_disabilitas');
        $jenis_disabilitas = collect($response->json())->map(function ($jenis_disabilitas) {
            return [
                'id' => $jenis_disabilitas['ID'],
                'jenis_disabilitas' => $jenis_disabilitas['jenis_disabilitas']
            ];
        })->toArray();

        $lokasiTugas = LokasiTugas::all();
        $penyakit = Penyakit::all();

        return view('admin.DataAnak.Anak.create', compact('agama', 'jenis_kelamin', 'golongan_darah', 'jenis_disabilitas', 'penyakit', 'lokasiTugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama_lengkap' => 'required|string',
            'agama_id' => 'required',
            'nia' => 'nullable',
            'jenis_kelamin_id' => 'required',
            'golongan_darah_id' => 'required',
            'lokasi_id' => 'required',
            'kebutuhan_disabilitas_id' => 'nullable',
            'penyakit_id' => 'nullable',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'disukai' => 'nullable|string',
            'tidak_disukai' => 'nullable|string',
            'alamat' => 'required|string',
            'kelebihan' => 'nullable|string',
            'kekurangan' => 'nullable|string',
            'tipe_anak' => 'required|in:disabilitas,non_disabilitas'
        ]);

        try {
            // Simpan data anak di Laravel
            $anak = Anak::create([
                'nama_lengkap' => $request->nama_lengkap,
                'penyakit_id' => $request->penyakit_id,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'disukai' => $request->disukai,
                'tidak_disukai' => $request->tidak_disukai,
                'alamat' => $request->alamat,
                'kelebihan' => $request->kelebihan,
                'kekurangan' => $request->kekurangan,
                'status' => 'aktif',
                'lokasi_id' => $request->lokasi_id,
                'tanggal_masuk' => now(),
                'tipe_anak' => $request->tipe_anak,
            ]);

            // Generate NIA
            $lokasi_id = str_pad($request->lokasi_id ?? 0, 1, '0', STR_PAD_LEFT);
            $tipe_anak = $request->tipe_anak == 'disabilitas' ? '01' : '02';
            $tahun_masuk = date('y');
            $tahun_lahir = substr(date('Y', strtotime($request->tanggal_lahir)), -2);
            $latest_anak = Anak::where('lokasi_id', $request->lokasi_id)
                ->where('tipe_anak', $request->tipe_anak)
                ->latest()
                ->first();
            $nomor_urut = $latest_anak ? ((int) substr($latest_anak->nia, -3)) + 1 : 1;
            $nia = $lokasi_id . $tipe_anak . $tahun_masuk . $tahun_lahir . str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
            $anak->nia = $nia;
            $anak->save();

            // Persiapan data yang akan dikirim ke backend Go
            $data = [
                'agama' => $request->input('agama'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'golongan_darah' => $request->input('golongan_darah'),
                'jenis_disabilitas' => $request->input('jenis_disabilitas'),
            ];

            // Kirim data ke backend Go untuk Agama
            $responseAgama = Http::post('http://localhost:2222/api/agama', $data);
            // Kirim data ke backend Go untuk Jenis Kelamin
            $responseJenisKelamin = Http::post('http://localhost:2220/api/jenis_kelamin', $data);
            // Kirim data ke backend Go untuk Golongan Darah
            $responseGolonganDarah = Http::post('http://localhost:9999/api/golongan_darah', $data);
            // Kirim data ke backend Go untuk Jenis Disabilitas
            $responseJenisDisabilitas = Http::post('http://localhost:1110/api/jenis_disabilitas', $data);

            if (
                $responseAgama->successful() && $responseJenisKelamin->successful() &&
                $responseGolonganDarah->successful() && $responseJenisDisabilitas->successful()
            ) {
                return redirect()->route('anak.index')->with('success', 'Data anak berhasil ditambahkan.');
            } else {
                // Penanganan jika gagal menyimpan data di backend Go
                return back()->withInput()->with('error', 'Failed to create anak. Please try again.');
            }
        } catch (Exception $e) {
            // Tangani exception jika terjadi kesalahan
            return back()->withInput()->with('error', 'An error occurred. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $anak = Anak::with('agama', 'jenisKelamin', 'golonganDarah', 'kebutuhanDisabilitas', 'penyakit', 'lokasiTugas')->find($id);
        $penyakit = $anak->penyakit;

        return view('admin.DataAnak.Anak.show', compact('anak', 'penyakit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agama = Agama::all();
        $jenisKelamin = JenisKelamin::all();
        $golonganDarah = GolonganDarah::all();
        $kebutuhanDisabilitas = KebutuhanDisabilitas::all();
        $penyakit = Penyakit::all();
        $anak = Anak::find($id);
        $lokasiTugas = LokasiTugas::all();

        // Periksa apakah data anak ditemukan
        if (!$anak) {
            return redirect()->route('anak.index')->with('error', 'Data anak tidak ditemukan.');
        }

        return view('admin.DataAnak.Anak.edit', compact('anak', 'agama', 'jenisKelamin', 'golonganDarah', 'kebutuhanDisabilitas', 'penyakit', 'lokasiTugas'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate([
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama_lengkap' => 'nullable|string',
            'agama_id' => 'nullable',
            'jenis_kelamin_id' => 'nullable',
            'golongan_darah_id' => 'nullable',
            'kebutuhan_disabilitas_id' => 'nullable',
            'penyakit_id' => 'nullable',
            'lokasi_id' => 'nullable',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'disukai' => 'nullable|string',
            'tidak_disukai' => 'nullable|string',
            'alamat' => 'nullable|string',
            'kelebihan' => 'nullable|string',
            'kekurangan' => 'nullable|string',
            'tipe_anak' => 'nullable|in:disabilitas,non_disabilitas'
        ]);
        $anak = Anak::find($id);

        if (!$anak) {
            return redirect()->route('anak.index')->with('error', 'Data anak tidak ditemukan.');
        }


        $data = $request->except('_token', '_method', 'foto_profil');


        if ($request->hasFile('foto_profil')) {
            $gambar = $request->file('foto_profil');
            $slug = Str::slug(pathinfo($gambar->getClientOriginalName(), PATHINFO_FILENAME));
            $new_gambar = time() . '_' . $slug . '.' . $gambar->getClientOriginalExtension();

            $gambar->move('uploads/anak', $new_gambar);

            if ($anak->foto_profil) {
                if (file_exists(public_path($anak->foto_profil))) {
                    unlink(public_path($anak->foto_profil));
                }
            }

            $data['foto_profil'] = 'uploads/anak/' . $new_gambar;
        }

        if ($request->filled('tipe_anak') && $anak->tipe_anak != $request->tipe_anak) {
            if ($anak->tipe_anak == 'disabilitas') {
                $anakDisabilitas = AnakDisabilitas::where('anak_id', $anak->id)->first();
                if ($anakDisabilitas) {
                    $anakDisabilitas->delete();
                }
            } elseif ($anak->tipe_anak == 'non_disabilitas') {
                $anakNonDisabilitas = AnakNonDisabilitas::where('anak_id', $anak->id)->first();
                if ($anakNonDisabilitas) {
                    $anakNonDisabilitas->delete();
                }
            }
            if ($request->tipe_anak == 'disabilitas') {
                AnakDisabilitas::updateOrCreate(
                    ['anak_id' => $anak->id],
                    ['nama_lengkap' => $anak->nama_lengkap, 'tipe_anak' => 'disabilitas']
                );
            } elseif ($request->tipe_anak == 'non_disabilitas') {
                AnakNonDisabilitas::updateOrCreate(
                    ['anak_id' => $anak->id],
                    ['nama_lengkap' => $anak->nama_lengkap, 'tipe_anak' => 'non_disabilitas']
                );
            }

            $anak->tipe_anak = $request->tipe_anak;
            $anak->save();
        }
        $anak->update($data);
        return redirect()->route('anak.index')->with('success', 'Data anak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anak = Anak::find($id);
        if ($anak) {
            if ($anak->foto_profil) {
                if (file_exists(public_path($anak->foto_profil))) {
                    unlink(public_path($anak->foto_profil));
                }
            }

            $anak->delete();
            return redirect()->route('anak.index')->with('success', 'Data anak berhasil dihapus.');
        } else {
            return redirect()->route('anak.index')->with('error', 'Anak tidak ditemukan.');
        }
    }

    public function nonaktifkan(string $id)
    {
        $anak = Anak::find($id);
        if ($anak) {
            $anak->tanggal_keluar = now();
            $anak->status = 'nonaktif';
            $anak->save();

            return redirect()->route('anak.index')->with('success', 'Anak berhasil dinonaktifkan.');
        } else {
            return redirect()->route('anak.index')->with('error', 'Anak tidak ditemukan.');
        }
    }

    public function aktifkan(string $id)
    {
        $anak = Anak::find($id);
        if ($anak) {
            $anak->tanggal_keluar = null;
            $anak->status = 'aktif';
            $anak->save();

            return redirect()->route('anak.index')->with('success', 'Anak berhasil diaktifkan kembali.');
        } else {
            return redirect()->route('anak.index')->with('error', 'Anak tidak ditemukan.');
        }
    }

    public function generatePDF($id)
    {
        $anak = Anak::findOrFail($id);

        // Load view content into a variable
        $pdfView = view('admin.DataAnak.anak.pdf', compact('anak'))->render();

        // Setup Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);

        // Instantiate Dompdf with options
        $dompdf = new Dompdf($options);

        // Load HTML content into Dompdf
        $dompdf->loadHtml($pdfView);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Create stream context to disable SSL verification
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ]);

        // Set stream context for Dompdf
        $dompdf->setHttpContext($context);

        // Render PDF (optional: save to file)
        $dompdf->render();

        // Get child's name for PDF filename
        $filename = 'anak_profile_' . str_replace(' ', '_', $anak->nama_lengkap) . '.pdf';

        // Output PDF to browser
        return $dompdf->stream($filename);
    }

    public function exportExcel()
    {
        return Excel::download(new ExportAnak, 'anak.xlsx');
    }
}
