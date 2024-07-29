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
            ->addColumn('action', function($row){
                $btn = '<a href="' . route('surat_masuk.edit', $row->id) . '" class="ti-btn ti-btn-info-full !py-1 !px-2 ti-btn-wave"><i class="ri-edit-line"></i></a> ';
                $btn .= '<a href="' . route('surat_masuk.destroy', $row->id) . '" class="ti-btn ti-btn-danger-full !py-1 !px-2 ti-btn-wave" data-confirm-delete="true"><i class="ri-delete-bin-line"></i></a> ';
                $btn .= '<a href="' . route('surat_masuk.disposisi', $row->id) . '" class="ti-btn ti-btn-danger-full !py-1 !px-2 ti-btn-wave"><i class="ri-mail-send-line"></i></a> ';
                if ($row->file_upload) {
                    $btn .= '<a href="' . asset('storage/' . $row->file_upload) . '" class="ti-btn ti-btn-success-full !py-1 !px-2 ti-btn-wave" target="_blank"><i class="bx bx-folder-open"></i>Lihat File</a>';
                }
                return $btn;
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
        return $model->newQuery()->with(['User', 'UserTujuan' => function ($q) {
            $q->with(['Jabatan']);
        }]);
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
            Column::make('user.name')->orderable(false)->title('Nama Pengirim')->addClass('border-b border-defaultborder'),
            Column::make('user_tujuan.name')->orderable(false)->title('Nama Tujuan')->addClass('border-b border-defaultborder'),
            Column::make('user_tujuan.jabatan.nama_jabatan')->orderable(false)->title('Jabatan Tujuan')->addClass('border-b border-defaultborder'),
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
