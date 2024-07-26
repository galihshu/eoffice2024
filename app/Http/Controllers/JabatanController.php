<?php

namespace App\Http\Controllers;

use App\DataTables\JabatanDataTable;
use App\Http\Requests\JabatanRequest;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(JabatanDataTable $dataTable)
    {
        $title = "Yakin ingin menghapus data ini?";
        $text = "Setelah dihapus, data tidak dapat dikembalikan";
        confirmDelete($title, $text);
        return $dataTable->render('modules.jabatan.index');
    }

    public function create()
    {
        return view('modules.jenissurat.create');
    }

    public function store(JabatanRequest $request)
    {
        $validated = $request->validated();
        Jabatan::create($validated);
        return redirect()->route('jabatan.index')
            ->withToastSuccess(__('Data Jabatan Berhasil Disimpan'));
    }

    public function edit(string $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('modules.jabatan.edit', ['jabatan' => $jabatan]);
    }

    public function update(JabatanRequest $request, string $id)
    {
        $validated = $request->validated();
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($validated);
        return redirect()->route('jabatan.index')
            ->withToastSuccess(__('Data Jabatan Berhasil Diupdate'));
    }

    public function destroy(string $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();
        return redirect()->route('jabatan.index')
            ->withToastSuccess(__('Data Jabatan Berhasil Dihapus'));
    }
}
