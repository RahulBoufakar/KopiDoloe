<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = [
        'name',
        'harga',
        'deskripsi',
        'kategori',
        'gambar',
    ];

    public function stoks()
    {
        return $this->hasMany(Stoks::class, 'menu_id');
    }
}
