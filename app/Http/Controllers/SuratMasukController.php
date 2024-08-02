<?php

namespace App\Http\Controllers;

use App\DataTables\SuratMasukDataTable;
use App\Exports\SuratMasukExport;
use App\Http\Requests\DisposisiRequest;
use App\Http\Requests\DistribusiRequest;
use App\Http\Requests\SuratMasukRequest;
use App\Models\Disposisi;
use App\Models\JenisSurat;
use App\Models\Notification;
use App\Models\SuratMasuk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SuratMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(SuratMasukDataTable $dataTable)
    {
        $title = "Yakin ingin menghapus data ini?";
        $text = "Setelah dihapus, data tidak dapat dikembalikan";
        confirmDelete($title, $text);

        return $dataTable->render('modules.surat_masuk.index');
    }


    public function create()
    {
        $jenis_surat = JenisSurat::all()->toArray();
        return view('modules.surat_masuk.create', compact(['jenis_surat']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratMasukRequest $request)
    {
        $request->validated();

        $suratMasuk = new SuratMasuk();
        $suratMasuk->user_id = Auth::id();
        $suratMasuk->jenis_surat_id = $request->jenis_surat;
        $suratMasuk->no_surat = $request->no_surat;
        $suratMasuk->perihal = $request->perihal;
        $suratMasuk->tgl_surat = $request->tgl_surat;
        $suratMasuk->tgl_masuk = $request->tgl_masuk;

        if ($request->hasFile('file_upload')) {
            $filePath = $request->file('file_upload')->store('uploads', 'public');
            $suratMasuk->file_upload = $filePath;
        }

        $suratMasuk->asal_surat = $request->asal_surat;

        $suratMasuk->save();

        return redirect()->route('surat_masuk.index')->with('success', 'Surat Masuk berhasil ditambahkan.');
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
    public function edit(SuratMasuk $suratMasuk)
    {
        $jenis_surat = JenisSurat::all()->toArray();
        return view('modules.surat_masuk.edit', compact(['suratMasuk', 'jenis_surat']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratMasukRequest $request, SuratMasuk $suratMasuk)
    {
        $request->validated();

        $filePath = $suratMasuk->file_upload;
        if ($request->hasFile('file_upload')) {
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_upload')->store('uploads', 'public');
        }

        $suratMasuk->update([
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'status_surat' => $request->status,
            'tgl_surat' => $request->tgl_surat,
            'tgl_masuk' => $request->tgl_masuk,
            'asal_surat' => $request->asal_surat,
            'file_upload' => $filePath == null ? $suratMasuk->file_upload : $filePath
        ]);

        return redirect()->route('surat_masuk.index')->withToastSuccess('Data Surat Masuk berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        if ($suratMasuk->file_upload) {
            Storage::disk('public')->delete($suratMasuk->file_upload);
        }

        $suratMasuk->delete();

        return redirect()->route('surat_keluar.index')->withToastSuccess('Data Surat Masuk berhasil dihapus.');
    }

    public function laporan()
    {
        return view('modules.surat_masuk.laporan');
    }

    public function exportExcel(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        return Excel::download(new SuratMasukExport($startDate, $endDate), 'surat_masuk.xlsx');
    }

    public function disposisi(SuratMasuk $suratMasuk)
    {
        $tujuan =  User::with('jabatan')->where('jabatan_id', '!=', null)->get()->toArray();
        return view('modules.surat_masuk.disposisi', compact(['suratMasuk', 'tujuan']));
    }

    public function store_disposisi(SuratMasuk $suratMasuk, DisposisiRequest $request)
    {
        $request->validated();
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
             'status_disposisi' => 2,
             'tgl_disposisi' => $request->tgl_disposisi,
             'file_upload' => $request->file_upload == null ? null : $file,
             'keterangan_disposisi' => $request->keterangan
         ]);

        $suratMasuk->update([
            'status_surat' => 3,
        ]);

        if ($request->file_upload !== null) {
            $file = $request->file('file_upload')->store('uploads', 'public');
        }

        Notification::create([
            'surat_masuk_id' => $suratMasuk->id,
            'surat_tujuan_id' => $request->tujuan,
            'pesan' => $request->keterangan,
        ]);
        return redirect()->route('disposisi.index')->withToastSuccess('Disposisi Surat berhasil ditambahkan.');
    }


    public function distribusi(SuratMasuk $suratMasuk)
    {
        $tujuan =  User::with('jabatan')->where('jabatan_id', '!=', null)->get()->toArray();
        return view('modules.surat_masuk.distribusi', compact(['tujuan', 'suratMasuk']));
    }

    public function store_distribusi(SuratMasuk $suratMasuk, DistribusiRequest $request)
    {
        $request->validated();
        DB::transaction(function () use ($request, $suratMasuk) {
            $suratMasuk->update([
                'status_surat' => 2,
                'tgl_selesai' => $request->tgl_disposisi
            ]);

            Disposisi::create([
                'user_id_pengirim' => Auth::id(),
                'user_id_tujuan' => $request->tujuan,
                'surat_masuk_id' => $suratMasuk->id,
                'status_disposisi' => 1,
                'tgl_disposisi' => $request->tgl_disposisi,
                'keterangan_disposisi' => $request->keterangan
            ]);

            Notification::create([
                'surat_masuk_id' => $suratMasuk->id,
                'surat_tujuan_id' => $request->tujuan,
                'pesan' => $request->keterangan,
            ]);
        });

        return redirect()->route('disposisi.index')->withToastSuccess('Disposisi Surat berhasil ditambahkan.');
    }

    public function terima_surat(SuratMasuk $suratMasuk)
    {
        $suratMasuk->update([
            'status_surat' => 4
        ]);

        Disposisi::create([
            'user_id_pengirim' => Auth::id(),
            'surat_masuk_id' => $suratMasuk->id,
            'status_disposisi' => 4,
            'tgl_disposisi' => Carbon::now(),
        ]);

        return back()->withToastSuccess('Surat berhasil ditandai selesai');
    }

    public function tolak_surat(SuratMasuk $suratMasuk)
    {
        $suratMasuk->update([
            'status_surat' => 5
        ]);

        Disposisi::create([
            'user_id_pengirim' => Auth::id(),
            'surat_masuk_id' => $suratMasuk->id,
            'status_disposisi' => 5,
            'tgl_disposisi' => Carbon::now(),
        ]);

        return back()->withToastSuccess('Surat berhasil ditolak');
    }
}
