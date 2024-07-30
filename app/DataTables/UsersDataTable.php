<?php
namespace App\DataTables;
 
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;
 
class UsersDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($user) {
                $btn = '<a href="' . route('user.edit', $user->id) . '" class="ti-btn ti-btn-info-full !py-1 !px-2 ti-btn-wave"><i class="ri-edit-line"></i></a> ';
                $btn .= '<a href="' . route('user.destroy', $user->id) . '" class="ti-btn ti-btn-icon ti-btn-sm ti-btn-danger" data-confirm-delete="true"><i class="ri-delete-bin-line"></i></a>';

                return $btn;
            })
            
            ->editColumn('created_at', function ($user) {
                return Carbon::parse($user->created_at)->format('d-m-Y H:i:s');
            })
            ->editColumn('updated_at', function ($user) {
                return Carbon::parse($user->updated_at)->format('d-m-Y H:i:s');
            });
    }
 
    public function query(User $model): QueryBuilder
    {
        return $model->orderBy('id')->newQuery()->with('Jabatan');
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
            Column::make('jabatan.nama_jabatan', )->orderable(false)->title('Jabatan')->addClass('border-b border-defaultborder'),
            Column::make('created_at')->orderable(false)->title('Dibuat Pada')->addClass('border-b border-defaultborder'),
            Column::make('updated_at')->orderable(false)->title('Diubah Pada')->addClass('border-b border-defaultborder'),
            Column::computed('action')->exportable(false)->printable(false)->width(60)->addClass('text-center border-b border-defaultborder')
        ];
    }

    protected function filename(): string
    {
        return 'Users_'.date('YmdHis');
    }
}