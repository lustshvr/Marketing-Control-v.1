<?php

namespace App\Exports;

use App\Models\CalonKlien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CalonKlienExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return CalonKlien::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Alamat',
            'No HP',
            'Tahap',
            'Catatan',
            'Dibuat Pada',
            'Diupdate Pada'
        ];
    }

    public function map($calonKlien): array
    {
        return [
            $calonKlien->id,
            $calonKlien->nama ?? '-',
            $calonKlien->alamat ?? '-',
            $calonKlien->no_hp ?? '-',
            $calonKlien->tahap ?? '-',
            $calonKlien->catatan ?? '-',
            date('d-m-Y H:i:s', strtotime($calonKlien->created_at)),
            date('d-m-Y H:i:s', strtotime($calonKlien->updated_at))
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
