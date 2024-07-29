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
            ->addColumn('name_user', function (SuratMasuk $suratMasuk) {
                return $suratMasuk->user ? $suratMasuk->user->name : 'Unknown';
            })
            ->addColumn('jenis_surat', function (SuratMasuk $suratMasuk) {
                return $suratMasuk->jenis ? $suratMasuk->jenis->jenis_surat : 'Unknown';
            })
            ->addColumn('action', function ($suratmasuk) {
                $ops = '<a href="' . route('surat_masuk.edit', $suratmasuk->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                $ops .= '
            <form action="' . route('surat_masuk.destroy', $suratmasuk->id) . '" method="POST" style="display:inline;">
                ' . csrf_field() . '
                ' . method_field('DELETE') . '
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
            </form>';

                return $ops;
            })->editColumn('file_upload', function ($suratmasuk) {
                // Generate the URL for the file
                $fileUrl = Storage::url($suratmasuk->file_upload);
                // Return the HTML for the link
                return "<a href='{$fileUrl}' target='_blank'>View Uploaded File</a>";
            })
            ->rawColumns(['file_upload','action'])
            ->editColumn('status_surat', function ($suratmasuk) {
                return $suratmasuk->status = 1 ? 'Baru' : ($suratmasuk->status == 2 ? 'Proses' : 'Selesai');
            })
            ->editColumn('tgl_surat', function ($suratmasuk) {
                return Carbon::parse($suratmasuk->tgl_surat)->format('d-m-Y H:i:s');
            })
            ->editColumn('tgl_masuk', function ($suratmasuk) {
                return Carbon::parse($suratmasuk->tgl_masuk)->format('d-m-Y H:i:s');
            })
            ->editColumn('tgl_selesai', function ($suratmasuk) {
                return $suratmasuk->tgl_selesai ? Carbon::parse($suratmasuk->tgl_selesai)->format('d-m-Y H:i:s') : '';
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SuratMasuk $model): QueryBuilder
    {
        return $model->orderBy('id')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('suratmasuk-table')
            ->addTableClass('table whitespace-nowrap ti-striped-table table-bordered table-hover min-w-full ti-custom-table-hover')
            ->setTableHeadClass('bg-primary/10')
            // ->setrowClass('border-b border-defaultborder')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID'),
            Column::make('name_user')->title('Nama'),
            Column::make('jenis_surat')->title('Jenis Surat'),
            Column::make('no_surat')->title('No Surat'),
            Column::make('status_surat')->title('Status Surat'),
            Column::make('perihal_masuk')->title('Perihal Masuk'),
            Column::make('tgl_surat')->title('Tanggal Surat'),
            Column::make('tgl_masuk')->title('Tanggal Masuk'),
            Column::make('tgl_selesai')->title('Tanggal Selesai'),
            Column::make('file_upload')->title('File Upload'),
            Column::make('asal_surat')->title('Asal Surat'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title('Aksi'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SuratMasuk_' . date('YmdHis');
    }
}
