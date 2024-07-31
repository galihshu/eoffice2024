<?php

namespace App\DataTables;

use App\Models\Disposisi;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DisposisiDataTable extends DataTable
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
                $btn = '<a href="' . route('disposisi.edit', $row->id) . '" class="ti-btn ti-btn-info-full !py-1 !px-2 ti-btn-wave"><i class="ri-edit-line"></i></a> ';
                $btn .= '<a href="' . route('disposisi.destroy', $row->id) . '" class="ti-btn ti-btn-danger-full !py-1 !px-2 ti-btn-wave" data-confirm-delete="true"><i class="ri-delete-bin-line"></i></a> ';
                if ($row->file_upload) {
                    $btn .= '<a href="' . asset('storage/' . $row->file_upload) . '" class="ti-btn ti-btn-success-full !py-1 !px-2 ti-btn-wave" target="_blank"><i class="bx bx-folder-open"></i>Lihat File</a>';
                }
                return $btn;
            })
            ->filterColumn('no_surat', function ($query, $keyword) {
                $query->where('surat_masuk.no_surat', 'like', "%{$keyword}%");
            })
            ->filterColumn('nama_pengirim', function ($query, $keyword) {
                $query->where('pengirim.name', 'like', "%{$keyword}%");
            })
            ->filterColumn('nama_tujuan', function ($query, $keyword) {
                $query->where('tujuan.name', 'like', "%{$keyword}%");
            })
            ->filterColumn('jabatan_tujuan', function ($query, $keyword) {
                $query->where('jabatan.nama_jabatan', 'like', "%{$keyword}%");
            })
            ->editColumn('tgl_disposisi', function ($data) {
                return Carbon::parse($data->tgl_disposisi)->format('d-m-Y');
            });
        // ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Disposisi $model): QueryBuilder
    {
        if (auth()->user()->hasRole('admin')) {
            return $model->newQuery()
                ->select('Disposisi.*', 'surat_masuk.no_surat as no_surat', 'pengirim.name as nama_pengirim', 'tujuan.name as nama_tujuan', 'jabatan.nama_jabatan as jabatan_tujuan')
                ->leftJoin('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
                ->leftJoin('users as pengirim', 'disposisi.user_id_pengirim', '=', 'pengirim.id')
                ->leftJoin('users as tujuan', 'disposisi.user_id_tujuan', '=', 'tujuan.id')
                ->leftJoin('jabatan', 'tujuan.jabatan_id', '=', 'jabatan.id');
        }
        return $model->newQuery()
            ->select('Disposisi.*', 'surat_masuk.no_surat as no_surat', 'pengirim.name as nama_pengirim', 'tujuan.name as nama_tujuan', 'jabatan.nama_jabatan as jabatan_tujuan')
            ->where('user_id_pengirim', auth()->user()->id)
            ->leftJoin('surat_masuk', 'disposisi.surat_masuk_id', '=', 'surat_masuk.id')
            ->leftJoin('users as pengirim', 'disposisi.user_id_pengirim', '=', 'pengirim.id')
            ->leftJoin('users as tujuan', 'disposisi.user_id_tujuan', '=', 'tujuan.id')
            ->leftJoin('jabatan', 'tujuan.jabatan_id', '=', 'jabatan.id');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('suratkeluar-table')
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
            Column::make('id')->orderable(false)->addClass('border-b border-defaultborder'),
            Column::make('no_surat')->orderable(false)->title('No. Surat')->addClass('border-b border-defaultborder'),
            Column::make('nama_pengirim')->orderable(false)->title('Pemberi Disposisi')->addClass('border-b border-defaultborder'),
            Column::make('nama_tujuan')->orderable(false)->title('Nama Penerima')->addClass('border-b border-defaultborder'),
            Column::make('jabatan_tujuan')->orderable(false)->title('Jabatan Penerima')->addClass('border-b border-defaultborder'),
            Column::make('tgl_disposisi')->orderable(false)->title('Tanggal Disposisi')->addClass('border-b border-defaultborder'),
            Column::computed('action')->exportable(false)->printable(false)->width(60)->addClass('text-center border-b border-defaultborder'),
        ];
    }

    private function getStatusLabel($status)
    {
        $statusLabels = [
            1 => 'Baru',
            2 => 'Diproses',
            3 => 'Selesai',
        ];

        return $statusLabels[$status] ?? 'Unknown';
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Disposisi_' . date('YmdHis');
    }
}
