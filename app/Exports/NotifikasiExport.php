<?php

namespace App\Exports;

use App\Models\Notifikasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class NotifikasiExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Notifikasi::with(['tagihan.klien'])->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Klien',
            'Tagihan',
            'Saluran',
            'Isi Pesan',
            'Status',
            'Terkirim Pada'
        ];
    }

    public function map($notifikasi): array
    {
        return [
            $notifikasi->id,
            $notifikasi->tagihan && $notifikasi->tagihan->klien ? $notifikasi->tagihan->klien->nama : '-',
            $notifikasi->tagihan ? $notifikasi->tagihan->keterangan : '-',
            $notifikasi->saluran ?? '-',
            $notifikasi->isi_pesan ?? '-',
            $notifikasi->status ?? '-',
            $notifikasi->terkirim_pada ? date('d-m-Y H:i:s', strtotime($notifikasi->terkirim_pada)) : '-'
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
