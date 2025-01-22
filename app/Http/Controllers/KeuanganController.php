<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Http\Requests\StoreKeuanganRequest;
use App\Http\Requests\UpdateKeuanganRequest;
use Illuminate\Routing\Controller;


class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keuangans = Keuangan::all();
        return view('admin.keuangan.index', compact('keuangans'));
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
    public function store(StoreKeuanganRequest $request)
    {
        dd($request->all());
        $data = new Keuangan();
        $data->tanggal = $request->tanggal;
        $data->kategori = $request->kategori;
        $data->keterangan = $request->keterangan;
        $data->jumlah = $request->jumlah;
        $data->save();

        return redirect()->route('keuangan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        return view('admin.keuangan.edit', compact('keuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeuanganRequest $request, Keuangan $keuangan)
    {
        $keuangan->tanggal = $request->tanggal;
        $keuangan->kategori = $request->kategori;
        $keuangan->keterangan = $request->keterangan;
        $keuangan->jumlah = $request->jumlah;
        $keuangan->save();
        return redirect()->route('keuangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();
        return redirect()->route('keuangan.index');
    }
}
