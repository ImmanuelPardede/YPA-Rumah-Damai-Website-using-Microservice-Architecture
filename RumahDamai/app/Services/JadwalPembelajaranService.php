<?php

namespace App\Services;

use App\Models\JadwalPembelajaran;
use Carbon\Carbon;

class JadwalPembelajaranService
{
    public function generateCalendarData($weekDays, $startOfWeek, $endOfWeek, $lokasi_penugasan_id)
    {
        $calendarData = [];
        $jadwalPembelajaran = JadwalPembelajaran::with(['kelas', 'guru'])
            ->whereBetween('tanggal_pembelajaran', [$startOfWeek, $endOfWeek])
            ->where('lokasi_penugasan_id', $lokasi_penugasan_id)
            ->orderBy('tanggal_pembelajaran')
            ->get();

        foreach ($jadwalPembelajaran as $jadwal) {
            $timeRange = [
                ['start' => $jadwal->jam_mulai, 'end' => $jadwal->jam_selesai],
            ];

            foreach ($timeRange as $time) {
                $timeText = $time['start'] . ' - ' . $time['end'];

                if (!isset($calendarData[$timeText])) {
                    $calendarData[$timeText] = array_fill_keys($weekDays, null);
                }

                foreach ($weekDays as $day) {
                    if ($calendarData[$timeText][$day] === null) {
                        $jadwalHariIni = $jadwalPembelajaran
                            ->where('hari_pembelajaran', $day)
                            ->where('jam_mulai', $time['start'])
                            ->first();

                        $rowData = [
                            'kelas' => 'Kosong',
                            'guru' => 'Kosong',
                            'hari' => $day,
                            'time_start' => '-',
                            'time_end' => '-',
                            'rowspan' => 1,
                            'color' => '#ffffff'
                        ];

                        if ($jadwalHariIni) {
                            $rowData = [
                                'kelas' => $jadwalHariIni->kelas ? $jadwalHariIni->kelas->nama_kelas : 'Kosong',
                                'guru' => $jadwalHariIni->guru ? $jadwalHariIni->guru->nama_lengkap : 'Kosong',
                                'hari' => $day,
                                'time_start' => $jadwalHariIni->jam_mulai,
                                'time_end' => $jadwalHariIni->jam_selesai,
                                'rowspan' => $jadwalHariIni->difference / 30 ?? 1,
                                'color' => '#f0f0f0'
                            ];
                        }

                        $calendarData[$timeText][$day] = $rowData;
                    }
                }
            }
        }

        return $calendarData;
    }

    public function generateJadwalData($weekDays, $startOfWeek, $endOfWeek)
    {
        $calendarData = [];
        $jadwalPembelajaran = JadwalPembelajaran::with(['kelas', 'guru'])
            ->whereBetween('tanggal_pembelajaran', [$startOfWeek, $endOfWeek])
            ->orderBy('tanggal_pembelajaran')
            ->get();

        foreach ($jadwalPembelajaran as $jadwal) {
            $timeRange = [
                ['start' => $jadwal->jam_mulai, 'end' => $jadwal->jam_selesai],
            ];

            foreach ($timeRange as $time) {
                $timeText = $time['start'] . ' - ' . $time['end'];
                $lokasiPenugasanId = $jadwal->lokasi_penugasan_id;

                if (!isset($calendarData[$lokasiPenugasanId])) {
                    $calendarData[$lokasiPenugasanId] = [];
                }

                if (!isset($calendarData[$lokasiPenugasanId][$timeText])) {
                    $calendarData[$lokasiPenugasanId][$timeText] = array_fill_keys($weekDays, null);
                }

                foreach ($weekDays as $day) {
                    if ($calendarData[$lokasiPenugasanId][$timeText][$day] === null) {
                        $jadwalHariIni = $jadwalPembelajaran
                            ->where('hari_pembelajaran', $day)
                            ->where('jam_mulai', $time['start'])
                            ->where('lokasi_penugasan_id', $lokasiPenugasanId)
                            ->first();

                        $rowData = [
                            'kelas' => 'Kosong',
                            'guru' => 'Kosong',
                            'hari' => $day,
                            'time_start' => '-',
                            'time_end' => '-',
                            'rowspan' => 1,
                            'color' => '#ffffff'
                        ];

                        if ($jadwalHariIni) {
                            $rowData = [
                                'kelas' => $jadwalHariIni->kelas ? $jadwalHariIni->kelas->nama_kelas : 'Kosong',
                                'guru' => $jadwalHariIni->guru ? $jadwalHariIni->guru->nama_lengkap : 'Kosong',
                                'hari' => $day,
                                'time_start' => $jadwalHariIni->jam_mulai,
                                'time_end' => $jadwalHariIni->jam_selesai,
                                'rowspan' => $jadwalHariIni->difference / 30 ?? 1,
                                'color' => '#f0f0f0'
                            ];
                        }

                        $calendarData[$lokasiPenugasanId][$timeText][$day] = $rowData;
                    }
                }
            }
        }

        return $calendarData;
    }
}
