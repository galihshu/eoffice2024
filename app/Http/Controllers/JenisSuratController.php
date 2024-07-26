<?php

namespace App\Http\Controllers;

use App\DataTables\JenissuratDataTable;
use App\Http\Requests\JenisSurat\StoreRequest;
use App\Http\Requests\JenisSurat\UpdateRequest;
use App\Models\JenisSurat;
use App\Models\Jenissurat as ModelsJenissurat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JenissuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JenissuratDataTable $dataTable)
    {
        $title = "Yakin ingin menghapus data ini?";
        $text = "Setelah dihapus, data tidak dapat dikembalikan";
        confirmDelete($title, $text);
        return $dataTable->render('modules.jenissurat.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.jenissurat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        Jenissurat::create($validated);
        return redirect()->route('jenissurat.index')
            ->withToastSuccess(__('Data Jenis Surat Berhasil Disimpan'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = JenisSurat::firstOrFail($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenissurat = Jenissurat::findOrFail($id);
        return view('modules.jenissurat.edit', ['jenissurat' => $jenissurat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $jabatan = Jenissurat::findOrFail($id);
        $jabatan->update($validated);
        return redirect()->route('jenissurat.index')
            ->withToastSuccess(__('Data Jenis Surat Berhasil Diupdate'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenissurat = Jenissurat::findOrFail($id);
        $jenissurat->delete();
        return redirect()->route('jenissurat.index')
            ->withToastSuccess(__('Data Jenis Surat Berhasil Dihapus'));
    }
}
