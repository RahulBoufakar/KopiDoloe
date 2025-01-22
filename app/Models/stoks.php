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
        'menu_id',
        'jumlah',
        'nama_barang',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
