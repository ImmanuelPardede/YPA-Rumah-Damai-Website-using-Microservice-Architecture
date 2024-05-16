<?php

namespace App\Http\Controllers\Guru\Materi;

use App\Models\JadwalPembelajaran;
use App\Models\Kelas;
use App\Models\MingguPembelajaran;
use App\Models\ModulMateri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Carbon\Carbon;



class ModulMateriController extends Controller
{
    public function index()
    {
        $guruId = Auth::id();

        $modulMateriList = ModulMateri::where('user_id', $guruId)
            ->with('mingguPembelajaran')
            ->orderBy('created_at', 'asc')
            ->paginate(7);

        $mingguPembelajaran = MingguPembelajaran::all(); // Ambil data minggu pembelajaran

        return view('guru.materi.modulMateri.index', compact('modulMateriList', 'mingguPembelajaran'));
    }



    public function create()
    {
        $kelas = Kelas::all();

        // Ubah cara load data MingguPembelajaran berdasarkan lokasi_penugasan_id
        $mingguPembelajaran = MingguPembelajaran::where('lokasi_penugasan_id', auth()->user()->lokasi_penugasan_id)->get();

        $tahun_kurikulum_id = null;

        if (request()->has('kelas_id')) {
            $selectedKelasId = request()->input('kelas_id');
            $selectedKelas = Kelas::find($selectedKelasId);

            if ($selectedKelas) {
                $tahun_kurikulum_id = $selectedKelas->tahun_kurikulum_id;
            }
        }

        return view('guru.materi.modulMateri.create', compact('kelas', 'mingguPembelajaran', 'tahun_kurikulum_id'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'nama_materi' => 'required|string',
            'deskripsi' => 'required|string',
            'minggu_pembelajaran_id' => 'required|exists:minggu_pembelajaran,id',
            'file_modul' => 'nullable|mimes:pdf,doc,docx', // Ubah validasi file
        ]);

        $userId = Auth::id();
        $userRole = Auth::user()->role;

        if ($userRole === 'guru') {
            $kelas = Kelas::findOrFail($request->kelas_id);
            $tahun_kurikulum_id = $kelas->tahun_kurikulum_id;

            $modulMateri = new ModulMateri([
                'kelas_id' => $request->kelas_id,
                'nama_materi' => $request->nama_materi,
                'deskripsi' => $request->deskripsi,
                'user_id' => $userId,
                'tahun_kurikulum_id' => $tahun_kurikulum_id,
                'minggu_pembelajaran_id' => $request->minggu_pembelajaran_id,
                'tanggal_publish' => now(),
            ]);

            if ($request->hasFile('file_modul')) {
                $file = $request->file('file_modul');
                $fileContent = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('documents', $fileContent, 'public');

                $modulMateri->file_modul = $fileContent; // Simpan nama file
            }

            $modulMateri->save();
            $this->tambahJadwalPembelajaran($modulMateri);

            return redirect()->route('modulMateri.index')->with('success', 'Modul Materi berhasil ditambahkan.');
        } else {
            return redirect()->route('modulMateri.index')->with('error', 'Anda tidak diizinkan membuat Modul Materi.');
        }
    }




    public function show(string $id)
    {
        $modulMateri = ModulMateri::with('kelas')->find($id); // Mengubah 'anak' menjadi 'kelas'
        return view('guru.materi.modulMateri.show', compact('modulMateri'));
    }

    public function edit(string $id)
    {
        $modulMateri = ModulMateri::findOrFail($id);
        $kelas = Kelas::all(); // Mengambil data kelas untuk dropdown

        // Ubah cara load data MingguPembelajaran berdasarkan lokasi_penugasan_id
        $mingguPembelajaran = MingguPembelajaran::where('lokasi_penugasan_id', auth()->user()->lokasi_penugasan_id)->get();

        return view('guru.materi.modulMateri.edit', compact('modulMateri', 'kelas', 'mingguPembelajaran'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'nama_materi' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $modulMateri = ModulMateri::findOrFail($id);

        // Mendapatkan tahun ajaran dari kelas yang dipilih
        $kelas = Kelas::findOrFail($request->kelas_id);
        $tahun_kurikulum_id = $kelas->tahun_kurikulum_id;

        // Memasukkan nilai 'tahun_kurikulum_id' ke dalam input
        $input = $request->all();
        $input['tahun_kurikulum_id'] = $tahun_kurikulum_id;

        $modulMateri->update($input);

        return redirect()->route('modulMateri.index')->with('success', 'Modul Materi berhasil diperbarui.');
    }


    public function destroy(string $id)
    {
        $modulMateri = ModulMateri::find($id); // Mengubah $modulmateri menjadi $modulMateri
        $modulMateri->delete();

        return redirect()->route('modulMateri.index')->with('success', 'Modul Materi berhasil dihapus.');
    }

    public function download(string $id)
    {
        $modulMateri = ModulMateri::find($id);

        if (!$modulMateri || !$modulMateri->file_modul) {
            return redirect()->back()->with('error', 'File Modul tidak ditemukan.');
        }

        $filePath = storage_path("app/public/documents/{$modulMateri->file_modul}");

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File Modul tidak ditemukan.');
        }

        return new BinaryFileResponse($filePath);
    }

    public function tambahJadwalPembelajaran(ModulMateri $modulMateri)
    {
        // Mendapatkan informasi pengguna yang membuat ModulMateri
        $user = Auth::user();
        $lokasi_penugasan_id = $user->lokasi_penugasan_id ?? null; // Ubah dari 'lokasiPenugasan->id' menjadi 'lokasi_penugasan_id'

        // Membuat objek JadwalPembelajaran dengan nilai lokasi_penugasan_id yang sesuai
        $jadwalPembelajaran = new JadwalPembelajaran([
            'kelas_id' => $modulMateri->kelas_id,
            'minggu_pembelajaran_id' => $modulMateri->minggu_pembelajaran_id,
            'modul_materi_id' => $modulMateri->id,
            'user_id' => $user->id,
            'lokasi_penugasan_id' => $lokasi_penugasan_id, // Menggunakan nilai lokasi_penugasan_id yang sesuai
        ]);

        // Menyimpan objek JadwalPembelajaran ke database
        $jadwalPembelajaran->save();
    }
}
