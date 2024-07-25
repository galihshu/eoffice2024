<?php

namespace App\Http\Controllers;

use App\DataTables\JabatanDataTable;
use App\Http\Requests\JabatanRequest;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(JabatanDataTable $dataTable)
    {
        return $dataTable->render('jabatan.index');
    }

    public function create()
    {
        return view('jabatan.form', [
            'jabatan' => new Jabatan(),
            'data' => [
                'title' => 'Tambah jabatan baru',
                'btn_submit' => 'SIMPAN',
            ]
        ]);
    }

    public function store(JabatanRequest $request)
    {
        $validated = $request->validated();
        Jabatan::create($validated);
        return redirect('/jabatan');
    }

    public function edit(string $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan.form', [
            'jabatan' => $jabatan,
            'data' => [
                'title' => 'Edit jabatan',
                'btn_submit' => 'UPDATE',
            ]
        ]);
    }

    public function update(JabatanRequest $request, string $id)
    {
        $validated = $request->validated();
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($validated);
        return redirect('/jabatan');
    }

    public function destroy(string $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();
        return redirect('/jabatan');
    }
}
