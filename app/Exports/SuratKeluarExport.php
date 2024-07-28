<?php

namespace App\Exports;

use App\Models\SuratKeluar;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class SuratKeluarExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithEvents
{
    use Exportable;

    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function query()
    {
        return SuratKeluar::query()
            ->whereBetween('tgl_keluar', [$this->startDate, $this->endDate]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Nama Penerima',
            'Kode Surat',
            'No Surat',
            'Perihal',
            'Tanggal Keluar',
            'Tanggal Diterima',
            'Status Surat',
            'Tujuan Surat',
            'File Upload',
            'Created At',
            'Updated At',
        ];
    }

    public function map($suratKeluar): array
    {
        return [
            $suratKeluar->id,
            $suratKeluar->user_id,
            $suratKeluar->nama_penerima,
            $suratKeluar->kode_surat,
            $suratKeluar->no_surat,
            $suratKeluar->perihal,
            $suratKeluar->tgl_keluar,
            $suratKeluar->tgl_diterima,
            $this->getStatusText($suratKeluar->status_surat),
            $suratKeluar->tujuan_surat,
            $suratKeluar->file_upload,
            $suratKeluar->created_at,
            $suratKeluar->updated_at,
        ];
    }

    public function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Draft';
            case '2':
                return 'Terkirim';
            case '3':
                return 'Selesai';
            default:
                return 'Unknown';
        }
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk heading
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:M1')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                $event->sheet->getStyle('A2:M' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },
        ];
    }
}
