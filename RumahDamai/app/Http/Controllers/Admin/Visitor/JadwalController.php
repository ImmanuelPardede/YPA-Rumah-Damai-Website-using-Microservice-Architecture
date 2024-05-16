<?php

namespace App\Http\Controllers\Admin\Visitor;

use App\Http\Controllers\Controller;
use App\Models\MingguPembelajaran;
use App\Services\JadwalPembelajaranService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index(Request $request, JadwalPembelajaranService $jadwalPembelajaranService)
    {
        // Mendapatkan hari-hari dalam seminggu
        $weekDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        // Mendapatkan tanggal hari ini
        $today = Carbon::today();

        // Mendapatkan minggu pembelajaran aktif berdasarkan tanggal sekarang
        $activeWeek = MingguPembelajaran::where('tanggal_mulai', '<=', $today)
            ->where('tanggal_berakhir', '>=', $today)
            ->first();

        if (!$activeWeek) {
            // Jika tidak ada minggu pembelajaran aktif, tampilkan pesan atau lakukan tindakan lain
            return redirect()->back()->with('error', 'Tidak ada jadwal pembelajaran aktif untuk Anda.');
        }

        // Mendapatkan tanggal mulai dan tanggal berakhir minggu pembelajaran aktif
        $startOfWeek = $activeWeek->tanggal_mulai;
        $endOfWeek = $activeWeek->tanggal_berakhir;

        // Menghasilkan data kalender sesuai dengan minggu pembelajaran aktif
        $calendarData = $jadwalPembelajaranService->generateJadwalData($weekDays, $startOfWeek, $endOfWeek);

        return view('visitor.jadwal', compact('weekDays', 'calendarData'));
    }
}
