<?php

namespace App\DataTables;

use App\Models\SuratMasuk;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SuratMasukDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($row) {
                $btn = '';
                if (auth()->user()->can('update-surat-masuk')) {
                    $btn .= '<a href="' . route('surat_masuk.edit', $row->id) . '" class="ti-btn ti-btn-info-full !py-1 !px-2 ti-btn-wave"><i class="ri-edit-line"></i></a> ';
                }
                if (auth()->user()->can('delete-surat-masuk')) {
                    $btn .= '<a href="' . route('surat_masuk.destroy', $row->id) . '" class="btn-delete ti-btn ti-btn-danger-full !py-1 !px-2 ti-btn-wave" data-confirm-delete="true"><i class="ri-delete-bin-line"></i></a> ';
                }
                if (auth()->user()->can('add-disposisi') && $row->status_surat !== '4' && $row->status_surat !== '5' && $row->status_surat !== '6') {
                    $btn .= '<a href="' . route('surat_masuk.disposisi', $row->id) . '" class="ti-btn ti-btn-secondary-full !py-1 !px-2 ti-btn-wave"><i class="ri-mail-send-line"></i>Disposisi</a> ';
                }
                if (auth()->user()->can('teruskan-disposisi')) {
                    $btn .= '<a href="' . route('disposisi.teruskan', $row->disposisi_id) . '" class="ti-btn ti-btn-secondary-full !py-1 !px-2 ti-btn-wave"><i class="ri-mail-send-line"></i>Teruskan</a> ';
                }
                if ($row->status_surat == '1' && auth()->user()->can('add-distribusi')) {
                    $btn .= '<a href="' . route('surat_masuk.distribusi', $row->id) . '" class="ti-btn ti-btn-secondary-full !py-1 !px-2 ti-btn-wave"><i class="ri-mail-send-line"></i>Distribusi</a> ';
                }
                if ($row->status_surat == '2' && auth()->user()->can('tolak-surat-masuk')) {
                    $btn .= '<a href="' . route('surat_masuk.tolak', $row->id) . '" class="btn-tolak ti-btn ti-btn-danger-full !py-1 !px-2 ti-btn-wave" data-confirm-tolak="true"><i class="ri-close-circle-line"></i>Tolak</a> ';
                }
                if ($row->status_surat == '3' && auth()->user()->can('selesai-surat-masuk')) {
                    $btn .= '<a href="' . route('surat_masuk.terima', $row->id) . '" class="ti-btn ti-btn-success-full !py-1 !px-2 ti-btn-wave"><i class="ri-checkbox-circle-line"></i>Tandai Selesai</a> ';
                }
                if ($row->file_upload) {
                    $btn .= '<a href="' . asset('storage/' . $row->file_upload) . '" class="ti-btn ti-btn-success-full !py-1 !px-2 ti-btn-wave" target="_blank"><i class="bx bx-folder-open"></i>Lihat File</a>';
                }
                return $btn;
            })
            ->filterColumn('jenis_surat', function ($query, $keyword) {
                $query->where('jenis_surat', 'like', "%{$keyword}%");
            })
            ->editColumn('status_surat', function ($row) {
                return $this->getStatusLabel($row->status_surat);
            })
            ->rawColumns(['status_surat', 'action'])
            ->editColumn('tgl_masuk', function ($data) {
                return Carbon::parse($data->tgl_masuk)->format('d-m-Y');
            });
        // ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SuratMasuk $model): QueryBuilder
    {
        if (auth()->user()->hasRole('admin')) {
            return $model->newQuery()->select('surat_masuk.*','surat_masuk.id as surat_masuk_id', 'jenis_surat.jenis_surat')
                ->leftJoin('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
                ->orderBy('surat_masuk.created_at', 'desc');
        }
        if (auth()->user()->hasRole('operator')) {
            return $model->newQuery()->select('surat_masuk.*','surat_masuk.id as surat_masuk_id', 'jenis_surat.jenis_surat')
                ->leftJoin('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
                ->orderBy('surat_masuk.created_at', 'desc');
        }
        if (auth()->user()->hasRole('pemberidisposisi')) {
            return $model->newQuery()->select('surat_masuk.*','surat_masuk.id as surat_masuk_id', 'jenis_surat.jenis_surat')->whereNot('status_surat', 1)
                ->leftJoin('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
                ->orderBy('surat_masuk.created_at', 'desc');
        }
        if (auth()->user()->hasRole('penanggungjawab')) {
            return $model->newQuery()
                ->select([
                    'surat_masuk.id as surat_masuk_id',          // Alias untuk id dari surat_masuk
                    'surat_masuk.user_id',                       // ID user pengirim surat
                    'surat_masuk.jenis_surat_id',                // ID jenis surat
                    'jenis_surat.jenis_surat as jenis_surat',    // Nama jenis surat dari tabel jenis_surat
                    'surat_masuk.no_surat',                      // Nomor surat
                    'surat_masuk.perihal',                       // Perihal surat
                    'surat_masuk.status_surat',                  // Status surat (Baru, Diproses, Disposisi, Selesai, Ditolak, Diarsipkan)
                    'surat_masuk.tgl_surat',                     // Tanggal surat
                    'surat_masuk.tgl_masuk',                     // Tanggal masuk surat
                    'surat_masuk.tgl_selesai',                   // Tanggal selesai surat
                    'surat_masuk.asal_surat',                    // Asal surat
                    'surat_masuk.file_upload as surat_file_upload',   // File upload surat
                    'disposisi.id as disposisi_id',              // Alias untuk id dari disposisi
                    'disposisi.user_id_pengirim',                // ID user pengirim disposisi
                    'disposisi.user_id_tujuan',                  // ID user tujuan disposisi
                    'disposisi.status_disposisi',                // Status disposisi (Distribusi, Disposisi, Diteruskan, Selesai, Ditolak)
                    'disposisi.tgl_disposisi',                   // Tanggal disposisi
                    'disposisi.file_upload as disposisi_file_upload',  // File upload disposisi
                    'disposisi.keterangan_disposisi'             // Keterangan disposisi
                ])
                ->whereNot('surat_masuk.status_surat', 1) // Filter surat_masuk dengan status_surat bukan 1 (Baru)
                ->leftJoin('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
                ->leftJoin('disposisi', 'surat_masuk.id', '=', 'disposisi.surat_masuk_id')
                ->where('disposisi.user_id_tujuan', auth()->user()->id)
                ->orderBy('surat_masuk.created_at', 'desc');
        }                      
        if (auth()->user()->hasRole('pelaksana')) {
            return $model->newQuery()
                ->select([
                    'surat_masuk.id as surat_masuk_id',          // Alias untuk id dari surat_masuk
                    'surat_masuk.user_id',                       // ID user pengirim surat
                    'surat_masuk.jenis_surat_id',                // ID jenis surat
                    'jenis_surat.jenis_surat as jenis_surat',    // Nama jenis surat dari tabel jenis_surat
                    'surat_masuk.no_surat',                      // Nomor surat
                    'surat_masuk.perihal',                       // Perihal surat
                    'surat_masuk.status_surat',                  // Status surat (Baru, Diproses, Disposisi, Selesai, Ditolak, Diarsipkan)
                    'surat_masuk.tgl_surat',                     // Tanggal surat
                    'surat_masuk.tgl_masuk',                     // Tanggal masuk surat
                    'surat_masuk.tgl_selesai',                   // Tanggal selesai surat
                    'surat_masuk.asal_surat',                    // Asal surat
                    'surat_masuk.file_upload as surat_file_upload',   // File upload surat
                    'disposisi.id as disposisi_id',              // Alias untuk id dari disposisi
                    'disposisi.user_id_pengirim',                // ID user pengirim disposisi
                    'disposisi.user_id_tujuan',                  // ID user tujuan disposisi
                    'disposisi.status_disposisi',                // Status disposisi (Distribusi, Disposisi, Diteruskan, Selesai, Ditolak)
                    'disposisi.tgl_disposisi',                   // Tanggal disposisi
                    'disposisi.file_upload as disposisi_file_upload',  // File upload disposisi
                    'disposisi.keterangan_disposisi'             // Keterangan disposisi
                ])
                ->whereNot('surat_masuk.status_surat', 1) // Filter surat_masuk dengan status_surat bukan 1 (Baru)
                ->leftJoin('jenis_surat', 'surat_masuk.jenis_surat_id', '=', 'jenis_surat.id')
                ->leftJoin('disposisi', 'surat_masuk.id', '=', 'disposisi.surat_masuk_id')
                ->where('disposisi.user_id_tujuan', auth()->user()->id)
                ->orderBy('surat_masuk.created_at', 'desc');
        }   
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('suratmasuk-table')
            ->addTableClass('table whitespace-nowrap ti-striped-table table-hover min-w-full ti-custom-table-hover')
            ->setTableHeadClass('bg-primary text-white')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('surat_masuk_id')->orderable(false)->title('ID')->addClass('border-b border-defaultborder'),
            Column::make('no_surat')->orderable(false)->title('No. Surat')->addClass('border-b border-defaultborder'),
            Column::make('asal_surat')->orderable(false)->title('Asal Surat')->addClass('border-b border-defaultborder'),
            Column::make('jenis_surat')->orderable(false)->title('Jenis Surat')->addClass('border-b border-defaultborder'),
            Column::make('status_surat')->orderable(false)->title('Status')->addClass('border-b border-defaultborder'),
            Column::make('tgl_masuk')->orderable(false)->title('Tgl Masuk')->addClass('border-b border-defaultborder'),
            Column::computed('action')->exportable(false)->printable(false)->width(60)->addClass('text-center border-b border-defaultborder'),
        ];
    }

    private function getStatusLabel($status)
    {
        $statusLabels = [
            1 => '<span class="badge bg-success text-white">Baru</span>',
            2 => '<span class="badge bg-primary text-white">Diproses</span>',
            3 => '<span class="badge bg-warning text-white">Disposisi</span>',
            4 => '<span class="badge bg-info text-white">Selesai</span>',
            5 => '<span class="badge bg-danger text-white">Ditolak</span>',
            6 => '<span class="badge bg-dark text-white">Diarsipkan</span>',
        ];

        return $statusLabels[$status] ?? 'Unknown';
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SuratMasuk_' . date('YmdHis');
    }
}
