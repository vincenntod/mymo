<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;

    protected $table = 'databarang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama', 'jumlah', 'harga', 'stok_barang'
    ];
    public function setHargaAttribute($value)
    {
        $this->attributes['harga'] = str_replace(',', '', $value);
    }

    // Accessor untuk mengubah format harga saat diambil
    public function getHargaAttribute($value)
    {
        return number_format($value, 0, ',', '.');
    }
}
