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
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('surat_masuk.edit', $row->id) . '" class="ti-btn ti-btn-info-full !py-1 !px-2 ti-btn-wave"><i class="ri-edit-line"></i></a> ';
                $btn .= '<a href="' . route('surat_masuk.destroy', $row->id) . '" class="ti-btn ti-btn-danger-full !py-1 !px-2 ti-btn-wave" data-confirm-delete="true"><i class="ri-delete-bin-line"></i></a> ';

                if ($row->file_upload) {
                    $btn .= '<a href="' . asset('storage/' . $row->file_upload) . '" class="ti-btn ti-btn-success-full !py-1 !px-2 ti-btn-wave" target="_blank"><i class="bx bx-folder-open"></i>Lihat File</a>';
                }
                return $btn;
            })
            ->editColumn('status_surat', function ($row) {
                return $this->getStatusLabel($row->status_surat);
            })
            ->editColumn('tgl_masuk', function ($data) {
                return Carbon::parse($data->tgl_masuk)->format('d-m-Y');
            })
            ->editColumn('tgl_surat', function ($data) {
                return Carbon::parse($data->tgl_surat)->format('d-m-Y');
            })
            ->editColumn('tgl_selesai', function ($data) {
                if($data->tgl_selesai !== null){
                    return Carbon::parse($data->tgl_selesai)->format('d-m-Y');
                }
                return '---';
            });
            // ->rawColumns(['action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SuratMasuk $model): QueryBuilder
    {
        return $model->newQuery()->with('user');
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
            Column::make('asal_surat')->orderable(false)->title('Asal Surat')->addClass('border-b border-defaultborder'),
            Column::make('status_surat')
                  ->title('Status')
                  ->orderable(false)
                  ->addClass('border-b border-defaultborder'),
            Column::make('tgl_masuk')->orderable(false)->title('Tgl Masuk')->addClass('border-b border-defaultborder'),
            Column::make('tgl_surat')->orderable(false)->title('Tgl Surat')->addClass('border-b border-defaultborder'),
            Column::make('tgl_selesai')->orderable(false)->title('Tgl Selesai')->addClass('border-b border-defaultborder'),
            Column::computed('action')->exportable(false)->printable(false)->width(60)->addClass('text-center border-b border-defaultborder')
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
        return 'SuratKeluar_' . date('YmdHis');
    }
}
