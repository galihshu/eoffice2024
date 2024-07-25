<?php

namespace App\DataTables;

use App\Models\Jabatan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JabatanDataTable extends DataTable
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
            ->addColumn('action', function ($jabatan) {
                $ops = '<a href="' . route('jabatan.edit', $jabatan->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                $ops .= '
                <form action="' . route('jabatan.destroy', $jabatan->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';

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
    public function query(Jabatan $model): QueryBuilder
    {
        return $model->orderBy('id')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jabatan-table')
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
            Column::make('id'),
            Column::make('nama_jabatan')->title('Nama Jabatan'),
            Column::make('created_at')->title('Dibuat Pada'),
            Column::make('updated_at')->title('Diubah Pada'),
            Column::computed('action')->exportable(false)->printable(false)->width(60)->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Jabatan_' . date('YmdHis');
    }
}
