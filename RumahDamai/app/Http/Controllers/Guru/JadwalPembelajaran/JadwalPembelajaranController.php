<?php

namespace App\Http\Controllers\Guru\JadwalPembelajaran;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\LokasiTugas;
use App\Models\MingguPembelajaran;
use App\Models\ModulMateri;
use App\Models\JadwalPembelajaran;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class JadwalPembelajaranController extends Controller
{
    public function tambahJadwalPembelajaran(Request $request, ModulMateri $modulMateri)
    {
        $existingJadwal = JadwalPembelajaran::where('modul_materi_id', $modulMateri->id)->first();

        if ($existingJadwal) {
            // Jika jadwal sudah ada, tampilkan form edit
            return $this->edit($existingJadwal->id);
        } else {
            // Jika tidak, tambahkan jadwal baru
            $jadwalPembelajaran = new JadwalPembelajaran();
            $jadwalPembelajaran->kelas_id = $modulMateri->kelas_id;
            $jadwalPembelajaran->minggu_pembelajaran_id = $modulMateri->minggu_pembelajaran_id;
            $jadwalPembelajaran->modul_materi_id = $modulMateri->id;
            $jadwalPembelajaran->user_id = Auth::id();
            $jadwalPembelajaran->lokasi_penugasan_id = Auth::user()->lokasi_penugasan_id; // Perbaikan disini
            $jadwalPembelajaran->save();

            return redirect()->route('guru.JadwalPembelajaran.index')->with('success', 'Jadwal pembelajaran berhasil ditambahkan.');
        }
    }


    public function index()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Ambil jadwal pembelajaran yang dibuat oleh pengguna itu sendiri
        $jadwalPembelajaran = JadwalPembelajaran::with(['modulMateri', 'modulMateri.mingguPembelajaran'])
            ->where('user_id', $userId) // Filter berdasarkan ID pengguna
            ->orderBy('created_at', 'asc')
            ->paginate(7);

        return view('guru.JadwalPembelajaran.index', compact('jadwalPembelajaran'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelas_id' => 'nullable',
            'minggu_pembelajaran_id' => 'nullable',
            'modul_materi_id' => 'nullable',
            'user_id' => 'nullable',
            'lokasi_penugasan_id' => 'nullable',
            'tanggal_pembelajaran' => 'nullable|date',
            'hari_pembelajaran' => 'nullable|string',
            'jam_mulai' => 'nullable|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i|after:jam_mulai',
        ]);

        JadwalPembelajaran::create($validatedData);

        return redirect()->route('jadwalPembelajaran.index')->with('success', 'Jadwal Pembelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwalPembelajaran = JadwalPembelajaran::findOrFail($id);
        $daftarMingguPembelajaran = MingguPembelajaran::all();
        $daftarKelas = Kelas::all();
        $daftarModulMateri = ModulMateri::all();
        $daftarGuru = User::all();
        $lokasiPenugasan = LokasiTugas::all();

        return view('guru.JadwalPembelajaran.edit', compact('jadwalPembelajaran', 'daftarKelas', 'daftarMingguPembelajaran', 'daftarModulMateri', 'daftarGuru', 'lokasiPenugasan'));
    }


    public function update(Request $request, $id)
    {
        $jadwalPembelajaran = JadwalPembelajaran::findOrFail($id);

        $validatedData = $request->validate([
            'kelas_id' => 'nullable',
            'minggu_pembelajaran_id' => 'nullable',
            'modul_materi_id' => 'nullable',
            'user_id' => 'nullable',
            'lokasi_penugasan_id' => 'nullable',
            'tanggal_pembelajaran' => 'nullable|date',
            'hari_pembelajaran' => 'nullable|string',
            'jam_mulai' => 'nullable|date_format:H:i',
            'jam_selesai' => 'nullable|date_format:H:i|after:jam_mulai',
        ]);

        // Tambahkan validasi untuk memeriksa apakah 'lokasi_penugasan_id' ada dalam data yang divalidasi
        if (!array_key_exists('lokasi_penugasan_id', $validatedData)) {
            $validatedData['lokasi_penugasan_id'] = $jadwalPembelajaran->lokasi_penugasan_id;
        }

        // Hapus validasi untuk jam_mulai dan jam_selesai jika keduanya tidak diisi
        if (!$request->filled('jam_mulai') && !$request->filled('jam_selesai')) {
            unset($validatedData['jam_mulai']);
            unset($validatedData['jam_selesai']);
        }

        $jadwalPembelajaran->update($validatedData);

        return redirect()->route('jadwalPembelajaran.index')->with('success', 'Jadwal Pembelajaran berhasil diperbarui.');
    }
}
