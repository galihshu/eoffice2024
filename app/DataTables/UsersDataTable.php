<?php
namespace App\DataTables;
 
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
 
class UsersDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()->eloquent($query)
            ->addColumn('action', function ($datauser) {
                $ops = '<a href="' . route('user.edit', $datauser->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                $ops .= '
                <form action="' . route('user.destroy', $datauser->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>';

                return $ops;
            })
            ->editColumn('created_at', function ($datauser) {
                return Carbon::parse($datauser->created_at)->format('d-m-Y H:i:s');
            })
            ->editColumn('updated_at', function ($datauser) {
                return Carbon::parse($datauser->updated_at)->format('d-m-Y H:i:s');
            });;
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
            Column::computed('action')->exportable(false)->printable(false)->width(60)->addClass('text-center')
        ];
    }
 
    protected function filename(): string
    {
        return 'Users_'.date('YmdHis');
    }
}