<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $table = 'data_barang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kd_barang', 'nama_barang', 'stock'
    ];
}
