<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    
    protected $fillable = [
        'id_pelanggan',
        'tanggal_pemesanan',
        'detail_pesanan',
        'total_harga',
        'status'
    ];
}