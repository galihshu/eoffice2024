<?php

namespace App\DataTables;

use App\Models\Jenissurat;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JenissuratDataTable extends DataTable
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
        ->addColumn('action', function ($jenissurat) {
            $ops = '<a href="' . route('jenissurat.edit', $jenissurat->id) . '" class="ti-btn ti-btn-icon ti-btn-sm ti-btn-info"><i class="ri-edit-line"></i></a>';
            $ops .= '<a href="' . route('jenissurat.destroy', $jenissurat->id) . '" class="ti-btn ti-btn-icon ti-btn-sm ti-btn-danger" data-confirm-delete="true"><i class="ri-delete-bin-line"></i></a>';

            return $ops;
        })
        ->editColumn('created_at', function ($jabatan) {
            return Carbon::parse($jabatan->created_at)->format('d-m-Y H:i:s');
        })
        ->editColumn('updated_at', function ($jabatan) {
            return Carbon::parse($jabatan->updated_at)->format('d-m-Y H:i:s');
        });;
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Jenissurat $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('jenissurat-table')
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
            Column::make('jenis_surat')->orderable(false)->title('Jenis Surat')->addClass('border-b border-defaultborder'),
            Column::make('created_at')->orderable(false)->title('Dibuat Pada')->addClass('border-b border-defaultborder'),
            Column::make('updated_at')->orderable(false)->title('Diubah Pada')->addClass('border-b border-defaultborder'),
            Column::computed('action')->exportable(false)->printable(false)->width(60)->addClass('text-center border-b border-defaultborder')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Jenissurat_' . date('YmdHis');
    }
}
