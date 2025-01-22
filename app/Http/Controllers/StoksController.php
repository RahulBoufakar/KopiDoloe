<?php

namespace App\Http\Controllers;

use App\Models\stoks;
use Illuminate\Routing\Controller;
use App\Http\Requests\StorestoksRequest;
use App\Http\Requests\UpdatestoksRequest;

class StoksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stoks = stoks::all();
        return view('admin.stoks.index', compact('stoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stoks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestoksRequest $request)
    {
        $data = new stoks();
        $data->nama_barang = $request->nama_barang;
        $data->jumlah = $request->jumlah;
        $data->harga = $request->harga;
        $data->tanggal_kadaluwarsa = $request->tanggal_kadaluwarsa;
        $data->save();

        return redirect()->route('stoks.index');  
    }

    /**
     * Display the specified resource.
     */
    public function show(stoks $stoks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stoks $stok)
    {
        return view('admin.stoks.edit', compact('stok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestoksRequest $request, stoks $stok) 
    {
        $stok->nama_barang = $request->nama_barang;
        $stok->jumlah = $request->jumlah;
        $stok->harga = $request->harga;
        $stok->tanggal_kadaluwarsa = $request->tanggal_kadaluwarsa;
        $stok->save();

        return redirect()->route('stoks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stoks = stoks::findOrFail($id);
        $stoks->delete();
        return redirect()->route('stoks.index')->with('success', 'Data berhasil dihapus');
    }
}
