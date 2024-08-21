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
use Carbon\Carbon;

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
            'No Surat',
            'Pengirim',
            'Jenis Surat',
            'Perihal',
            'Status Surat',
            'Tanggal Surat',
            'Tanggal Masuk',
            'Tanggal Selesai',
            'File Upload',
            'Created At',
            'Updated At',
        ];
    }

    public function map($suratMasuk): array
    {
        return [
            $suratMasuk->id,
            $suratMasuk->no_surat,
            $suratMasuk->asal_surat,
            $suratMasuk->jenis->jenis_surat,
            $suratMasuk->perihal,
            $this->getStatusText($suratMasuk->status_surat),
            // Menggunakan format Y-m-d untuk menampilkan hanya tanggal
            Carbon::parse($suratMasuk->tgl_surat)->format('d-m-Y'),
            Carbon::parse($suratMasuk->tgl_masuk)->format('d-m-Y'),
            Carbon::parse($suratMasuk->tgl_selesai)->format('d-m-Y'),
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
                return 'Disposisi';
            case '4':
                return 'Selesai';
            case '5':
                return 'Ditolak';
            case '6':
                return 'Diarsipkan';    
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
                // Menambahkan border tebal untuk heading
                $event->sheet->getStyle('A1:L1')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                // Menambahkan border tipis untuk semua data
                $event->sheet->getStyle('A2:L' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                // Mengatur auto-size untuk setiap kolom dari A hingga L
                foreach (range('A', 'L') as $column) {
                    $event->sheet->getDelegate()->getColumnDimension($column)->setAutoSize(true);
                }
            },
        ];
    }

}
