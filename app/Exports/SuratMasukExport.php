<?php

namespace App\Exports;

use App\Models\SuratMasuk;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class SuratMasukExport implements FromQuery, WithHeadings, WithMapping, WithStyles, WithEvents
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
        return SuratMasuk::query()->with(['User', 'Jenis'])
            ->whereBetween('tgl_masuk', [$this->startDate, $this->endDate]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Nama Penerima',
            'Jenis Surat ID',
            'Jenis Surat',
            'No Surat',
            'Perihal',
            'Status Surat',
            'Tanggal Surat',
            'Tanggal Masuk',
            'Tanggal Selesai',
            'Asal Surat',
            'File Upload',
            'Created At',
            'Updated At',
        ];
    }

    public function map($suratMasuk): array
    {
        return [
            $suratMasuk->id,
            $suratMasuk->user_id,
            $suratMasuk->user->name,
            $suratMasuk->jenis_surat_id,
            $suratMasuk->jenis->jenis_surat,
            $suratMasuk->no_surat,
            $suratMasuk->perihal,
            $this->getStatusText($suratMasuk->status_surat),
            $suratMasuk->tgl_surat,
            $suratMasuk->tgl_masuk,
            $suratMasuk->tgl_selesai,
            $suratMasuk->asal_surat,
            $suratMasuk->file_upload,
            $suratMasuk->created_at,
            $suratMasuk->updated_at,
        ];
    }

    public function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Baru';
            case '2':
                return 'Diproses';
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
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:O1')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                $event->sheet->getStyle('A2:O' . $event->sheet->getHighestRow())->applyFromArray([
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
