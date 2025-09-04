<?php

namespace App\Exports;

use App\Models\AktivitasProspek;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AktivitasProspekExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return AktivitasProspek::with(['calon', 'user'])->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Pengguna',
            'Calon Klien',
            'Hp Calon Klien',
            'Tanggal',
            'Jenis',
            'Hasil',
            'Catatan'
        ];
    }

    public function map($aktivitas): array
    {
        return [
            $aktivitas->id,
            $aktivitas->user ? $aktivitas->user->nama : '-',
            $aktivitas->calon ? $aktivitas->calon->nama : '-',
            $aktivitas->calon ? $aktivitas->calon->no_hp : '-',
            $aktivitas->tgl_aktivitas ? date('d-m-Y', strtotime($aktivitas->tgl_aktivitas)) : '-',
            $aktivitas->jenis ?? '-',
            $aktivitas->hasil ?? '-',
            $aktivitas->catatan ?? '-'
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
