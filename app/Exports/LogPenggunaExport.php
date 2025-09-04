<?php

namespace App\Exports;

use App\Models\LogPengguna;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LogPenggunaExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return LogPengguna::with(['user'])->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Pengguna',
            'Aktivitas',
            'Keterangan',
            'Waktu'
        ];
    }

    public function map($log): array
    {
        return [
            $log->id,
            $log->user ? $log->user->nama : '-',
            $log->aktivitas ?? '-',
            $log->keterangan ?? '-',
            date('d-m-Y H:i:s', strtotime($log->created_at))
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
