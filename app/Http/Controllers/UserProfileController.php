<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
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
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id),],
                'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(auth()->user()->id),],
                'jabatan' => 'required|exists:jabatan,id',
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

        if (!$validated) {
            return redirect()->route('profile')->with('error', 'Update Profil Gagal');
        }

        // Update the user profile
        $user = User::find(auth()->user()->id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->username = $validated['username'];
        $user->jabatan_id = $validated['jabatan'];
        $is_saved = $user->save();

        if (!$is_saved) {
            return redirect()->route('profile')->with('error', 'Update Profil Gagal');
        } else {
            return redirect()->route('profile')->with('success', 'Update Profil Berhasil');
        }
    }
}
