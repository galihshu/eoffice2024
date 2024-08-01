<?php

namespace App\DataTables;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RolesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            // ->addColumn('permissions', function (Role $role) {
            //     return $role->permissions->pluck('name')->implode(', ');
            // })
            ->addColumn('actions', function ($role) {
                $ops = '<a href="' . route('role.edit', $role->id) . '" class="ti-btn ti-btn-info-full !py-1 !px-2 ti-btn-wave"><i class="ri-edit-line"></i></a> ';
                $ops .= '<a href="' . route('role.destroy', $role->id) . '" class="ti-btn ti-btn-danger-full !py-1 !px-2 ti-btn-wave" data-confirm-delete="true"><i class="ri-delete-bin-line"></i></a>';

                return $ops;
            })
            ->rawColumns(['actions'])
            ->editColumn('created_at', function ($jabatan) {
                return Carbon::parse($jabatan->created_at)->format('d-m-Y H:i:s');
            })
            ->editColumn('updated_at', function ($jabatan) {
                return Carbon::parse($jabatan->updated_at)->format('d-m-Y H:i:s');
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Role $model): QueryBuilder
    {
        return $model->newQuery()->with('permissions')->select('roles.*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('roles-table')
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
            Column::make('name')->title('Nama Peran')->orderable(false)->addClass('border-b border-defaultborder'),
            Column::make('guard_name')->title('Nama Guard')->orderable(false)->addClass('border-b border-defaultborder'),
            Column::make('created_at')->orderable(false)->title('Dibuat Pada')->addClass('border-b border-defaultborder'),
            Column::make('updated_at')->orderable(false)->title('Diubah Pada')->addClass('border-b border-defaultborder'),
            Column::computed('actions')
                  ->orderable(false)
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center border-b border-defaultborder'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Roles_' . date('YmdHis');
    }
}
