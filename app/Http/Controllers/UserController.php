<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'photo' => 'nullable|image|max:2512|mimes:jpeg,png',
            'peran' => 'required'
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
            $filename = $request->file('photo')->storeAs('images', $filename, 'public');
        } else {
            $filename = 'eofficeadmin/images/authentication/default.png';
        }


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'jabatan_id' => $request->jabatan_id,
            'password' => Hash::make($request->password),
            'photo' => "storage/$filename"
        ])->assignRole($request->peran);

        

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
        $to_be_validate = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'jabatan_id' => 'required',
            'photo' => 'image|max:2512|mimes:jpeg,png',
        ];
        $request->validate(
            $to_be_validate,
            [
                'required' => ':attribute harus diisi',
                'unique' => ':attribute sudah terdaftar',
                'email' => ':attribute harus berupa email',
                'max' => ':attribute maksimal :max karakter',
                'image' => 'Upload hanya berupa gambar',
                'mimes' => 'Format gambar tidak valid',
                'max' => ':attribute maksimal :max KB'
            ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->jabatan_id = $request->jabatan_id;
        // if user change the photo remove old photo and upload new photo
        if ($request->hasFile('photo')) {
            // $request->file('file_upload')->store('uploads', 'public');
            $photo = $request->file('photo');
            $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
            // remove old photo
            $file_path = $request->file('photo')->storeAs('images', $filename, 'public');
            if ($user->photo != 'default.png') {
                if ($user->photo) {
                    Storage::disk('public')->delete($user->photo);
                }
            }
            $user->photo = "storage/$file_path";
        }
        // if user change the role remove old role and assign new role
        // if role logged user is admin don't do it
        if ($user->hasRole('admin')) {
            $user->syncRoles(['admin']);
        } else {
            $user->syncRoles([$request->peran]);
        }
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
        $delete = $user->delete();
        if ($user->photo != 'default.png') {
            Storage::disk('public')->delete($user->photo);
        }
        return redirect()
            ->route('user.index')->withToastSuccess('Data Pengguna berhasil dihapus.');
    }
}
