<?php

namespace App\Http\Controllers;

use App\DataTables\DisposisiDataTable;
use App\Http\Requests\DisposisiRequest;
use App\Models\Disposisi;
use App\Models\JenisSurat;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DisposisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(DisposisiDataTable $dataTable)
    {
        $title = "Yakin ingin menghapus data ini?";
        $text = "Setelah dihapus, data tidak dapat dikembalikan";
        confirmDelete($title, $text);
        return $dataTable->render('modules.disposisi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tujuan =  User::with('jabatan')->where('jabatan_id', '!=', null)->get()->toArray();
        $surat_masuk = SuratMasuk::all()->toArray();
        return view('modules.disposisi.create', compact(['surat_masuk', 'tujuan']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DisposisiRequest $request)
    {
        $request->validated();
        $suratMasuk = SuratMasuk::findOrFail($request->surat_masuk);

        if($suratMasuk->status_surat == 3){
            return back()->withToastError('Surat sudah di disposisi sebelumnya');
        }

        $suratMasuk->update([
           'status_surat' => 3, 
        ]);
        
        if($request->file_upload !== null){
            $file = $request->file('file_upload')->store('uploads', 'public');
        }

        Disposisi::create([
            'user_id_pengirim' => Auth::id(),
            'user_id_tujuan' => $request->tujuan,
            'surat_masuk_id' => $suratMasuk->id,
            'tgl_disposisi' => $request->tgl_disposisi,
            'file_upload' => $request->file_upload == null ? null : $file,
            'keterangan' => $request->keterangan_disposisi
        ]);

        return redirect()->route('disposisi.index')->withToastSuccess('Disposisi Surat berhasil ditambahkan.');
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
    public function edit(Disposisi $disposisi)
    {
        $surat_masuk = SuratMasuk::all()->toArray();
        $tujuan =  User::with('jabatan')->where('jabatan_id', '!=', null)->get()->toArray();
        return view('modules.disposisi.edit', compact(['disposisi', 'surat_masuk', 'tujuan']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DisposisiRequest $request, Disposisi $disposisi)
    {
        $request->validated();

        $filePath = $disposisi->file_upload;
        if ($request->hasFile('file_upload')) {
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_upload')->store('uploads', 'public');
        }

        $disposisi->update([
            'user_id_tujuan' => $request->tujuan,
            'surat_masuk_id' => $request->surat_masuk,
            'tgl_disposisi' => $request->tgl_disposisi,
            'file_upload' => $filePath == null ? $disposisi->file_upload : $filePath,
            'keterangan_disposisi' => $request->keterangan
        ]);

        return redirect()->route('disposisi.index')->withToastSuccess('Disposisi Surat berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disposisi $disposisi)
    {
        if ($disposisi->file_upload) {
            Storage::disk('public')->delete($disposisi->file_upload);
        }

        $suratMasuk = SuratMasuk::findOrFail($disposisi->surat_masuk_id);
        $suratMasuk->update([
            'status_surat' => 2
        ]);

        $disposisi->delete();

        return redirect()->route('disposisi.index')->withToastSuccess('Disposisi Surat berhasil dihapus.');
    }
}
