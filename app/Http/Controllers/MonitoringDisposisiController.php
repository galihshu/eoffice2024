<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use Illuminate\Http\Request;

class MonitoringDisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('modules.monitoring_disposisi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = Disposisi::whereHas('SuratMasuk', function ($q) use ($request) {
            $q->where('no_surat', $request->monitoring_disposisi);
        })->with([
        'User' => function ($q) {
            $q->with(['Jabatan']);
        },
        'UserTujuan' => function ($q) {
            $q->with(['Jabatan']);
        }
        ])->latest()->get()->toArray();
        if($data ==  null) {
            return back()->withToastError('Nomor Surat Tidak Ditemukan');
        }
        return view('modules.monitoring_disposisi.show', compact('data'));
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
