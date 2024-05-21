<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan_pelanggan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kd_pelanggan', 'tanggal', 'nama_pelanggan', 'nama_pesanan', 'jumlah', 'keterangan'
    ];

    public function setHargaAttribute($value)
    {
        $this->attributes['harga'] = str_replace(',', '', $value);
    }

    public function getHargaAttribute($value)
    {
        return number_format($value, 0, ',', '.');
    }
}
