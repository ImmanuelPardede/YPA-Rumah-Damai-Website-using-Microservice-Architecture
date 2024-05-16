<?php

namespace App\Http\Controllers\Admin\Pengumuman;

use App\Notifications\PengumumanNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\LokasiTugas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class PengumumanController extends Controller
{
    public function index()
    {
        // Mengambil semua pengumuman dari model Pengumuman
        $pengumumans = Pengumuman::all();
        
        // Mengirimkan data pengumuman ke view 'dashboard'
        return view('dashboard', compact('pengumumans'));
    }
    public function create()
    {
        // Periksa apakah pengguna memiliki peran admin atau direktur
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'direktur') {
            return view('admin.pengumuman.create');
        } else {
            // Redirect atau tampilkan pesan kesalahan jika pengguna tidak memiliki akses
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki HAK untuk membuat pengumuman !.');
        }
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        $pengumuman = Pengumuman::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'user_id' => Auth::id(),
        ]);
    

            $users = User::where('role', '!=', 'admin')->get();

            // Send notification to each user
            foreach ($users as $user) {
                $user->notify(new PengumumanNotification($pengumuman));
            }
        

              return redirect()->route('dashboard')->with('success', 'Pengumuman berhasil ditambahkan.');

    }

    public function show($id)
    {
        
        $user = User::all();
        $lokasi = LokasiTugas::all();
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.show', compact('pengumuman','user','lokasi'));
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);

        $pengumuman->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('dashboard')->with('success', 'Pengumuman berhasil dihapus.');
    }


    public function markAsRead()
{
    Auth::user()->unreadNotifications->markAsRead();
    return response()->json(['success' => true]);
}


}
