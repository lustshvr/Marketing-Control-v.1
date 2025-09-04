<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Email',
            'Peran',
            'Status',
            'Tanggal Dibuat',
            'Tanggal Diedit'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->nama ?? '-',
            $user->email ?? '-',
            ucfirst($user->peran ?? '-'),
            $user->aktif ? 'Aktif' : 'Tidak Aktif',
            date('d-m-Y H:i:s', strtotime($user->created_at)),
            date('d-m-Y H:i:s', strtotime($user->updated_at))
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'E2EFDA']
                ]
            ]
        ];
    }
}
