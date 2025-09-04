<?php

namespace App\Exports;

use App\Models\Klien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KlienExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    public function collection()
    {
        return Klien::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Alamat',
            'No HP',
            'Narahubung',
            'Jenjang',
            'Jumlah Siswa',
            'Tanggal MOU',
            'Catatan',
            'Dibuat Pada',
            'Diedit Pada'
        ];
    }

    public function map($klien): array
    {
        return [
            $klien->id,
            $klien->nama ?? '-',
            $klien->alamat ?? '-',
            $klien->no_hp ?? '-',
            $klien->narahubung ?? '-',
            $klien->jenjang ?? '-',
            $klien->jumlah_siswa ?? '-',
            $klien->tgl_mou ? date('d-m-Y', strtotime($klien->tgl_mou)) : '-',
            $klien->catatan ?? '-',
            date('d-m-Y H:i:s', strtotime($klien->created_at)),
            date('d-m-Y H:i:s', strtotime($klien->updated_at))
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
