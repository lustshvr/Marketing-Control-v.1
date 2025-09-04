<?php

namespace App\Exports;

use App\Models\PenggunaanModul;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PenggunaanModulExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return PenggunaanModul::with(['klien', 'modul'])->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Klien',
            'Modul',
            'Tanggal Mulai',
            'Tanggal Akhir',
            'Pelatihan Terakhir',
            'Catatan'
        ];
    }

    public function map($penggunaan): array
    {
        return [
            $penggunaan->id,
            $penggunaan->klien ? $penggunaan->klien->nama : '-',
            $penggunaan->modul ? $penggunaan->modul->nama : '-',
            $penggunaan->tgl_mulai ? date('d-m-Y', strtotime($penggunaan->tgl_mulai)) : '-',
            $penggunaan->tgl_akhir ? date('d-m-Y', strtotime($penggunaan->tgl_akhir)) : '-',
            $penggunaan->pelatihan_terakhir ? date('d-m-Y', strtotime($penggunaan->pelatihan_terakhir)) : '-',
            $penggunaan->catatan ?? '-'
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
