<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Routing\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $data = new Menu();
        $data->name = $request->name;
        $data->harga = $request->harga;
        $data->deskripsi = $request->deskripsi;
        $data->kategori = $request->kategori;
        
        $filename = '';
        if ($request->hasFile('gambar')) {
            $filename = $request->getSchemeAndHttpHost().'/asset/upload/'.time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('/asset/upload/'), $filename);
        }
        $data->gambar = $filename;
        
        $data->save();
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->name = $request->name;
        $menu->harga = $request->harga;
        $menu->deskripsi = $request->deskripsi;
        $menu->kategori = $request->kategori;
        
        $filename = '';

        if ($request->hasFile('gambar')) {
            $filename = $request->getSchemeAndHttpHost().'/asset/upload/'.time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('asset/upload'), $filename);
        }
        $menu->gambar = $filename;
        $menu->save();
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index');
    }
}