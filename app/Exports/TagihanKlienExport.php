<?php

namespace App\Exports;

use App\Models\TagihanKlien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TagihanKlienExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return TagihanKlien::with(['klien'])->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Klien',
            'Keterangan',
            'Jumlah Tagihan',
            'Jatuh Tempo',
            'Jumlah Bayar',
            'Dibayar Pada',
            'Status'
        ];
    }

    public function map($tagihan): array
    {
        return [
            $tagihan->id,
            $tagihan->klien ? $tagihan->klien->nama : '-',
            $tagihan->keterangan ?? '-',
            $tagihan->jumlah_tagihan ? 'Rp ' . number_format($tagihan->jumlah_tagihan, 0, ',', '.') : '-',
            $tagihan->jatuh_tempo ? date('d-m-Y', strtotime($tagihan->jatuh_tempo)) : '-',
            $tagihan->jumlah_bayar ? 'Rp ' . number_format($tagihan->jumlah_bayar, 0, ',', '.') : '-',
            $tagihan->dibayar_pada ? date('d-m-Y', strtotime($tagihan->dibayar_pada)) : '-',
            $tagihan->status ?? '-'
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
