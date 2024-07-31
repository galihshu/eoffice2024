<?php

namespace App\Http\Controllers;

use App\DataTables\SuratKeluarDataTable;
use App\Models\SuratKeluar;
use App\Exports\SuratKeluarExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SuratKeluarDataTable $dataTable)
    {
        $title = "Yakin ingin menghapus data ini?";
        $text = "Setelah dihapus, data tidak dapat dikembalikan";
        confirmDelete($title, $text);
        return $dataTable->render('modules.surat_keluar.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.surat_keluar.create');
    }

    public function laporan()
    {
        return view('modules.surat_keluar.laporan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_surat' => 'required|string|max:255',
            'no_surat' => 'required|string|max:255',
            'nama_penerima' => 'required|string|max:255',
            'status_surat' => 'required|in:1,2,3',
            'file_upload' => 'nullable|mimes:pdf|max:2048', // Validasi hanya menerima PDF
        ]);

        $filePath = null;
        if ($request->hasFile('file_upload')) {
            $filePath = $request->file('file_upload')->store('uploads', 'public');
        }

        SuratKeluar::create([
            'user_id' => Auth::id(),
            'nama_penerima' => $request->nama_penerima,
            'kode_surat' => $request->kode_surat,
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'tgl_keluar' => $request->tgl_keluar,
            'tgl_diterima' => $request->tgl_diterima,
            'status_surat' => $request->status_surat,
            'tujuan_surat' => $request->tujuan_surat,
            'file_upload' => $filePath,
        ]);

        return redirect()->route('surat_keluar.index')->withToastSuccess('Data Surat keluar berhasil disimpan');
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
    public function edit(SuratKeluar $suratKeluar)
    {
        return view('modules.surat_keluar.edit', compact('suratKeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $request->validate([
            'kode_surat' => 'required|string|max:255',
            'no_surat' => 'required|string|max:255',
            'status_surat' => 'required|in:1,2,3',
            'file_upload' => 'nullable|mimes:pdf|max:2048', // Validasi hanya menerima PDF
        ]);

        $filePath = $suratKeluar->file_upload;
        if ($request->hasFile('file_upload')) {
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file_upload')->store('uploads', 'public');
        }

        $suratKeluar->update([
            'nama_penerima' => $request->nama_penerima,
            'kode_surat' => $request->kode_surat,
            'no_surat' => $request->no_surat,
            'perihal' => $request->perihal,
            'tgl_keluar' => $request->tgl_keluar,
            'tgl_diterima' => $request->tgl_diterima,
            'status_surat' => $request->status_surat,
            'tujuan_surat' => $request->tujuan_surat,
            'file_upload' => $filePath,
        ]);

        return redirect()->route('surat_keluar.index')->withToastSuccess('Data Surat keluar berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        if ($suratKeluar->file_upload) {
            Storage::disk('public')->delete($suratKeluar->file_upload);
        }

        $suratKeluar->delete();

        return redirect()->route('surat_keluar.index')->withToastSuccess('Data Surat keluar berhasil dihapus.');
    }

    public function exportExcel(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        return Excel::download(new SuratKeluarExport($startDate, $endDate), 'surat_keluar.xlsx');
    }
}
