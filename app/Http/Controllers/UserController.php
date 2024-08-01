<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {        
        $title = "Yakin ingin menghapus data ini?";
        $text = "Setelah dihapus, data tidak dapat dikembalikan";
        confirmDelete($title, $text);
        return $dataTable->render('modules.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // join table peran
        
        $jabatans = Jabatan::all();
        $roles = Roles::all();
        
        return view('modules.users.create', compact('jabatans', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        // dd($request->jabatan_id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'jabatan_id' => 'required',
            'peran' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'jabatan_id' => $request->jabatan_id,
            'password' => Hash::make($request->password)
        ])->assignRole($request->peran);

        // dd($request->jabatan_id);

        return redirect()->route('user.index')->withToastSuccess('Pengguna Baru berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $user = User::findOrFail($id); get users and his roles
        $user = User::with('roles')->findOrFail($id);
        $jabatans = Jabatan::all();
        $roles = Roles::all();
        return view('modules.users.edit', compact('user','jabatans', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'jabatan_id' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jabatan_id = $request->jabatan_id;
        $user->syncRoles([$request->peran]);
        if (! empty($request->get('password'))) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()
            ->route('user.index')
            ->with('message', 'Data Pengguna Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()
            ->route('user.index')->withToastSuccess('Data Pengguna berhasil dihapus.');
    }
}
