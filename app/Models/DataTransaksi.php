<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTransaksi extends Model
{
    use HasFactory;

    protected $table = 'data_transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pesanan', 'total_harga', 'tanggal_pembayaran'
    ];
}
