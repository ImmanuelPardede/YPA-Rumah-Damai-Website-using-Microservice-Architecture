<?php

namespace App\Exports;

use App\Models\Anak;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ExportAnak implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        // Ambil semua data anak dari model
        $anakList = Anak::all();

        // Inisialisasi nomor urut
        $number = 1;

        // Mapping data anak untuk menambahkan nomor urut dan menghitung usia
        return $anakList->map(function ($anak) use (&$number) {
            // Inisialisasi variabel usia dengan string kosong
            $usia = '';

            // Periksa apakah tanggal lahir tersedia dan valid
            if (!empty($anak->tanggal_lahir) && Carbon::parse($anak->tanggal_lahir)->isValid()) {
                // Hitung usia berdasarkan tanggal lahir
                $tanggalLahir = Carbon::parse($anak->tanggal_lahir);
                $usia = $tanggalLahir->diffInYears(Carbon::now());
            }

            return [
                'No' => $number++, // Nomor urut
                'Nama' => $anak->nama_lengkap,
                'Usia' => $usia, // Usia dihitung berdasarkan tanggal lahir
                'Jenis Kelamin' => $anak->jenisKelamin->jenis_kelamin,
                'Alamat' => $anak->alamat,
                'NIA' => $anak->nia,
                'Status' => $anak->status,
                // Tambahkan kolom lain sesuai kebutuhan
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Usia',
            'Jenis Kelamin',
            'Alamat',
            'NIA',
            'Status',
            // Tambahkan kolom lain sesuai kebutuhan
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Apply styling to the header
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FFFF00',
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
        ];
    }
}
