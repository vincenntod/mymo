<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStock extends Model
{
    use HasFactory;

    protected $table = 'stock_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_barang', 'jumlah', 'tanggal_masuk', 'tanggal_keluar'
    ];
}
