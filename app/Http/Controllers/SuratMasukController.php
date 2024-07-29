<?php

namespace App\Http\Controllers;

use App\DataTables\SuratMasukDataTable;
use App\Http\Requests\SuratMasukRequest;
use App\Models\JenisSurat;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(SuratMasukDataTable $dataTable)
    {
        return $dataTable->render('suratmasuk.index');
    }

    public function create()
    {

        $jenisSurat = JenisSurat::all();
        return view('suratmasuk.form', [
            'suratmasuk' => new SuratMasuk(),
            'jenis_surat' => $jenisSurat,
            'data' => [
                'title' => 'Tambah Surat Masuk baru',
                'btn_submit' => 'Simpan',
                'type' => 'Tambah',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratMasukRequest $request)
    {
        $request->validated();

        $suratMasuk = new SuratMasuk();
        $suratMasuk->user_id = Auth::id();
        $suratMasuk->jenissurat_id = $request->jenissurat_id;
        $suratMasuk->perihal_masuk = $request->perihal_masuk;
        $suratMasuk->tgl_surat = $request->tgl_surat;
        $suratMasuk->tgl_masuk = date('Y-m-d H:i:s');

        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $fileName = 'suratmasuk_' . time() . '.' . $file->getClientOriginalExtension(); // Mengubah nama file
            $path = $file->storeAs('uploads', $fileName, 'public'); // Menyimpan file dengan nama baru
            $suratMasuk->file_upload = $path; // Simpan path file
        }

        $suratMasuk->asal_surat = $request->asal_surat;

        $suratMasuk->save();

        // Generate no_surat
        $suratMasuk->no_surat = '900/' . $request->jenissurat_id . '/' . str_pad($suratMasuk->id, 4, '0', STR_PAD_LEFT) . '/' . date('Y');
        $suratMasuk->save();

        return redirect()->route('suratmasuk.index')->with('success', 'Surat Masuk berhasil ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
