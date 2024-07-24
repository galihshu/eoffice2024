<?php
namespace App\DataTables;
 
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
 
class UsersDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->setRowId('id');
    }
 
    public function query(User $model): QueryBuilder
    {
        return $model->orderBy('id')->newQuery();
    }
 
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->addTableClass('table whitespace-nowrap ti-striped-table table-bordered table-hover min-w-full ti-custom-table-hover')
                    ->setTableHeadClass('bg-primary/10')
                    // ->setrowClass('border-b border-defaultborder')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1)
                    ->selectStyleSingle();
    }
 
    public function getColumns(): array
    {
        return [
            Column::make('id')->orderable(false)->addClass('border-b border-defaultborder'),
            Column::make('name')->orderable(false)->addClass('border-b border-defaultborder'),
            Column::make('email')->orderable(false)->addClass('border-b border-defaultborder'),
            Column::make('created_at')->orderable(false)->addClass('border-b border-defaultborder'),
            Column::make('updated_at')->orderable(false)->addClass('border-b border-defaultborder'),
        ];
    }
 
    protected function filename(): string
    {
        return 'Users_'.date('YmdHis');
    }
}