<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Keuangan;
use App\Models\stoks;
use App\Models\Pemesanan;


class AdminController extends Controller
{
    public function index()
    {
        $countStok = Stoks::count();
        $countMenu = Menu::count();
        $countPemesanan = Pemesanan::count();
        $keuangan = Keuangan::all()->where('kategori', 'Pemasukan');
        $countKeuangan = $keuangan->sum('jumlah');

        return view('admin.index', compact('countStok', 'countMenu', 'countPemesanan', 'countKeuangan'));
    }
}
