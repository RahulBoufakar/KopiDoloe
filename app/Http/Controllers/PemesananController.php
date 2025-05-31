<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Http\Requests\StorePemesananRequest;
use App\Http\Requests\UpdatePemesananRequest;
use Illuminate\Routing\Controller;
use App\Models\Pemesanan;
use App\Models\Menu;
use App\Models\Stoks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class PemesananController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'admin') {
            $data = Pemesanan::all();
            return view('admin.pemesanan.history', compact('data'));
        }
        $menus = Menu::all();
        $stocks = Stoks::pluck('jumlah', 'menu_id');
        return view('pemesanan.index', compact('menus', 'stocks'));
    }

    // In your PemesananController.php file
    /**
      * Create a new order session with the given request data.
      *
      * @param \Illuminate\Http\Request $request
      * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
      */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StorePemesananRequest $request)
    {
        $cartItems = json_decode($request->input('cartItems'), true);
        $totalPrice = $request->input('totalPrice');
        
        // Store the cart items and total price to database
        $data = new Pemesanan();
        $data->id_pelanggan = Auth::user()->id;
        $data->tanggal_pemesanan = Carbon::now();
        $data->detail_pesanan = $request->cartItems; // save as JSON format
        $data->total_harga = $totalPrice;
        $data->status = "Belum Dibayar";
        $data->save();
        
        // Get the latest order id
        $data->order_id = Pemesanan::where('id_pelanggan', $data->id_pelanggan)->latest()->first()->id;
        $data->detail_pesanan = $cartItems; // change to array

        // Add detail pesanan to item_detail as array of detail pesanan
        $item_detail = [];
        foreach ($cartItems as $item) {
            array_push($item_detail, $item);
            // Decrease stock quantity
            $menu = Menu::find($item['id']);
            $stok = Stoks::where('menu_id', $menu->id)->first();
            if ($stok) {
                $stok->jumlah -= $item['quantity'];
                $stok->save();
            }
        }

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $data->order_id + Carbon::now()->timestamp,
                'gross_amount' => $data->total_harga,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'city' => 'Ambon',
                'country_code' => 'IDN',
            ),
            'item_details' => $item_detail,
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('pemesanan.konfirmasi', compact('snapToken','data'));
    }



    public function invoice()
    {
        $data = Pemesanan::where('id_pelanggan', Auth::user()->id)->latest()->first();
        if($data->status == "Belum Dibayar") {
            $data->status = "Sudah Dibayar";
            $data->save();
        }
        $data->detail_pesanan = json_decode($data->detail_pesanan);
        return view('pemesanan.invoice', compact('data'));
    }

    public function history()
    {
        if(Auth::user()->role == 'admin') {
            $data = Pemesanan::all();
            return view('admin.pemesanan.history', compact('data'));
        }
        $data = Pemesanan::where('id_pelanggan', Auth::user()->id)->get();
        return view('pemesanan.history', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemesananRequest $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }

}
