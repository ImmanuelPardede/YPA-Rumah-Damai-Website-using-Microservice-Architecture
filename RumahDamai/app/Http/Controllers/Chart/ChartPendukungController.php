<?php
// ChartPendukungController.php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use App\Models\Donatur;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class ChartPendukungController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function chartDataPendukung()
    {
        $currentYear = date('Y');
        $chartData = [
            'title' => 'Data Pendukung ' . $currentYear,
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Donatur',
                    'backgroundColor' => '#007bff',
                    'data' => [],
                ],
                [
                    'label' => 'Jumlah Sponsor',
                    'backgroundColor' => '#28a745',
                    'data' => [],
                ],
            ],
        ];

        for ($month = 1; $month <= 12; $month++) {
            $chartData['labels'][] = date("F", mktime(0, 0, 0, $month, 1));

            $jumlahDonatur = Donatur::whereYear('tanggal_donatur', $currentYear)
                ->whereMonth('tanggal_donatur', $month)
                ->count();

            $jumlahSponsor = Sponsor::whereYear('tanggal_sponsor', $currentYear)
                ->whereMonth('tanggal_sponsor', $month)
                ->count();

            // Push data ke dalam datasets
            $chartData['datasets'][0]['data'][] = $jumlahDonatur;
            $chartData['datasets'][1]['data'][] = $jumlahSponsor;
        }

        return response()->json($chartData);
    }
}
