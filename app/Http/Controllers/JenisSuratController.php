<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisSurat\StoreRequest;
use App\Http\Requests\JenisSurat\UpdateRequest;
use App\Models\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = JenisSurat::all();
        return $data;
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
    public function store(StoreRequest $request)
    {
        JenisSurat::create([
            'jenis_surat' => $request->safe()->jenis_surat,
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = JenisSurat::firstOrFail($id);
        $data->update([
            'jenis_surat' => $request->safe()->jenis_surat,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = JenisSurat::firstOrFail($id);
        $data->delete();
    }
}
