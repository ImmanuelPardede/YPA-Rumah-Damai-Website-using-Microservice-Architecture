<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use App\Models\Anak;
use Illuminate\Http\Request;

class ChartAnakController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function chartDataAnak()
    {
        $currentYear = date('Y');
        $chartData = [
            'data' => [['Bulan', 'Aktif', 'Tidak Aktif']],
            'title' => 'Data Anak ' . $currentYear,
        ];

        for ($month = 1; $month <= 12; $month++) {
            $aktif = Anak::whereYear('tanggal_masuk', $currentYear)
                ->whereMonth('tanggal_masuk', $month)
                ->where('status', 'Aktif')
                ->count();

            $tidakAktif = Anak::whereYear('tanggal_masuk', $currentYear)
                ->whereMonth('tanggal_masuk', $month)
                ->where('status', '!=', 'Aktif')
                ->count();

            $chartData['data'][] = [date("F", mktime(0, 0, 0, $month, 1)), $aktif, $tidakAktif];
        }

        return response()->json($chartData);
    }


    public function json_status()
    {
        $aktif = Anak::where('status', 'Aktif')->count();
        $tidakAktif = Anak::where('status', '!=', 'Aktif')->count();

        $data = [
            'aktif' => $aktif,
            'tidak_aktif' => $tidakAktif,
        ];

        return $data;
    }
}
