<?php

namespace App\Http\Controllers\DataTables;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDataTableController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(UsersDataTable $dataTable)
    {
        
        return $dataTable->render('datatables.users.index');
    }
}
