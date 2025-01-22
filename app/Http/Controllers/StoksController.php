<?php

namespace App\Http\Controllers;

use App\Models\stoks;
use App\Models\Menu;
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
        $stoks = Stoks::with('menu')->get();
        return view('admin.stoks.index', compact('stoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.stoks.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestoksRequest $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $menu = Menu::find($request->menu_id);
        $existingStok = Stoks::where('menu_id', $menu->id)->first();

        if ($existingStok && $existingStok->jumlah > 0) {
            return redirect()->back()->withErrors('Stok untuk menu ini sudah ada dan belum habis.');
        }

        if ($existingStok) {
            $existingStok->jumlah = $request->jumlah;
            $existingStok->nama_barang = $menu->name;
            $existingStok->save();
        } else {
            Stoks::create([
                'menu_id' => $menu->id,
                'jumlah' => $request->jumlah,
                'nama_barang' => $menu->name,
            ]);
        }

        return redirect()->route('stoks.index')->with('success', 'Stok berhasil ditambahkan.');  
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
