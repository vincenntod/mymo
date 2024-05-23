<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMenu extends Model
{
    use HasFactory;

    protected $table = 'data_menu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kd_menu', 'kd_barang', 'nama_menu', 'harga', 'keterangan'
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
