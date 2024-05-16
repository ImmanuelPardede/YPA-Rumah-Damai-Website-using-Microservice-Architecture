<?php

namespace App\Http\Controllers\Guru\Materi;

use App\Models\Kelas;
use App\Models\Silabus;
use App\Models\TahunKurikulum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SilabusController extends Controller
{
    public function index()
    {
        $silabusList = Silabus::orderBy('created_at', 'desc')->paginate(7);
        return view('guru.materi.silabus.index', compact('silabusList'));
    }

    public function create()
    {
        $tahunKurikulum = TahunKurikulum::all();
        $kelas = Kelas::all();
        $loggedInUserId = Auth::id();

        // Ambil data user yang sedang login (yang membuat silabus) dan memiliki role "guru"
        $users = User::where('role', 'guru')->where('id', $loggedInUserId)->get();

        if (request()->has('kelas_id')) {
            $selectedKelasId = request()->input('kelas_id');
            $selectedKelas = Kelas::find($selectedKelasId);

            if ($selectedKelas) {
                $tahun_kurikulum_id = $selectedKelas->tahun_kurikulum_id;
            }
        }

        return view('guru.materi.silabus.create', compact('kelas', 'tahunKurikulum', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'nama_silabus' => 'nullable|string',
            'deskripsi' => 'nullable|string',

            'hasil_kursus' => 'nullable|string',
            'tipe_pembelajaran' => 'nullable|string',
            'penilaian' => 'nullable|string',
            'konten_kursus' => 'nullable|string',
            'buku_pegangan_dan_referensi' => 'nullable|string',
            'alat' => 'nullable|string',
        ]);

        $loggedInUserId = Auth::id();

        $kelas = Kelas::findOrFail($request->kelas_id);
        $tahun_kurikulum_id = $kelas->tahun_kurikulum_id;

        $input = $request->all();
        $input['tanggal_publish'] = now();
        $input['tahun_kurikulum_id'] = $tahun_kurikulum_id;
        $input['user_id'] = $loggedInUserId;

        Silabus::create($input);

        return redirect()->route('silabus.index')->with('success', 'Silabus berhasil ditambahkan.');
    }


    public function show(string $id)
    {
        $silabus = Silabus::with('kelas')->find($id);
        return view('guru.materi.silabus.show', compact('silabus'));
    }

    public function edit(string $id)
    {
        $silabus = Silabus::findOrFail($id);
        $kelas = Kelas::all();
        $tahunKurikulum = TahunKurikulum::all();
        $loggedInUserId = Auth::id();

        return view('guru.materi.silabus.edit', compact('silabus', 'kelas', 'tahunKurikulum'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_silabus' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'hasil_kursus' => 'nullable|string',
            'tipe_pembelajaran' => 'nullable|string',
            'penilaian' => 'nullable|string',
            'konten_kursus' => 'nullable|string',
            'buku_pegangan_dan_referensi' => 'nullable|string',
            'alat' => 'nullable|string',
        ]);

        $silabus = Silabus::findOrFail($id);
        $kelas = Kelas::findOrFail($request->kelas_id);
        $tahun_kurikulum_id = $kelas->tahun_kurikulum_id;

        $input = $request->all();
        $input['tahun_kurikulum_id'] = $tahun_kurikulum_id;

        $silabus->update($input);

        return redirect()->route('silabus.index')->with('success', 'Silabus berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $silabus = Silabus::find($id);
        $silabus->delete();

        return redirect()->route('silabus.index')->with('success', 'Silabus berhasil dihapus.');
    }
}
