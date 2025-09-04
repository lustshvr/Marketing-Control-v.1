<?php

namespace App\Exports;

use App\Models\Modul;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ModulExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Modul::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode',
            'Nama',
            'Deskripsi',
            'Tanggal Dibuat',
            'Tanggal Diupdate'
        ];
    }

    public function map($modul): array
    {
        return [
            $modul->id,
            $modul->kode ?? '-',
            $modul->nama ?? '-',
            $modul->deskripsi ?? '-',
            date('d-m-Y H:i:s', strtotime($modul->created_at)),
            date('d-m-Y H:i:s', strtotime($modul->updated_at))
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
