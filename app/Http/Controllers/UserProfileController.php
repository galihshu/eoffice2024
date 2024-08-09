<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\VarDumper;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the user profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        /* get user by id user get from session
       
        */
        // user join jabatan using with

        $user = User::with('jabatan')->find(auth()->user()->id);
        $jabatans = Jabatan::all();

        return view('modules.users.profile', compact('user', 'jabatans'));
    }

    /**
     * Update the user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validate the request data
        /*
        
        */
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'required' => ':attribute harus diisi.',
                'string' => ':attribute harus berupa string.',
                'email' => ':attribute harus berupa alamat email yang valid.',
                'max' => ':attribute tidak boleh lebih dari :max karakter.',
                'unique' => ':attribute sudah digunakan.',
                'exists' => ':attribute tidak valid.',
            ]
        );

        
        /*
        check apakah validasi berhasil
        
        */
        
                
        // Update the user profile
        $user = User::find(auth()->user()->id);
        // if photo is uploaded
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
            $file_path = $photo->storeAs('images', $filename, 'public');
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $user->photo = "storage/$file_path";
        }
        $user->name = $request->name;
        $is_saved = $user->save();

        if (!$is_saved) {
            return redirect()->route('profile')->with('error', 'Update Profil Gagal');
        } else {
            return redirect()->route('profile')->with('success', 'Update Profil Berhasil');
        }
    }
}
