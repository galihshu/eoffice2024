<?php

namespace App\Http\Controllers;

use App\Services\FonnteService;
use App\DataTables\DisposisiDataTable;
use App\Http\Requests\DisposisiRequest;
use App\Models\Disposisi;
use App\Models\JenisSurat;
use App\Models\Notification;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        DB::transaction(function () use ($request, $suratMasuk) {
            $suratMasuk->update([
                'status_surat' => 3,
            ]);

        Disposisi::create([
            'user_id_pengirim' => Auth::id(),
            'user_id_tujuan' => $request->tujuan,
            'surat_masuk_id' => $suratMasuk->id,
            'status_disposisi' => 2,
            'tgl_disposisi' => $request->tgl_disposisi,
            'file_upload' => $request->file_upload == null ? null : $file,
            'keterangan_disposisi' => $request->keterangan
        ]);

        Notification::create([
            'surat_masuk_id' => $suratMasuk->id,
            'surat_tujuan_id' => $request->tujuan,
            'pesan' => $request->keterangan,
        ]);

        return redirect()->route('disposisi.index')->withToastSuccess('Disposisi Surat berhasil ditambahkan.');
        });
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
            // 'surat_masuk_id' => $request->surat_masuk,
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

    public function teruskan(Disposisi $disposisi)
    {
        $tujuan =  User::with('jabatan')->where('jabatan_id', '!=', null)->get()->toArray();
        return view('modules.disposisi.teruskan', compact(['disposisi', 'tujuan']));
    }

    public function store_teruskan(Disposisi $disposisi, DisposisiRequest $request, FonnteService $fonnte)
    {
        $request->validated();
        DB::transaction(function () use ($request, $disposisi, $fonnte) {

            Disposisi::create([
                'user_id_pengirim' => Auth::id(),
                'user_id_tujuan' => $request->tujuan,
                'surat_masuk_id' => $disposisi->surat_masuk_id,
                'status_disposisi' => 3,
                'tgl_disposisi' => $request->tgl_disposisi,
                'file_upload' => $disposisi->file_upload,
                'keterangan_disposisi' => $request->keterangan
            ]);

            Notification::create([
                'surat_masuk_id' => $disposisi->surat_masuk_id,
                'surat_tujuan_id' => $request->tujuan,
                'pesan' => $request->keterangan,
            ]);

            // Asumsikan $user berisi data pengguna yang akan menerima pesan
            $user = User::find($request->tujuan);

            $this->kirimPesanWhatsApp(
                $fonnte, 
                $request->tujuan, 
                "Yth. Bapak/Ibu " . $user->name . ",\n\n" . 
                "Kami informasikan bahwa disposisi terkait surat dengan nomor: " . 
                $disposisi->SuratMasuk->no_surat . " dan perihal '{$disposisi->SuratMasuk->perihal}' telah diteruskan.\n\n" . 
                "Mohon untuk segera dilakukan tindak lanjut sesuai dengan prosedur yang berlaku.\n\n" . 
                "Terima kasih atas perhatian dan kerjasamanya.\n\n" . 
                "E-Office BPKAD Prov Lampung"
            );
            
        });
        return redirect()->route('disposisi.index')->withToastSuccess('Disposisi berhasil diteruskan.');
    }

    private function kirimPesanWhatsApp(FonnteService $fonnte, $userId, $message)
    {
        $user = User::find($userId);
        if ($user && $user->phone) {
            $fonnte->sendMessage($user->phone, $message);
        }
    }
}
