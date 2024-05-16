<?php
namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportPegawai implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        // Ambil data pengguna dengan kolom yang dipilih
        $users = User::select('nama_lengkap', 'nip', 'role', 'email', 'status')->get();
        
        // Inisialisasi nomor baris
        $number = 1;
        
        // Mapping data pengguna untuk menambahkan nomor baris
        return $users->map(function ($user) use (&$number) {
            // Tambahkan nomor baris sebagai elemen pertama pada setiap baris data
            return [
                'No' => $number++, // Nomor baris
                'Nama Lengkap' => $user->nama_lengkap,
                'NIP' => $user->nip,
                'Jabatan' => $user->role,
                'Email' => $user->email,
                'Status' => $user->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'NIP',
            'Jabatan',
            'Email',
            'Status',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Contoh penyesuaian gaya
            1    => ['font' => ['bold' => true]],
            'A1:F1' => ['fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FFFF00']]],
        ];
    }
}
