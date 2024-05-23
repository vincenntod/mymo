<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_barang', 'jumlah', 'tanggal_masuk', 'tanggal_keluar'
    ];
}
