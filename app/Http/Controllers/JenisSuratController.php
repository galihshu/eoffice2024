<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\DataTables\JenisSuratDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\JenisSurat\StoreRequest;
use App\Http\Requests\JenisSurat\UpdateRequest;

class JenisSuratController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(JenisSuratDataTable $dataTable)
    {
        $title = "Yakin ingin menghapus data ini?";
        $text = "Setelah dihapus, data tidak dapat dikembalikan";
        confirmDelete($title, $text);
        return $dataTable->render('modules.jenis_surat.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.jenis_surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        JenisSurat::create($validated);
        return redirect()->route('jenis_surat.index')
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
        $jenissurat = JenisSurat::findOrFail($id);
        return view('modules.jenis_surat.edit', ['jenissurat' => $jenissurat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $validated = $request->validated();
        $jabatan = JenisSurat::findOrFail($id);
        $jabatan->update($validated);
        return redirect()->route('jenis_surat.index')
            ->withToastSuccess(__('Data Jenis Surat Berhasil Diupdate'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenissurat = JenisSurat::findOrFail($id);
        $jenissurat->delete();
        return redirect()->route('jenis_surat.index')
            ->withToastSuccess(__('Data Jenis Surat Berhasil Dihapus'));
    }
}
