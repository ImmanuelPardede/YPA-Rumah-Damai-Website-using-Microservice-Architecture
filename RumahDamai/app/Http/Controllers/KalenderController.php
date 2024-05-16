<?php

namespace App\Http\Controllers;

use App\Models\MingguPembelajaran;
use App\Services\JadwalPembelajaranService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class KalenderController extends Controller
{
    public function index(Request $request, JadwalPembelajaranService $jadwalPembelajaranService)
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Ambil lokasi_penugasan_id dari pengguna yang login
        $lokasi_penugasan_id = Auth::user()->lokasi_penugasan_id;

        // Mendapatkan hari-hari dalam seminggu
        $weekDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        // Mendapatkan tanggal hari ini
        $today = Carbon::today();

        // Mendapatkan minggu pembelajaran aktif berdasarkan tanggal sekarang dan lokasi_penugasan_id guru yang login
        $activeWeek = MingguPembelajaran::where('tanggal_mulai', '<=', $today)
            ->where('tanggal_berakhir', '>=', $today)
            ->where('lokasi_penugasan_id', $lokasi_penugasan_id)
            ->first();

        if (!$activeWeek) {
            // Jika tidak ada minggu pembelajaran aktif untuk lokasi_penugasan_id guru yang login, tampilkan pesan atau lakukan tindakan lain
            return redirect()->back()->with('error', 'Tidak ada jadwal pembelajaran aktif untuk lokasi penugasan Anda.');
        }

        // Mendapatkan tanggal mulai dan tanggal berakhir minggu pembelajaran aktif
        $startOfWeek = $activeWeek->tanggal_mulai;
        $endOfWeek = $activeWeek->tanggal_berakhir;
        $lokasi_penugasan_id = Auth::user()->lokasi_penugasan_id;

        // Menghasilkan data kalender sesuai dengan minggu pembelajaran aktif
        $calendarData = $jadwalPembelajaranService->generateCalendarData($weekDays, $startOfWeek, $endOfWeek, $lokasi_penugasan_id);

        return view('guru.kalender.index', compact('weekDays', 'calendarData'));
    }
}
