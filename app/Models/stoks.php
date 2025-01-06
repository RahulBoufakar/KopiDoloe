<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stoks extends Model
{
    /** @use HasFactory<\Database\Factories\StokFactory> */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stoks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_barang',
        'harga',
        'jumlah',
        'tanggal_kadaluwarsa',
    ];
}
